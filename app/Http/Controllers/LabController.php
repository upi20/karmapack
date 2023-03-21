<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan\Anggota;
use App\Models\Keanggotaan\Kontak as KeanggotaanKontak;
use App\Models\Keanggotaan\Pendidikan as KeanggotaanPendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use MatthiasMullie\Minify\JS;

class LabController extends Controller
{
    public function belumisi()
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
        $column = $users[0]->anggota->getFillable();
        unset($column[16]);
        unset($column[15]);
        unset($column[12]);
        unset($column[5]);
        unset($column[6]);
        unset($column[7]);
        unset($column[8]);
        unset($column[0]);
        unset($column[1]);
        $addon = ['no', 'name', 'email', 'password', 'kontak', 'pendidikan'];

        // dd($column);
        // laporan baru
        $row = 1;
        $col_start = "A";
        $col_end = chr(64 + count($column) + count($addon));
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

        // poin-poin header disini
        $headers = array_merge($addon, $column);

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
            $sheet->setCellValue(chr(65 + ++$c) . "$row", "12345678");

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
            $sheet->setCellValue(chr(65 + ++$c) . "$row", $alamat_str);

            foreach ($column as $col) {
                $sheet->setCellValue(chr(65 + ++$c) . "$row", $user->anggota->{$col});
            }
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
        for ($i = 0; $i < count($column) + count($addon); $i++) {
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

        // simpan di folder
        // $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');

        // simpan langsung
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $title_excel . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
        die;
    }

    public function updb()
    {
        return 'ok';
        $lamas = [
            ['nama' => 'Khoerusalam', 'email' => 'khoerusalam@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2015, 'telepon' => '0856875471', 'ig' => ' khoeru_salam', 'fb' => 'https://www.facebook.com/Khoerusalam', 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Abdul Rohman', 'email' => 'abdul.rohman@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2015, 'telepon' => '085759697929', 'ig' => ' arohman325', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dindin Saepudin', 'email' => 'dindin.saepudin@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' dindinsaepudin05', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Suud', 'email' => 'suud@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' suudaliando', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Risal Maulana', 'email' => 'risal.maulana@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' risal_maulana_fauzi', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Cep Ahmad Mustaba', 'email' => 'cep.ahmad.mustaba@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' cepahmadmuztaba', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sufriatna', 'email' => 'sufriatna@karmapack.id', 'district_id' => 3203111, 'angkatan' => 2015, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Erdin', 'email' => 'erdin@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => 'erdin15taufik', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Reva Nudiana', 'email' => 'reva.nudiana@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' reva_nurdiana', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Siti Ulfah', 'email' => 'siti.ulfah@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' stulfah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ai Risna', 'email' => 'ai.risna@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' airisna_suaidah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Lisna', 'email' => 'lisna@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' olili_lisna', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ade Irma Widia', 'email' => 'ade.irma.widia@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' ade_irma_widia', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Resti Susilawati', 'email' => 'resti.susilawati@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' restiisu', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nani Kartini', 'email' => 'nani.kartini@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' putrinanikartini', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Resna', 'email' => 'resna@karmapack.id', 'district_id' => 3203080, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' resnadewi39', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Euis', 'email' => 'euis@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2015, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Akper Bhakti Kencana', 'profesi' => null],
            ['nama' => 'Atik', 'email' => 'atik@karmapack.id', 'district_id' => 3203080, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' utak_atik', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Lely', 'email' => 'lely@karmapack.id', 'district_id' => 3203080, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' lelynurpadilah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Risma', 'email' => 'risma@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Agus Endang', 'email' => 'agus.endang@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2015, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ratra Sri Fauziah', 'email' => 'ratra.sri.fauziah@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' fauziah_2204', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'cucu Aisah', 'email' => 'cucu.aisah@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' cucuaisyah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Elis Sapitri', 'email' => 'elis.sapitri@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' elis_safitrivioleta', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Irma Mariana', 'email' => 'irma.mariana@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2015, 'telepon' => null, 'ig' => ' irmariana', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ahmad Supyandi', 'email' => 'ahmad.supyandi@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' supiyandi04', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Irvan Mubarok', 'email' => 'irvan.mubarok@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' irvanmubarok90', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nurzian Muharom', 'email' => 'nurzian.muharom@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' zianalmunawar', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nursal Pathoni', 'email' => 'nursal.pathoni@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' nursalfathoni', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Fathur Aripin', 'email' => 'm.fathur.aripin@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Bayu Bambang Nurfauzi', 'email' => 'bayu.bambang.nurfauzi@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' bayu_bambang', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Syarip Firmansah', 'email' => 'syarip.firmansah@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ujang Supyandi', 'email' => 'ujang.supyandi@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' us_chem', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Agung Purnama', 'email' => 'agung.purnama@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' agung_6012', 'fb' => null, 'kampus' => 'Universitas Langlangbuana', 'profesi' => null],
            ['nama' => 'Nurhikmat', 'email' => 'nurhikmat@karmapack.id', 'district_id' => null, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Selpan M Sidik', 'email' => 'm.selpan.m.sidik@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' muhamad_mselpan', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Isep Sahroni', 'email' => 'isep.sahroni@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' isep_sahroni', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dicki Firmansyah', 'email' => 'dicki.firmansyah@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Pasundan', 'profesi' => null],
            ['nama' => 'Ahmad Saepudin', 'email' => 'ahmad.saepudin@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Pasundan', 'profesi' => null],
            ['nama' => 'Cici Muftihatu Zahra', 'email' => 'cici.muftihatu.zahra@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' cicimuflihati_z09', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dede Komalasari', 'email' => 'dede.komalasari@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' dedekomalasari_39', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ratna Ningsih', 'email' => 'ratna.ningsih@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Siti Nurfauziah', 'email' => 'siti.nurfauziah@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Fuzi Siti Nufauziah', 'email' => 'fuzi.siti.nufauziah@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' jiwnurfauziah', 'fb' => null, 'kampus' => 'Akper Bhakti Kencana', 'profesi' => null],
            ['nama' => 'Lea Agustin', 'email' => 'lea.agustin@karmapack.id', 'district_id' => null, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' auliagustin', 'fb' => null, 'kampus' => 'AKPER BAKTI KENCANA', 'profesi' => null],
            ['nama' => 'Rispi', 'email' => 'rispi@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' muhammadrispi_', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sinta agustin', 'email' => 'sinta.agustin@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' sinta.agustin.16', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nuriah Jamilah', 'email' => 'nuriah.jamilah@karmapack.id', 'district_id' => 3203010, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' nuriahjamilah35', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ulfah Kusuma Dewi', 'email' => 'ulfah.kusuma.dewi@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' ulfahkusumadewi', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ulfah Safitri', 'email' => 'ulfah.safitri@karmapack.id', 'district_id' => null, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' ulfahsafitri111', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Siti Solihat', 'email' => 'siti.solihat@karmapack.id', 'district_id' => 3203080, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' st.solihat25', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Siti rohmah', 'email' => 'siti.rohmah@karmapack.id', 'district_id' => null, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sari Ningsih', 'email' => 'sari.ningsih@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' nuralawiyah_suhanda', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sri Mulyani', 'email' => 'sri.mulyani@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sifa Vaujiah', 'email' => 'sifa.vaujiah@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ridwan Setiawan', 'email' => 'ridwan.setiawan@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Agung Taupik Yusup', 'email' => 'agung.taupik.yusup@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Depi Pramana', 'email' => 'depi.pramana@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' depipramana26', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Karyawan'],
            ['nama' => 'Rivan Nugraha', 'email' => 'rivan.nugraha@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' rivannugraha', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Adi Permana', 'email' => 'adi.permana@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' adipermana', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Jurnalis'],
            ['nama' => 'Nandito', 'email' => 'nandito@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2012, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Rijal Fauzi', 'email' => 'rijal.fauzi@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2013, 'telepon' => null, 'ig' => ' rijalpauji', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Karyawan'],
            ['nama' => 'Raiman', 'email' => 'raiman@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' raimanalghazali', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Rahmi Rizkia', 'email' => 'rahmi.rizkia@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' rahmi.rizkia', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Sally Aisyah Amini', 'email' => 'sally.aisyah.amini@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Siti Rahmawati', 'email' => 'siti.rahmawati@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' amawwati', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Siti Nurhasanah', 'email' => 'siti.nurhasanah@karmapack.id', 'district_id' => null, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' snur.hasanah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Cucu Nurohmah', 'email' => 'cucu.nurohmah@karmapack.id', 'district_id' => null, 'angkatan' => 2012, 'telepon' => null, 'ig' => ' cucu_nurohmah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nurcahya', 'email' => 'nurcahya@karmapack.id', 'district_id' => null, 'angkatan' => 2012, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ahmad Rusmana', 'email' => 'ahmad.rusmana@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2013, 'telepon' => null, 'ig' => ' ahmed_chaw', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dian Noviandi', 'email' => 'dian.noviandi@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2013, 'telepon' => null, 'ig' => ' diansukses', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Tohir Marzuki', 'email' => 'tohir.marzuki@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2013, 'telepon' => null, 'ig' => ' tohir_marzuki', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Evsha Maria Azkia', 'email' => 'evsha.maria.azkia@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2013, 'telepon' => null, 'ig' => ' mariaevsha', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sugina Hikmawan', 'email' => 'sugina.hikmawan@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2013, 'telepon' => null, 'ig' => 'alm.', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Nenden TS', 'email' => 'nenden.ts@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' arakimbi', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Solihin Nurodin', 'email' => 'solihin.nurodin@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2004, 'telepon' => null, 'ig' => ' solihinnurodin', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Wiraswasta'],
            ['nama' => 'Aludin', 'email' => 'aludin@karmapack.id', 'district_id' => 3203010, 'angkatan' => 2006, 'telepon' => null, 'ig' => ' aludinsoleh', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Wiraswasta'],
            ['nama' => 'Disaf', 'email' => 'disaf@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2004, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Ilin Solihudin', 'email' => 'ilin.solihudin@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2008, 'telepon' => '082121069914', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Dosen'],
            ['nama' => 'Asep Sahrudin', 'email' => 'asep.sahrudin@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2010, 'telepon' => '086794111028', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Notaris'],
            ['nama' => 'Karnawan Sugianto', 'email' => 'karnawan.sugianto@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2009, 'telepon' => null, 'ig' => ' karnawan.sugianto', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Dosen'],
            ['nama' => 'Sutiawan', 'email' => 'sutiawan@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2009, 'telepon' => '085793614006', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Saepurohman Sidik', 'email' => 'saepurohman.sidik@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2012, 'telepon' => '082219436223', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Karyawan'],
            ['nama' => 'Dahi Sugianto', 'email' => 'dahi.sugianto@karmapack.id', 'district_id' => 3203051, 'angkatan' => null, 'telepon' => null, 'ig' => ' dahisugianto', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Asep Sumardani', 'email' => 'asep.sumardani@karmapack.id', 'district_id' => 3203060, 'angkatan' => null, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Samsul Kamil', 'email' => 'samsul.kamil@karmapack.id', 'district_id' => 3203071, 'angkatan' => null, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'M Lutfi K.N', 'email' => 'm.lutfi.k.n@karmapack.id', 'district_id' => 3203061, 'angkatan' => null, 'telepon' => null, 'ig' => ' lutfimohamadkamil', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Karyawan'],
            ['nama' => 'Bais', 'email' => 'bais@karmapack.id', 'district_id' => 3201210, 'angkatan' => null, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Karyawan'],
            ['nama' => 'Erpi Nurapriani', 'email' => 'erpi.nurapriani@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2014, 'telepon' => null, 'ig' => ' erviieyna', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ankri Andria', 'email' => 'ankri.andria@karmapack.id', 'district_id' => 3203070, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rouf_ankriandria', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Maulana Yusuf', 'email' => 'maulana.yusuf@karmapack.id', 'district_id' => 3203110, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' maulanayusufsaburo', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Rini Shofinazah', 'email' => 'rini.shofinazah@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rini.sfnzah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Silpi Amelia', 'email' => 'silpi.amelia@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' silpiamelia', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Ichasn Sukmana', 'email' => 'm.ichasn.sukmana@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' ichan.sukmana', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Andan Hasim', 'email' => 'andan.hasim@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ramdan', 'email' => 'ramdan.uin@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ripdar', 'email' => 'ripdar@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rifdarmaulana12', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Abdul Pawaj', 'email' => 'abdul.pawaj@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Asep Diden', 'email' => 'asep.diden@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' asep_didenss', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Maulana Akbar', 'email' => 'maulana.akbar@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Maya Syifa Kamila', 'email' => 'maya.syifa.kamila@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' mayaswafakamilah', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'ika Santika', 'email' => 'ika.santika@karmapack.id', 'district_id' => null, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Rina Melati', 'email' => 'rina.melati@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rinamelati98', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Siti Yani', 'email' => 'siti.yani@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' sityanii98', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Rudi Habibi', 'email' => 'rudi.habibi@karmapack.id', 'district_id' => 3203111, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rudy_habibie07', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Deni Nurhidayat', 'email' => 'deni.nurhidayat@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' deni_nurhidayat97', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ilham Rahmanto', 'email' => 'ilham.rahmanto@karmapack.id', 'district_id' => 3203110, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' ilham.rahmanto.46', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Iqbal Fauzi', 'email' => 'm.iqbal.fauzi@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' fm_iqbal', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Anas Bayan', 'email' => 'anas.bayan@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' abm_0810', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Cep Ilyas Amirulloh', 'email' => 'cep.ilyas.amirulloh@karmapack.id', 'district_id' => 3203051, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' ilyas_2403', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dede Munasiroh', 'email' => 'dede.munasiroh@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Harkat Syam Meiriza', 'email' => 'harkat.syam.meiriza@karmapack.id', 'district_id' => 3603030, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' harkat_syam', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Burhanudin', 'email' => 'm.burhanudin@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ridwan Asyari', 'email' => 'ridwan.asyari@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Hasan Munadi', 'email' => 'hasan.munadi@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Syifa A.M', 'email' => 'm.syifa.a.m@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Hikmat Saepul', 'email' => 'hikmat.saepul@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Robi Naufal Julian', 'email' => 'robi.naufal.julian@karmapack.id', 'district_id' => 3203110, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Ali Idrus', 'email' => 'm.ali.idrus@karmapack.id', 'district_id' => 3203010, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'M Rohman', 'email' => 'm.rohman@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Agung', 'email' => 'agung@karmapack.id', 'district_id' => 1810030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sintia J S', 'email' => 'sintia.j.s@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Bahrul Ulum', 'email' => 'bahrul.ulum@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' bahrul2883', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Puad Rijan Pauzi', 'email' => 'puad.rijan.pauzi@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' puad_rijan_pauji', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Desanti', 'email' => 'desanti@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' desan_', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Yeti Setiawati', 'email' => 'yeti.setiawati@karmapack.id', 'district_id' => 3203090, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' setiayeti', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sipa Saripah', 'email' => 'sipa.saripah@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Akmal', 'email' => 'akmal@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Yamiluki', 'email' => 'yamiluki@karmapack.id', 'district_id' => 3203010, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Riska', 'email' => 'riska@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' airiska1904', 'fb' => null, 'kampus' => 'Institut Keguruan Ilmu Pendidikan (IKIP) Siliwangi Cimahi', 'profesi' => null],
            ['nama' => 'Yunus', 'email' => 'yunus@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' yunussaepudin1', 'fb' => null, 'kampus' => 'Sekolah Tinggi Teknologi Mandala Bandung', 'profesi' => null],
            ['nama' => 'Arip', 'email' => 'arip@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' arip.id', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Yeli', 'email' => 'yeli@karmapack.id', 'district_id' => 3203080, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' yeli janianti', 'fb' => null, 'kampus' => 'Institut Keguruan Ilmu Pendidikan (IKIP) Siliwangi Cimahi', 'profesi' => null],
            ['nama' => 'Siti Robiah Adawiah', 'email' => 'siti.robiah.adawiah@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' adawiah.sitirobiah', 'fb' => null, 'kampus' => 'Universitas Islam Nusantara', 'profesi' => null],
            ['nama' => 'Hanita', 'email' => 'hanita@karmapack.id', 'district_id' => null, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' hanitahendarwati709', 'fb' => null, 'kampus' => 'Universitas Islam Nusantara', 'profesi' => null],
            ['nama' => 'Supiyandi', 'email' => 'supiyandi@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Nusantara', 'profesi' => null],
            ['nama' => 'Ramdan UNINUS', 'email' => 'ramdan.uninus@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Nusantara', 'profesi' => null],
            ['nama' => 'Rina Pujianti', 'email' => 'rina.pujianti@karmapack.id', 'district_id' => 3203030, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dera', 'email' => 'dera@karmapack.id', 'district_id' => null, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Arip Padillah', 'email' => 'arip.padillah@karmapack.id', 'district_id' => 3203020, 'angkatan' => 2016, 'telepon' => null, 'ig' => null, 'fb' => null, 'kampus' => 'AKPER BAKTI KENCANA', 'profesi' => null],
            ['nama' => 'Deuis Suci Wulansari', 'email' => 'deuis.suci.wulansari@karmapack.id', 'district_id' => 1609100, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' deuissuci_', 'fb' => null, 'kampus' => 'Universitas Pendidikan Indonesia', 'profesi' => null],
            ['nama' => 'Eva Puspita', 'email' => 'eva.puspita@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' pusvitaeva', 'fb' => null, 'kampus' => 'Universitas Pendidikan Indonesia', 'profesi' => null],
            ['nama' => 'Masud', 'email' => 'masud@karmapack.id', 'district_id' => 3203071, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' 09_masud', 'fb' => null, 'kampus' => 'Universitas Suryakancana', 'profesi' => null],
            ['nama' => 'Aris Munandar', 'email' => 'aris.munandar@karmapack.id', 'district_id' => null, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' arism24', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Neng Maria Ulfa', 'email' => 'neng.maria.ulfa@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' nmariaulfa', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Riyana Abdul Rijak', 'email' => 'riyana.abdul.rijak@karmapack.id', 'district_id' => 3203061, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' rijack9', 'fb' => null, 'kampus' => 'UNIVERSITAS BINA SARANA INFORMATIKA', 'profesi' => null],
            ['nama' => 'Tita Khoerunisa', 'email' => 'tita.khoerunisa@karmapack.id', 'district_id' => 3203060, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' titakhoerunnisa01', 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ikang', 'email' => 'ikang@karmapack.id', 'district_id' => 3201210, 'angkatan' => 2016, 'telepon' => null, 'ig' => ' ikang_pr', 'fb' => null, 'kampus' => 'Universitas Pasundan', 'profesi' => null],
            ['nama' => 'Acep akid', 'email' => 'acep.akid@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '081563263645', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'bambang', 'email' => 'bambang@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085776554385', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Bagja', 'email' => 'bagja@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '08793189919', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Igun', 'email' => 'igun@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085871562155', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'nadmudin', 'email' => 'nadmudin@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085721991836', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Midah', 'email' => 'midah@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085759595061', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Lesti', 'email' => 'lesti@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085624701854', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Desi', 'email' => 'desi@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '08721593522', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Dahi', 'email' => 'dahi@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085720411628', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Asep', 'email' => 'asep@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085871999315', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Heri L', 'email' => 'heri.l@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085860399382', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Andri', 'email' => 'andri@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085860523460', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ajeng', 'email' => 'ajeng@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '087778711870', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Apip', 'email' => 'apip@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085723008915', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Arul', 'email' => 'arul@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '08788162942', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Juju', 'email' => 'juju@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '087720297447', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Miftah', 'email' => 'miftah@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '083817188509', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Sesep', 'email' => 'sesep@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085723379495', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Adisaf', 'email' => 'adisaf@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '08969186687', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => null],
            ['nama' => 'Ridwan Effendi', 'email' => 'ridwan.effendi@karmapack.id', 'district_id' => 3203060, 'angkatan' => null, 'telepon' => '085860211827', 'ig' => null, 'fb' => null, 'kampus' => 'Universitas Islam Negeri Sunan Gunung Djati Bandung', 'profesi' => 'Guru'],
            ['nama' => 'Heri Koeswanto', 'email' => 'heri.koeswanto@karmapack.id', 'district_id' => 3203030, 'angkatan' => null, 'telepon' => '081646859468', 'ig' => null, 'fb' => null, 'kampus' => null, 'profesi' => null],
            ['nama' => 'Tabah Nurohman', 'email' => 'tabah.nurohman@karmapack.id', 'district_id' => null, 'angkatan' => null, 'telepon' => '085294798342', 'ig' => null, 'fb' => null, 'kampus' => null, 'profesi' => null],
            ['nama' => 'Yopi Ahmad Alpatih', 'email' => 'yopi.ahmad.alpatih@karmapack.id', 'district_id' => 3201210, 'angkatan' => null, 'telepon' => '085846153024', 'ig' => null, 'fb' => null, 'kampus' => null, 'profesi' => null],
        ];

        DB::beginTransaction();
        foreach ($lamas as $lama) {
            // Simpan user
            $user = new User();
            $user->name = $lama['nama'];
            $user->email = $lama['email'];
            $user->username = $this->usernameGenerator($lama['nama']);
            $user->active = 1;
            $user->password = Hash::make('12345678');
            $user->save();

            // simpan role
            $user->assignRole(['Alumni']);

            // simpan ke data anggota
            $anggota = new Anggota();
            $anggota->nama = $lama['nama'];
            $anggota->angkatan = $lama['angkatan'];
            $anggota->telepon = $lama['telepon'];
            $anggota->province_id = 32;
            $anggota->regency_id = 3203;
            $anggota->district_id = $lama['district_id'];
            $anggota->profesi = $lama['profesi'];
            $anggota->user_id = $user->id;
            $anggota->save();

            if ($lama['kampus'] !== null) {
                $pendidikan = new KeanggotaanPendidikan();
                $pendidikan->anggota_id = $anggota->id;
                $pendidikan->jenis_id = 5;
                $pendidikan->instansi = $lama['kampus'];

                if ($lama['angkatan'] !== null) {
                    $pendidikan->dari = $lama['angkatan'];
                    $pendidikan->sampai = $lama['angkatan'] + 4;
                } else {
                    $pendidikan->dari = 2003;
                    $pendidikan->sampai = 2007;
                }
                $pendidikan->save();
            }

            // simpan kontak
            if ($lama['ig'] !== null) {
                $kontak = new KeanggotaanKontak();
                $kontak->anggota_id = $anggota->id;
                $kontak->jenis_id = 5;
                $kontak->nilai = "https://www.instagram.com/" . $lama['ig'];
                $kontak->save();
            }

            if ($lama['fb'] !== null) {
                $kontak = new KeanggotaanKontak();
                $kontak->anggota_id = $anggota->id;
                $kontak->jenis_id = 1;
                $kontak->nilai = $lama['fb'];
                $kontak->save();
            }
        }
        DB::commit();
        return $lamas;
    }

    private function usernameGenerator(string $nama): string
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)) . date('YmdHis') . mt_rand(1, 10);
    }


    public function migrate()
    {
        // $this->migrateKepengurusan();
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

    // public function phpspreadsheet()
    // {
    //     // data body
    //     $details = [];
    //     $bulan_array = [
    //         1 => 'Januari',
    //         2 => 'February',
    //         3 => 'Maret',
    //         4 => 'April',
    //         5 => 'Mei',
    //         6 => 'Juni',
    //         7 => 'Juli',
    //         8 => 'Agustus',
    //         9 => 'September',
    //         10 => 'Oktober',
    //         11 => 'November',
    //         12 => 'Desember',
    //     ];
    //     $today_m = (int)Date("m");
    //     $today_d = (int)Date("d");
    //     $today_y = (int)Date("Y");

    //     $last_date_of_this_month =  date('t', strtotime(date("Y-m-d")));

    //     $date = $today_d . " " . $bulan_array[$today_m] . " " . $today_y;

    //     // laporan baru
    //     $row = 1;
    //     $col_start = "A";
    //     $col_end = "F";
    //     $title_excel = "List Kolektibilitas";
    //     // Header excel ================================================================================================
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();

    //     // Dokumen Properti
    //     $spreadsheet->getProperties()
    //         ->setCreator("Administrator")
    //         ->setLastModifiedBy("Administrator")
    //         ->setTitle($title_excel)
    //         ->setSubject("Administrator")
    //         ->setDescription("LIst Company $date")
    //         ->setKeywords("Laporan, Report")
    //         ->setCategory("Laporan, Report");

    //     // set default font
    //     $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
    //     $spreadsheet->getDefaultStyle()->getFont()->setSize(11);

    //     // header 2 ====================================================================================================
    //     $row += 1;
    //     $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
    //         ->setCellValue("A$row", "Daftar Kolektibilitas");
    //     $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray([
    //         "font" => [
    //             "bold" => true,
    //             "size" => 13
    //         ],
    //         "alignment" => [
    //             "horizontal" => Alignment::HORIZONTAL_CENTER,
    //         ],
    //     ]);

    //     // Tabel =======================================================================================================
    //     // Tabel Header
    //     $row += 2;
    //     $styleArray = [
    //         'font' => [
    //             'bold' => true,
    //         ],
    //         'alignment' => [
    //             'horizontal' => Alignment::HORIZONTAL_CENTER,
    //         ],
    //         'borders' => [
    //             'allBorders' => [
    //                 'borderStyle' => Border::BORDER_THIN,
    //             ],
    //         ],
    //         'fill' => [
    //             'fillType' => Fill::FILL_SOLID,
    //             'startColor' => [
    //                 'rgb' => '93C5FD',
    //             ]
    //         ],
    //     ];
    //     $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);
    //     $row++;
    //     $styleArray['fill']['startColor']['rgb'] = 'E5E7EB';
    //     $sheet->getStyle($col_start . $row . ":" . $col_end . $row)->applyFromArray($styleArray);

    //     // poin-poin header disini
    //     $headers = [
    //         'No',
    //         'Nama',
    //         'Dari',
    //         'Sampai',
    //         'Keterangan',
    //         'Status',
    //     ];

    //     // apply header
    //     for ($i = 0; $i < count($headers); $i++) {
    //         $sheet->setCellValue(chr(65 + $i) . ($row - 1), $headers[$i]);
    //         $sheet->setCellValue(chr(65 + $i) . $row, ($i + 1));
    //     }

    //     // tabel body
    //     $styleArray = [
    //         'borders' => [
    //             'allBorders' => [
    //                 'borderStyle' => Border::BORDER_THIN,
    //                 'color' => ['argb' => '000000'],
    //             ],
    //         ],
    //         "alignment" => [
    //             'wrapText' => TRUE,
    //             'vertical' => Alignment::VERTICAL_TOP
    //         ]
    //     ];
    //     $start_tabel = $row + 1;
    //     foreach ($details as $detail) {
    //         $c = 0;
    //         $row++;
    //         $detail = (object)$detail;
    //         $sheet->setCellValue(chr(65 + $c) . "$row", ($row - 5));
    //         $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->nama);
    //         $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->dari);
    //         $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->sampai);
    //         $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->keterangan);
    //         $sheet->setCellValue(chr(65 + ++$c) . "$row", $detail->status_str);
    //     }
    //     // format
    //     // nomor center
    //     $sheet->getStyle($col_start . $start_tabel . ":" . $col_start . $row)
    //         ->getAlignment()
    //         ->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //     // border all data
    //     $sheet->getStyle($col_start . $start_tabel . ":" . $col_end . $row)
    //         ->applyFromArray($styleArray);

    //     $spreadsheet->getActiveSheet()->getStyle('B' . $start_tabel . ":B" . $row)->getNumberFormat()
    //         ->setFormatCode('0');

    //     // $code_rm = '_-[$RM-ms-MY]* #.##0,00_-;-[$RM-ms-MY]* #.##0,00_-;_-[$RM-ms-MY]* "-"??_-;_-@_-';
    //     // $sheet->getStyle("F" . $start_tabel . ":" . $col_end . $row)->getNumberFormat()->setFormatCode($code_rm);
    //     // $sheet->getStyle("G" . $start_tabel . ":" . "G" . $row)
    //     //     ->getNumberFormat()
    //     //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    //     // $sheet->getStyle("I" . $start_tabel . ":" . "I" . $row)
    //     //     ->getNumberFormat()
    //     //     ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

    //     // // set alignment
    //     // $sheet->getStyle("A" . $start_tabel . ":" . "A" . $row)->getAlignment()->setHorizontal('center');
    //     // $sheet->getStyle("B" . $start_tabel . ":" . "B" . $row)->getAlignment()->setHorizontal('center');
    //     // $sheet->getStyle("C" . $start_tabel . ":" . "C" . $row)->getAlignment()->setHorizontal('center');
    //     // $sheet->getStyle("C" . $start_tabel . ":D" . $row)
    //     //     ->getAlignment()
    //     //     ->setHorizontal(Alignment::HORIZONTAL_LEFT);

    //     // footer
    //     // $row += 3;
    //     // $sheet->setCellValue("Q" . $row, "Kasui, $date");

    //     // $row += 3;
    //     // $sheet->setCellValue("Q" . $row, "(.....................................)");
    //     // $row++;
    //     // // waktu dan tangggal
    //     // $tanggal = date("d-m-Y H:i:s");
    //     // $sheet->mergeCells($col_start . $row . ":" . $col_end . $row)
    //     //     ->setCellValue("A$row", "Data ini diambil pada tanggal dan waktu: $tanggal");

    //     // function for width column
    //     function w($width)
    //     {
    //         return 0.71 + $width;
    //     }

    //     // set width column
    //     $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    //     $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

    //     // set  printing area
    //     $spreadsheet->getActiveSheet()->getPageSetup()->setPrintArea($col_start . '1:' . $col_end . $row);
    //     $spreadsheet->getActiveSheet()->getPageSetup()
    //         ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
    //     $spreadsheet->getActiveSheet()->getPageSetup()
    //         ->setPaperSize(PageSetup::PAPERSIZE_A4);

    //     // margin
    //     $spreadsheet->getActiveSheet()->getPageMargins()->setTop(1);
    //     $spreadsheet->getActiveSheet()->getPageMargins()->setRight(0);
    //     $spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0);
    //     $spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0);

    //     // page center on
    //     $spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
    //     $spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

    //     // simpan di folder
    //     // $writer = new Xlsx($spreadsheet);
    //     // $writer->save('hello world.xlsx');

    //     // simpan langsung
    //     $strFilename = 'Testing';
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="' . $strFilename . '.xlsx"');
    //     header('Cache-Control: max-age=0');
    //     $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    //     $writer->save('php://output');
    //     exit;
    //     die;
    // }
}
