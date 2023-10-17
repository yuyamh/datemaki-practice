<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ユーザー検索
        // 検索フォームに入力された値を取得
        $keyword = $request->user_name_keyword;

        // roleカラムに'user'の値を持つユーザーのみを取得する
        $query = User::where('role', 'user')->latest();

        // キーワードで検索をしたときだけ実行
        if ($keyword)
        {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $users = $query->paginate(15);
        $data = ['users' => $users];

        return view('users.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ユーザーが投稿した教案一覧を表示する。
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest()->paginate(15);
        $user_name = $user->name;
        $data = ['posts' => $posts, 'user_name' => $user_name];

        return view('users.show', $data);
    }
}
