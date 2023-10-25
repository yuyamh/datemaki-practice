<?php

namespace App\Services;

class PostService
{


    // アップロードファイルのサイズをメガバイト、キロバイトへ変換
    public function convertBytesToMegaBytes($fileSize)
    {
        // バイトを定義
        $kilobyte = 1024; // 1KB
        $megabyte = $kilobyte * 1000; // 1MB

        if ($megabyte <= $fileSize)
        {
            // メガバイトへ変換、小数点2桁より下の桁は四捨五入
            return $fileSize = round($fileSize / $megabyte, 2) . 'MB';
        } elseif ($kilobyte <= $fileSize)
        {
            // キロバイトへ変換、小数点2桁より下の桁は四捨五入
            return $fileSize = round($fileSize / $kilobyte, 2) . 'KB';
        } else
        {
            return $fileSize = $fileSize . 'B';
        }
    }

}
