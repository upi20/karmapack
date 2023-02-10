<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan\Anggota;
use App\Models\Keanggotaan\Hobi;
use App\Models\Keanggotaan\Kontak as KeanggotaanKontak;
use App\Models\Keanggotaan\KontakJenis;
use App\Models\Keanggotaan\Pendidikan as KeanggotaanPendidikan;
use App\Models\Keanggotaan\PendidikanJenis as KeanggotaanPendidikanJenis;
use App\Models\Keanggotaan\PengalamanLain as KeanggotaanPengalamanLain;
use App\Models\Keanggotaan\PengalamanOrganisasi as KeanggotaanPengalamanOrganisasi;
use App\Models\Profile\Hobby;
use App\Models\Profile\Kontak;
use App\Models\Profile\KontakTipe;
use App\Models\Profile\Pendidikan;
use App\Models\Profile\PendidikanJenis;
use App\Models\Profile\PengalamanLain;
use App\Models\Profile\PengalamanOrganisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use MatthiasMullie\Minify\JS;

class LabController extends Controller
{
    public function migrate()
    {
        $user = auth()->user();

        dd($user->anggota->fotoUrl());
    }

    public function migrateKependudukan()
    {
        // get semua data anggota
        // insert data jenis kontak dan pendidikan
        $kontaks = KontakTipe::all();
        $pendidikans = PendidikanJenis::all();

        foreach ($kontaks as $kontak) {
            $cek = KontakJenis::find($kontak->id);
            if (is_null($cek)) {
                $jenis = new KontakJenis();
                $jenis->id = $kontak->id;
                $jenis->nama = $kontak->nama;
                $jenis->icon = $kontak->icon;
                $jenis->keterangan = $kontak->keterangan;
                $jenis->status = $kontak->status;
                $jenis->save();
            }
        }

        foreach ($pendidikans as $pendidikan) {
            $cek = KeanggotaanPendidikanJenis::find($pendidikan->id);
            if (is_null($cek)) {
                $jenis = new KeanggotaanPendidikanJenis();
                $jenis->id = $pendidikan->id;
                $jenis->nama = $pendidikan->nama;
                $jenis->keterangan = $pendidikan->keterangan;
                $jenis->status = $pendidikan->status;
                $jenis->save();
            }
        }
        // set id mulai dari 1
        $tbl_names = [
            Hobi::tableName,
            KeanggotaanKontak::tableName,
            KeanggotaanPendidikan::tableName,
            KeanggotaanPengalamanLain::tableName,
            KeanggotaanPengalamanOrganisasi::tableName,
            Anggota::tableName,
        ];

        foreach ($tbl_names as $name) {
            DB::statement("ALTER TABLE `$name` auto_increment = 1");
        }

        $users = User::all();
        DB::beginTransaction();
        foreach ($users as $user) {
            $cek = Anggota::where('user_id', $user->id)->get();
            $anggota = new Anggota();
            $anggota->nama = $user->name;
            $anggota->tanggal_lahir = $user->date_of_birth;
            $anggota->jenis_kelamin = $user->gender;
            $anggota->angkatan = $user->angkatan;
            $anggota->province_id = $user->province_id;
            $anggota->regency_id = $user->regency_id;
            $anggota->district_id = $user->district_id;
            $anggota->village_id = $user->village_id;
            $anggota->alamat_lengkap = $user->alamat_lengkap;
            $anggota->bio = $user->bio;
            $anggota->profesi = $user->profesi;
            $anggota->foto = $user->foto;
            $anggota->telepon = $user->telepon;
            $anggota->whatsapp = $user->whatsapp;
            $anggota->status = 'ANGGOTA BIASA';
            $anggota->user_id = $user->id;
            $anggota->save();

            $hobis = Hobby::where('user_id', $user->id)->get();
            foreach ($hobis as $item) {
                $attr = new Hobi();
                $attr->nama = $item->name;
                $attr->anggota_id = $anggota->id;
                $attr->save();
            }

            $kontaks = Kontak::where('user_id', $user->id)->get();
            foreach ($kontaks as $item) {
                $attr = new KeanggotaanKontak();
                $attr->nilai = $item->value;
                $attr->jenis_id = $item->kontak_tipe_id;
                $attr->anggota_id = $anggota->id;
                $attr->save();
            }

            $pendidikans = Pendidikan::where('user_id', $user->id)->get();
            foreach ($pendidikans as $item) {
                $attr = new KeanggotaanPendidikan();
                $attr->dari = $item->dari;
                $attr->sampai = $item->sampai;
                $attr->instansi = $item->instansi;
                $attr->jurusan = $item->jurusan;
                $attr->keterangan = $item->keterangan;
                $attr->jenis_id = $item->pendidikan_jenis_id;
                $attr->anggota_id = $anggota->id;
                $attr->save();
            }

            $pengalamanLains = PengalamanLain::where('user_id', $user->id)->get();
            foreach ($pengalamanLains as $item) {
                $attr = new KeanggotaanPengalamanLain();
                $attr->pengalaman = $item->pengalaman;
                $attr->keterangan = $item->keterangan;
                $attr->anggota_id = $anggota->id;
                $attr->save();
            }

            $pengalamanOrganisasis = PengalamanOrganisasi::where('user_id', $user->id)->get();
            foreach ($pengalamanOrganisasis as $item) {
                $attr = new KeanggotaanPengalamanOrganisasi();
                $attr->nama = $item->nama;
                $attr->dari = $item->dari;
                $attr->sampai = $item->sampai;
                $attr->jabatan = $item->jabatan;
                $attr->keterangan = $item->keterangan;
                $attr->anggota_id = $anggota->id;
                $attr->save();
            }
        }

        DB::commit();

        return "ok";
    }

    public function javascript(Request $request)
    {
        $minifier = new JS(resource_path('views/js/tes.js'));
        return response($minifier->minify())->header('Content-Type', 'application/javascript');
    }

    public function jstes()
    {
        return view('js.view');
    }

    public function phpspreadsheet()
    {
        // data body
        $details = [];
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
        $col_end = "F";
        $title_excel = "List Kolektibilitas";
        // Header excel ================================================================================================
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $spreadsheet->getProperties()
            ->setCreator("Administrator")
            ->setLastModifiedBy("Administrator")
            ->setTitle($title_excel)
            ->setSubject("Administrator")
            ->setDescription("LIst Company $date")
            ->setKeywords("Laporan, Report")
            ->setCategory("Laporan, Report");

        // set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(11);

        // header 2 ====================================================================================================
        $row += 1;
        $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
            ->setCellValue("A$row", "Daftar Kolektibilitas");
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
            'Dari',
            'Sampai',
            'Keterangan',
            'Status',
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
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->nama);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->dari);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->sampai);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->keterangan);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->status_str);
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
        // $row++;
        // // waktu dan tangggal
        // $tanggal = date("d-m-Y H:i:s");
        // $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
        //     ->setCellValue("A$row", "Data ini diambil pada tanggal dan waktu: $tanggal");

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
        $strFilename = 'Testing';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $strFilename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
        die;
    }
}
