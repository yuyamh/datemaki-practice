<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;

class BookmarkController extends Controller
{

    /**
     * ブックマークを追加する
     */
    public function store($postId)
    {
        $user = \Auth::user();
        if (!$user->is_bookmarked($postId))
        {
            $user->bookmark_posts()->attach($postId);
        }

        return response()->json(
            [
                'status' => 'true',
                'result' => 'OK',
            ], 200
        );
    }

    /**
     * ブックマークを削除する
     */
    public function destroy(Bookmark $bookmark)
    {
        
    }
}
