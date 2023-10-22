<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 教案一覧取得
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'description', 'level', 'user_id','text_id', 'updated_at')
            ->latest('updated_at')
            ->with(['user', 'text'])
            ->get();

        // ユーザー名、テキスト名を含む新しいコレクションを作成
        $posts = $posts->map(function ($post) {
            $data = [
                "id" => $post->id,
                "title" => $post->title,
                "description" => $post->description,
                "level" => $post->level,
                "user" => [
                    "id" => $post->user_id,
                    "name" => $post->user->name,
                ],
                "text" => [
                    "id" => $post->text_id ?? null,
                    "name" => $post->text->text_name ?? null,
                ],
                "updated_at" => $post->created_at,
            ];

            return $data;
        });

        return response()->json(
            [
                'status' => 'true',
                'result' => [
                    'posts' => $posts,
                ],
            ], 200
        );
    }


    /**
     * 教案の新規保存
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->level = $validated['level'];
        $post->user_id = \Auth::id();
        $post->text_id = $validated['text_id'];

        if (isset($validated['file_name']))
        {
            $file = $validated['file_name'];
            $ext  = $file->getClientOriginalextension();

            // ファイルをストレージへ保存
            $fileName = time() . '.' . $ext;
            $file->storeAs('public/files', $fileName);

            $post->file_name = $fileName;
            $post->file_mimetype = $file->getMimeType();
            $post->file_size = $file->getSize();
        }

        $post->save();

        return response()->json(
            [
                'status' => 'true',
                'result' => [
                    'post' => $post,
                ],
            ], 200
        );
    }

    /**
     * 教案の詳細データ取得
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

        $post = [
            "id" => $post->id,
            "title" => $post->title,
            "description" => $post->description,
            "user" => [
                "id" => $post->user_id,
                "name" => $post->user->name,
            ],
            "file" => [
                "file_name" => $post->file_name ?? null,
                "file_mimetype" => $post->file_mimetype ?? null,
                "file_size" => $post->file_size ?? null,
                "file_url" => $post->file_url,
            ],
            "text" => [
                "id" => $post->text_id ?? null,
                "name" => $post->text->text_name ?? null,
            ],
            "created_at" => $post->created_at,
            "updated_at" => $post->created_at,
        ];

        return response()->json(
            [
                'status' => 'true',
                'result' => [
                    'post' => $post,
                ],
            ], 200
        );
    }

    /**
     * 教案の更新処理
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $this->authorize($post);
        $validated = $request->validated();

        // ファイルの差し替えを行う
        if (isset($validated['file_name']))
        {
            // 元ファイルの削除
            \Storage::delete('public/files/' . $post->file_name);

            // 新ファイルの保存
            $file = $validated['file_name'];
            $ext  = $file->getClientOriginalextension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public/files', $fileName);

            // 新ファイルのデータをpostsテーブルの各カラムに保存
            $post->file_name = $fileName;
            $post->file_mimetype = $file->getMimeType();
            $post->file_size = $file->getSize();
        }

        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->level = $validated['level'];
        $post->text_id = $validated['text_id'];
        $post->save();

        return response()->json(
            [
                'status' => 'true',
                'result' => [
                    'post' => $post,
                ],
            ], 200
        );
    }

    /**
     * 教案の削除処理
     */
    public function destroy(Post $post)
    {
        $this->authorize($post);
        $post->delete();
        // アップロードされたファイルの削除
        \Storage::delete('public/files/' . $post->file_name);

        return response()->json(
            [
                'status' => 'true',
                'result' => "OK",
            ], 200
        );
    }

    /**
     * ブックマークした教案を表示する
     */
    public function bookmark_posts()
    {
        $posts = \Auth::user()
            ->bookmark_posts()
            ->latest()
            ->with('user')
            ->get();

        // ユーザー名、テキスト名を含む新しいコレクションを作成
        $posts = $posts->map(function ($post) {
            $data = [
                "id" => $post->id,
                "title" => $post->title,
                "description" => $post->description,
                "level" => $post->level,
                "user" => [
                    "id" => $post->user_id,
                    "name" => $post->user->name,
                ],
                "text" => [
                    "id" => $post->text_id ?? null,
                    "name" => $post->text->text_name ?? null,
                ],
                "updated_at" => $post->created_at,
            ];

            return $data;
        });

        return response()->json(
            [
                'status' => 'true',
                'result' => [
                    'posts' => $posts,
                ],
            ], 200
        );
    }
}
