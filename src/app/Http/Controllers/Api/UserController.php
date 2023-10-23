<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧取得
     */
    public function index(Request $request)
    {
        // 検索フォームに入力された値を取得
        $keyword = $request->user_name_keyword;

        // 一般ユーザ権限を持つユーザーのみを取得する
        $query = User::select('id', 'name', 'profile_image')
            ->where('role', 'user');

        // キーワードで検索をしたときだけ実行
        if ($keyword)
        {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $users = $query->get();

        // 送信するユーザー情報のコレクションを編成
        $users = $users->map(function ($user) {

            // // プロフィール画像未設定の場合は、デフォルト画像をセットする。
            if ($user->profile_image)
            {
                $data = [
                    "id" => $user->id,
                    "name" => $user->name,
                    "profile_image" => $user->image_url,
                    "posts_counts" => count($user->posts)
                ];
            } else
            {
                $data = [
                    "id" => $user->id,
                    "name" => $user->name,
                    "profile_image" => asset('images/user_icon.png'),
                    "posts_counts" => count($user->posts)
                ];
            }

            return $data;
        });

        return response()->json(
            [
                'status' => 'true',
                'result' => $users,
            ], 200
        );
    }

    /**
     * ユーザ情報の詳細取得
     */
    public function show($id)
    {
        // ユーザーが投稿した教案一覧を表示する。
        $user = User::findOrFail($id);
        $userName = $user->name;
        $posts = $user->posts()
            ->select('id', 'title', 'description', 'level', 'user_id','text_id', 'updated_at')
            ->latest('updated_at')
            ->get();

        // ユーザ情報のコレクションの編成
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

        $data = [
            'user_name' => $userName,
            'posts' => $posts,
        ];


        return response()->json(
            [
                'status' => 'true',
                'result' => $data,
            ], 200
        );
    }
}
