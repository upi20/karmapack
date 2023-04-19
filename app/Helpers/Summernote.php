<?php

namespace App\Helpers;

use League\Config\Exception\ValidationException;

/**
 * Summernote
 */
class Summernote
{
    /**
     * Insert Image
     */
    public static function insert(?string $text, string $folder_asset, string $prefix = ''): object
    {
        try {
            if (is_null($text) || $text == '') {
                return (object)[
                    'first_img' => '',
                    'html' => ''
                ];
            }

            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            $path_image_src = "$folder_asset";

            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = null;
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $image_name = '/' . $prefix . time() . mt_rand(1, 100) . $k  . '.png';
                $image_src = $path_image_src . $image_name;

                $path = public_path() . $image_src;
                file_put_contents($path, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src',  $image_src);

                // set foto icon
                if ($image_icon_status) {
                    $image_icon_status = false;
                    $image_icon = $image_src;
                }
            }

            return (object)[
                'first_img' => $image_icon,
                'html' => $dom->saveHTML()
            ];
        } catch (ValidationException $error) {
            return (object)[
                'first_img' => '',
                'html' => '',
                'error' => $error
            ];
        }
    }

    public static function update(?string $text, string $folder_asset, string $current_foto, string $prefix = ''): object
    {
        try {
            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = $current_foto;

            if (is_null($text) || $text == '') {
                return (object)[
                    'first_img' => $image_icon,
                    'html' => ''
                ];
            }

            $dom = new \DomDocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            $path_image_src = "$folder_asset";
            $path_folder = public_path() . $path_image_src;

            // foto yang dipakai
            $foto_used = [];
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');

                // cek apakah foto dari insert summernote
                if (str_contains($data, 'data:image')) {
                    $data = $img->getAttribute('src');
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name = '/' . $prefix . time() . $k  . '.png';
                    $image_src = $path_image_src . $image_name;

                    $path = public_path() . $image_src;
                    file_put_contents($path, $data);

                    $img->removeAttribute('src');
                    $img->setAttribute('src',  $image_src);

                    // set foto icon
                    if ($image_icon_status) {
                        $image_icon_status = false;
                        $image_icon = $image_src;
                    }

                    $foto_used[] = '/' . $path_image_src . $image_name;
                }

                // simpan untuk icon
                if (!str_contains($data, 'data:image')) {
                    if ($image_icon_status) {
                        $image_icon_status = false;
                        $image_icon = $data;
                    }
                    $foto_used[] = $data;
                }
            }


            // delete foto yang tidak dipakai
            // pake prefix jika summernote lebih dari satu untuk delete filenya
            // $files = scandir($path_folder);
            // $not_used = array_diff($files, $foto_used);
            // dd($not_used, $files, $foto_used);
            // foreach ($files as $file) {
            //     // cek isi folder
            //     if ($file != '.' && $file != '..') {
            //         // delete file
            //         // $this->deleteFile("$path_folder/$file");
            //     }
            // }

            return (object)[
                'first_img' => $image_icon,
                'html' => $dom->saveHTML()
            ];
        } catch (ValidationException $error) {
            return (object)[
                'first_img' => '',
                'html' => '',
                'error' => $error
            ];
        }
    }

    public static function delete($text): bool
    {
        if (is_null($text) || $text == '') {
            return false;
        }

        $result = true;
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            $file = public_path() . $data;
            // validasi
            if ($file != '.' && $file != '..') {
                // delete file
                $res = self::deleteFile($file);
                if (!$res) $result = $res;
            }
        }
        return $result;
    }

    public static function deleteFile(string $file): bool
    {
        $res_foto = true;
        if ($file != null && $file != '') {
            if (file_exists($file)) {
                $res_foto = unlink($file);
            }
        }
        return $res_foto;
    }
}
