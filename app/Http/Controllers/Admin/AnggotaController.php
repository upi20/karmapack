<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan\Anggota;
use App\Models\User;
use App\Repository\Admin\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;
use Illuminate\Support\Facades\Schema;

// excel
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class AnggotaController extends Controller
{
    private $repository;
    private $query = [];

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }

        $page_attr = [
            'title' => 'Anggota',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        $angkatans = Anggota::select(['angkatan'])
            ->orderBy('angkatan', 'desc')
            ->distinct()->get();
        $user_role = Role::all();
        return view('admin.anggota', compact('page_attr', 'user_role', 'angkatans'));
    }

    private function datatable(Request $request): mixed
    {
        // import
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        // tables name
        $c_roles = 'roles';
        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = User::tableName;
        $table = Anggota::tableName;

        // cusotm query
        // ========================================================================================================

        // ulang tahun
        $year = (int)date('Y');
        $year_add_one = $year + 1;
        $c_ulang_tahun = 'ulang_tahun';
        $this->query[$c_ulang_tahun] = <<<SQL
            ( if( DATEDIFF(date(concat('{$year}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) < 0,
                DATEDIFF(date(concat('{$year_add_one}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) ,
                DATEDIFF(date(concat('{$year}-', month($table.tanggal_lahir), '-', day($table.tanggal_lahir))), CURDATE()) )
            )
        SQL;
        $this->query["{$c_ulang_tahun}_alias"] = $c_ulang_tahun;

        // roles
        $c_model_id = $columnNames['model_morph_key'];
        $c_roles = 'roles';
        $this->query[$c_roles] = <<<SQL
            (SELECT GROUP_CONCAT($t_roles.`name` SEPARATOR ', ') FROM $t_has_roles
            join $t_roles on $t_has_roles.role_id = $t_roles.id
            where $t_has_roles.$c_model_id = $t_user.id)
        SQL;
        $this->query["{$c_roles}_alias"] = $c_roles;

        // email
        $c_email = 'email';
        $this->query[$c_email] = "$t_user.email";
        $this->query["{$c_email}_alias"] = $c_email;

        $c_active = 'active';
        $this->query[$c_active] = "$t_user.active";
        $this->query["{$c_active}_alias"] = $c_active;
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col): string {
            return $this->query[$col] . ' as ' . $this->query[$col . '_alias'];
        };
        $model_filter = [
            $c_ulang_tahun,
            $c_roles,
            $c_email,
            $c_active
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = Anggota::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw))
            ->leftJoin($t_user, "$t_user.id", '=', "$table.user_id");

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };

        // filter ini menurut data model filter
        $f = [$c_active];
        // loop filter
        foreach ($f as $v) {
            if ($f_c($v) !== false) {
                $model->whereRaw("{$this->query[$v]}='{$f_c($v)}'");
            }
        }

        // filter custom
        $filters = ['angkatan'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }

        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['role'] != '') {
                $f = $filter['role'];
                $where = <<<SQL
                    ((SELECT count(*) FROM $t_has_roles
                    join $t_roles on $t_has_roles.role_id = $t_roles.id
                    where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
                SQL;
                $model->whereRaw($where);
            }
        }

        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();

        // search
        // ========================================================================================================
        $query_filter = $this->query;
        $datatable->filter(function ($query) use ($model_filter, $query_filter, $table) {
            $search = request('search');
            $search = isset($search['value']) ? $search['value'] : null;
            if ((is_null($search) || $search == '') && count($model_filter) > 0) return false;

            // tambah pencarian
            $search_add = [
                'nomor_anggota',
                'nama',
                'tanggal_lahir',
                'jenis_kelamin',
                'angkatan',
                'province_id',
                'regency_id',
                'district_id',
                'village_id',
                'alamat_lengkap',
                'bio',
                'profesi',
                'foto',
                'telepon',
                'whatsapp',
                'status',
                'user_id',
            ];
            $search_add = array_map(function ($v) use ($table) {
                return "$table.$v";
            }, $search_add);
            $search_arr = array_merge($model_filter, $search_add);

            // pake or where
            $search_str = "(";
            foreach ($search_arr as $k => $v) {
                $or = (($k + 1) < count($search_arr)) ? 'or' : '';
                $column = isset($query_filter[$v]) ? $query_filter[$v] : $v;
                $search_str .= "$column like '%$search%' $or ";
            }

            $search_str .= ")";
            $query->whereRaw($search_str);
        });

        // create datatable
        return $datatable->make(true);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tanggal_lahir' => ['required', 'date'],
            'angkatan' => ['required', 'int'],
            'active' => ['required', 'int', 'in:1,0'],
            'password' => ['required', 'string', new Password]
        ]);
        // buat username
        $username = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->nama)) . date('YmdHis');

        DB::beginTransaction();
        // Simpan user
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $username;
        $user->active = $request->active;
        $user->password = Hash::make($request->password);
        $user->save();

        // simpan role
        $user->assignRole($request->roles);

        // simpan ke data anggota
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->angkatan = $request->angkatan;
        $anggota->user_id = $user->id;
        $anggota->save();
        DB::commit();

        return response()->json();
    }

    public function update(Request $request)
    {
        $anggota = Anggota::findOrFail($request->id);
        $user = $anggota->user;
        $request->validate([
            'id' => ['required', 'int'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'tanggal_lahir' => ['required', 'date'],
            'angkatan' => ['required', 'int'],
            'active' => ['required', 'int', 'in:1,0'],
            'password' => $request->password ? ['required', 'string', new Password] : ''
        ]);

        DB::beginTransaction();
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // simpan ke data user
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->active = $request->active;
        $user->syncRoles($request->roles);
        $user->save();

        // simpan ke data anggota
        $anggota->nama = $request->nama;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->angkatan = $request->angkatan;
        $anggota->user_id = $user->id;
        $anggota->save();
        DB::commit();
        return response()->json();
    }

    public function delete(Anggota $anggota)
    {
        $user = $anggota->user;
        DB::beginTransaction();
        // delete anggota
        $anggota->delete();

        // delete user
        $user->delete();
        DB::commit();
        return response()->json();
    }

    public function change_password(Request $request)
    {
        $page_attr = [
            'title' => 'Ganti Password',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ],
        ];
        return view('admin.change_password', compact('page_attr'));
    }

    public function save_password(Request $request)
    {
        try {
            $request->validate([
                'current_password' => ['required', 'string', 'max:255'],
                'new_password' => ['required', 'string', new Password]
            ]);
            $user = User::find(auth()->user()->id);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
            } else {
                throw new Exception("Password Lama Salah. Jika anda lupa silahkan hubungi administrator.");
            }
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function excel(Request $request)
    {
        // data body
        $a = User::tableName;

        $active_str = <<<SQL
                    if($a.active = 0, 'No',
                        if($a.active = 1, 'Yes',
                            'Unknown')
                    ) as active_str
                SQL;
        $model = User::selectRaw("$a.*")
            ->selectRaw($active_str);

        if ($request->active != null) {
            $model->where('active', '=', $request->active);
        }

        if ($request->search != null) {
            $search = $request->search;
            $columns = Schema::getColumnListing($a);
            $search_query = '(';
            foreach ($columns as $i => $col) {
                $search_query .= "$col like '%$search%' " . ($i == (count($columns) - 1) ? '' : 'or ');
            }
            $search_query .= ')';
            $model->whereRaw($search_query);
        }

        // role
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        // roles

        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = User::tableName;

        $c_model_id = $columnNames['model_morph_key'];

        if ($request->role != '') {
            $f = $request->role;
            $where = <<<SQL
                ((SELECT count(*) FROM $t_has_roles
                join $t_roles on $t_has_roles.role_id = $t_roles.id
                where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
            SQL;
            $model->whereRaw($where);
        }

        // $model->orderBy('angkatan', 'desc');
        $model->orderBy('name');
        $details = $model->get();


        $strFilename = "Daftar Users Aplikasi SIA";
        $bulan_array = [
            1 => 'Januari',
            2 => 'February',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $today_m = (int)Date("m");
        $today_d = (int)Date("d");
        $today_y = (int)Date("Y");

        $last_date_of_this_month =  date('t', strtotime(date("Y-m-d")));

        $date = $today_d . " " . $bulan_array[$today_m] . " " . $today_y;

        // laporan baru
        $row = 1;
        $col_start = "A";
        $col_end = "D";
        $title_excel = "Daftar Users Aplikasi SIA";
        // Header excel ================================================================================================
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $auth_name = auth()->user()->name;
        $spreadsheet->getProperties()
            ->setCreator($auth_name)
            ->setLastModifiedBy($auth_name)
            ->setTitle($title_excel)
            ->setSubject($auth_name)
            ->setDescription("LIst Users $date")
            ->setKeywords("Laporan, Report")
            ->setCategory("Laporan, Report");

        // set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(11);

        // header 2 ====================================================================================================
        $row += 1;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "Daftar Users Aplikasi SIA");
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
            "font" => [
                "bold" => true,
                "size" => 13
            ],
            "alignment" => [
                "horizontal" => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Tabel =======================================================================================================
        // Tabel Header
        $row += 2;
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '93C5FD',
                ]
            ],
        ];
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);
        $row++;
        $styleArray['fill']['startColor']['rgb'] = 'E5E7EB';
        $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);

        // poin-poin header disini
        $headers = [
            'No',
            'Nama',
            'Email',
            'Password',
        ];

        // apply header
        for ($i = 0; $i < count($headers); $i++) {
            $sheet->setCellValue(chr(65 + $i) . ($row - 1), $headers[$i]);
            $sheet->setCellValue(chr(65 + $i) . $row, ($i + 1));
        }

        // tabel body
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            "alignment" => [
                'wrapText' => TRUE,
                'vertical' => Alignment::VERTICAL_TOP
            ]
        ];
        $start_tabel = $row + 1;
        foreach ($details as $detail) {
            $c = 0;
            $row++;
            $detail = (object)$detail;
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->name);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->email);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", "12345678");
        }
        // format
        // nomor center
        $sheet->getStyle($col_start . $start_tabel . ":" . $col_start . $row)
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // border all data
        $sheet->getStyle($col_start . $start_tabel . ":" . $col_end . $row)
            ->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->getStyle('B' . $start_tabel . ":B" . $row)->getNumberFormat()
            ->setFormatCode('0');

        // $code_rm = '_-[$RM-ms-MY]* #.##0,00_-;-[$RM-ms-MY]* #.##0,00_-;_-[$RM-ms-MY]* "-"??_-;_-@_-';
        // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);
        // $sheet->getStyle("G" . $start_tabel . ":" . "G" . $row)
        //     ->getNumberFormat()
        //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        // $sheet->getStyle("I" . $start_tabel . ":" . "I" . $row)
        //     ->getNumberFormat()
        //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        // // set alignment
        // $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("B" . $start_tabel . ":" . "B" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("C" . $start_tabel . ":" . "C" . $row)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle("C" . $start_tabel . ":D" . $row)
        //     ->getAlignment()
        //     ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // footer
        // $row += 3;
        // $sheet->setCellValue("Q" . $row, "Kasui, $date");

        // $row += 3;
        // $sheet->setCellValue("Q" . $row, "(.....................................)");
        $row++;
        // // waktu dan tangggal
        $tanggal = date("d-m-Y H:i:s");
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "Data ini diambil pada tanggal dan waktu: $tanggal");

        // function for width column
        function w($width)
        {
            return 0.71 + $width;
        }

        // set width column
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        // set  printing area
        $spreadsheet->getActiveSheet()->getPageSetup()->setPrintArea($col_start . '1:' . $col_end . $row);
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $spreadsheet->getActiveSheet()->getPageSetup()
            ->setPaperSize(PageSetup::PAPERSIZE_A4);

        // margin
        $spreadsheet->getActiveSheet()->getPageMargins()->setTop(1);
        $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0);
        $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0);
        $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0);

        // page center on
        $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

        // simpan di folder
        // $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');

        // simpan langsung
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $strFilename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

    public function find(Request $request)
    {
        $anggota = Anggota::findOrFail($request->anggota_id);
        $user = $anggota->user()->with('roles', 'permissions')->first();
        $anggota->user = $user;
        return response()->json($anggota);
    }
}
