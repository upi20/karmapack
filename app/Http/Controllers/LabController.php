<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\User;
use donatj\UserAgent\UserAgentParser;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use MatthiasMullie\Minify\JS;

class LabController extends Controller
{
    public function set_profile()
    {
        return 'return';
        $users = User::all();
        foreach ($users as $user) {
            $anggota = $user->anggota;
            if ($anggota) {
                $user->foto = $anggota->foto;
                $user->save();
            }
        }
    }

    public function belumisi(Request $request)
    {
        $users = User::with([
            'anggota.district',
            'anggota.village',
            'anggota.regencie',
            'anggota.province',
            'anggota.kontaks.jenis',
            'anggota.pendidikans.jenis',
        ])->orderBy('name')->get();
        // return $users;
        // return 'a';
        $date = date_format(date_create(date('Y-m-d H:i:s')), 'd F Y ');
        $headers = [
            'no',
            'nama',
            'email',
            // 'password',
            'kontak',
            'alamat',
            'tanggal_lahir',
            'jenis_kelamin',
            'angkatan',
            'bio',
            'profesi',
            'telepon',
            'whatsapp',

        ];


        // dd($column);
        // laporan baru
        $row = 1;
        $col_start = "A";
        $col_end = chr(64 + count($headers));
        $title_excel = "Daftar Users Aplikasi SIA";
        // Header excel ================================================================================================
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Dokumen Properti
        $auth_name = 'Isep Lutpi Nur';
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
        foreach ($users as $user) {
            $c = 0;
            $row++;
            $anggota = $user->anggota;
            $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $user->name);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $user->email);
            // $sheet->setCellValue(chr(65 + ++$c) . "$row", "12345678");

            // kontak
            if ($anggota->kontaks) {
                $kontak_str = '';
                foreach ($anggota->kontaks as $kontak) {
                    $new_kontak = $kontak->jenis->nama . " : " . $kontak->nilai;
                    $kontak_str .= ($kontak_str == "") ? $new_kontak : "\n$new_kontak";
                }
                $sheet->setCellValue(chr(65 + ++$c) . "$row", $kontak_str);
            } else {
                $sheet->setCellValue(chr(65 + ++$c) . "$row", "");
            }

            // alamat
            $alamat_str = '';
            $alamat_str .= $anggota->province ? "Provinsi : {$anggota->province->name}" : '';
            $alamat_str .= $anggota->regencie ? "\nKab/Kota : {$anggota->regencie->name}" : '';
            $alamat_str .= $anggota->district ? "\nKecamatan : {$anggota->district->name}" : '';
            $alamat_str .= $anggota->village ? "\nDesa/Kel : {$anggota->village->name}" : '';
            $alamat_str .= $anggota->alamat_lengkap ? "\nAlamat Lengkap : $anggota->alamat_lengkap" : '';
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $alamat_str);

            // anggota
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->tanggal_lahir);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->jenis_kelamin);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->angkatan);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->bio);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->profesi);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->telepon);
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $anggota->whatsapp);

            // foreach ($column as $col) {
            //     $sheet->setCellValue(chr(65 + ++$c) . "$row", $user->anggota->{$col});
            // }
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
        for ($i = 0; $i < count($headers); $i++) {
            $spreadsheet->getActiveSheet()->getColumnDimension(chr(65 + $i))->setAutoSize(true);
        }

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

        // simpan langsung
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $title_excel . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
        die;
    }

    private function usernameGenerator(string $nama): string
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)) . date('YmdHis') . mt_rand(1, 10);
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

    public function count(Request $request)
    {
        // Perangkat pengunjung
        // - Platform
        // - Browser



        $trackers = Tracker::where('has_detail', 0)->get();
        foreach ($trackers as  $tracker) {
            $tracker->createIPDetail();
        }

        $trackers = Tracker::with('ipDetail')->get();

        $is_null = $trackers->filter(function ($query) {
            return is_null($query->ipDetail);
        });

        foreach ($is_null as  $tracker) {
            $tracker->createIPDetail();
        }

        $trackers = Tracker::with('ipDetail')->get();
        return $trackers;
    }

    public function ip_detail(Request $request)
    {
        $id = $request->vistor;
        $vistor = Tracker::find($id);

        if (is_null($vistor)) {
            return response()->json(['result' => false]);
        }

        if ($vistor->has_detail == 1) {
            return response()->json(['result' => false]);
        }

        $vistor->createIPDetail();
        return response()->json(['result' => true]);
    }
}
