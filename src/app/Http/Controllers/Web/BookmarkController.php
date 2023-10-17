<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;

class BookmarkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param $postId
     * @return \Illuminate\Http\Response
     */
    public function store($postId)
    {
        $user = \Auth::user();
        if (!$user->is_bookmarked($postId))
        {
            $user->bookmark_posts()->attach($postId);
        }

        return back()->with('successMessage', 'ブックマーク一覧に保存しました。');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $postId
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $user = \Auth::user();
        if ($user->is_bookmarked($postId))
        {
            $user->bookmark_posts()->detach($postId);
        }

        return back();
    }
}
