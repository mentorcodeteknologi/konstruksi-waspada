<?php

namespace App\Helpers;


class Helpers
{

    // ================================= //
    // FUNCTION GENERATE RANDOM STRING
    // ================================= //
    function generateRandomString($length = 8, $uniq)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $uniq . $randomString;
    }

    // ================================= //
    // FUNCTION GENERATE SLUG
    // ================================= //
    function generateSlug()
    {
        $characters     = 'abcdefghijklmnopqrstuvwxyz';
        $shuffled       = str_shuffle($characters);
        $slug           = substr($shuffled, 0, -25);
        $slug          .= bin2hex(random_bytes(5)) . "-e" . date('Ymdthis');
        return $slug;
    }

    // ================================= //
    // FUNCTION DELETE DIRECTORY
    // ================================= //
    function deleteDir($path)
    {
        // Cek apakah path adalah direktori
        if (!is_dir($path)) {
            return false;
        }

        // Buka direktori
        $dirHandle = opendir($path);
        if (!$dirHandle) {
            return false;
        }

        // Loop setiap file dalam direktori
        while (($file = readdir($dirHandle)) !== false) {
            if ($file != '.' && $file != '..') {
                // Jika file adalah direktori, panggil deleteDir untuk menghapusnya rekursif
                if (is_dir($path . '/' . $file)) {
                    deleteDir($path . '/' . $file);
                } else {
                    // Jika file adalah file biasa, hapus file
                    unlink($path . '/' . $file);
                }
            }
        }

        // Tutup handle direktori
        closedir($dirHandle);

        // Hapus direktori kosong
        if (rmdir($path)) {
            return true;
        } else {
            return false;
        }
    }
}
