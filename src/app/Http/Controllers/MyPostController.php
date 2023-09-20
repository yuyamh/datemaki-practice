<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \Auth::user()->posts()->latest()->paginate(15);
        $data = ['posts' => $posts];
        return view('myposts.index', $data);
    }
}
