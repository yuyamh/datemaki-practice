<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 教案一覧取得
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json($posts, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 教案の詳細データ取得
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (isset($post->file_size))
        {
            $kilobyte = 1024; // 1KB
            $megabyte = $kilobyte * 1000; // 1MB

            // アップロードファイルのサイズをメガバイト、キロバイトへ変換
            if ($megabyte <= $post->file_size)
            {
                // メガバイトへ変換、小数点2桁より下の桁は四捨五入
                $post->file_size = round($post->file_size / $megabyte, 2) . 'MB';
            } elseif ($kilobyte <= $post->file_size)
            {
                // キロバイトへ変換、小数点2桁より下の桁は四捨五入
                $post->file_size = round($post->file_size / $kilobyte, 2) . 'KB';
            } else
            {
                $post->file_size = $post->file_size . 'B';
            }
        }

        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
