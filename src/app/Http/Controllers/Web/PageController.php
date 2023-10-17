<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function terms ()
    {
        // 利用規約のページを表示
        return view('page.terms');
    }

    public function policy()
    {
        // プライバシーポリシーのページを表示
        return view('page.policy');
    }

    public function contact()
    {
        // お問い合わせページを表示する
        return view('page.contact');
    }
}
