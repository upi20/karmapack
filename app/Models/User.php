<?php

namespace App\Models;

use App\Models\Keanggotaan\Anggota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Schema;

// excel
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles, Loggable;
    const tableName = 'users';
    const image_default = 'assets/image/anggota_default.png';
    const image_folder = '/assets/anggota';
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function fotoUrl()
    {
        $foto = $this->attributes['foto'];
        return $foto ? url(static::image_folder . '/' . $foto) : asset('assets/image/anggota_default.png');
    }

    public function fotoUrlDefault()
    {
        return asset('assets/image/anggota_default.png');
    }

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id', 'id');
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    // static function
    public static function datatable(Request $request)
    {
        $query = [];
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        // roles

        $c_roles = 'roles';
        $t_has_roles = $tableNames['model_has_roles'];
        $t_roles = $tableNames['roles'];
        $t_user = static::tableName;

        $c_model_id = $columnNames['model_morph_key'];

        $query[$c_roles] = <<<SQL
            (SELECT GROUP_CONCAT($t_roles.`name` SEPARATOR ', ') FROM $t_has_roles
            join $t_roles on $t_has_roles.role_id = $t_roles.id
            where $t_has_roles.$c_model_id = $t_user.id)
        SQL;

        $query["{$c_roles}_alias"] = $c_roles;

        $user = static::select(['id', 'name', 'email', 'active'])
            ->selectRaw('IF(active = 1, "Aktif", "Tidak Aktif") as active_str')
            ->selectRaw($query[$c_roles] . ' as ' . $query["{$c_roles}_alias"]);
        // filter
        if (isset($request->filter)) {
            $filter = $request->filter;
            if ($filter['active'] != '') {
                $user->where('active', '=', $filter['active']);
            }
            if ($filter['role'] != '') {
                $f = $filter['role'];
                $where = <<<SQL
                    ((SELECT count(*) FROM $t_has_roles
                    join $t_roles on $t_has_roles.role_id = $t_roles.id
                    where $t_has_roles.$c_model_id = $t_user.id and $t_roles.`name` = '$f') > 0)
                SQL;
                $user->whereRaw($where);
            }
        }
        $queryOut = $query;
        return Datatables::of($user)
            ->addIndexColumn()
            ->filterColumn($query["{$c_roles}_alias"], function ($query, $keyword) use ($c_roles, $queryOut) {
                $query->whereRaw($queryOut[$c_roles] . " like '%$keyword%'");
            })
            ->make(true);
    }

    public static function  excel(Request $request)
    {
        // data body
        $a = User::tableName;

        $active_str = <<<SQL
                    if($a.active = 0, 'Tidak Aktif',
                        if($a.active = 1, 'Aktif',
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
        die;
    }
}
