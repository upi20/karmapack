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
    public static function insert(string $text, string $folder_asset, string $folder, string $prefix = ''): object
    {
        try {
            $dom = new \DomDocument();
            $dom->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            $path_image_src = "assets/$folder_asset/$folder";
            $path_folder = public_path() . '/' . $path_image_src;

            $directory = explode('/', $path_image_src);
            $curr_folder = public_path();

            // create folder
            foreach ($directory as $dir) {
                $curr_folder .= "/$dir";
                if (!file_exists($curr_folder)) {
                    mkdir($curr_folder, 777);
                }
            }

            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = null;
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $image_name = '/' . $prefix . time() . $k  . '.png';
                $path = $path_folder . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src',  '/' . $path_image_src . $image_name);

                // set foto icon
                if ($image_icon_status) {
                    $image_icon_status = false;
                    $image_icon =  '/' . $path_image_src . $image_name;
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

    public static function update(string $text, string $folder_asset, string $folder, string $current_foto, string $prefix = ''): object
    {
        try {
            $dom = new \DomDocument();
            $dom->loadHtml($text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            $path_image_src = "assets/$folder_asset/$folder";
            $path_folder = public_path() . '/' . $path_image_src;

            $directory = explode('/', $path_image_src);
            $curr_folder = public_path();

            // create folder
            foreach ($directory as $dir) {
                $curr_folder .= "/$dir";
                if (!file_exists($curr_folder)) {
                    mkdir($curr_folder, 777);
                }
            }

            // foto / icon artikel diambil dari foto pertama dalam artikel
            $image_icon_status = true;
            $image_icon = $current_foto;

            // foto yang dipakai
            $foto_used = [];
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');

                // cek apakah foto dari insert summernote
                if (str_contains($data, 'data:image')) {
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name = '/' . $prefix . time() . $k  . '.png';
                    $path = $path_folder . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src',  '/' . $path_image_src . $image_name);
                    $foto_used[] = '/' . $path_image_src . $image_name;

                    // set foto icon
                    if ($image_icon_status) {
                        $image_icon_status = false;
                        $image_icon =  '/' . $path_image_src . $image_name;
                    }
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

    public static function delete(string $folder_asset, string $folder): bool
    {
        $result = true;
        // getfolder
        $path_folder = public_path() . "/assets/$folder_asset/$folder";
        $files = scandir($path_folder);
        foreach ($files as $file) {
            // cek isi folder
            if ($file != '.' && $file != '..') {
                // delete file
                $res = self::deleteFile("$path_folder/$file");
                if (!$res) $result = $res;
            }
        }
        // delete folder
        rmdir($path_folder);
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
