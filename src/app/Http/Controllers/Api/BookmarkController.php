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
        } else
        {
            // すでにブックマーク済みの場合
            return response()->json(
                [
                    'status' => 'false',
                    'result' => [
                        'message' => 'すでにブックマーク済みです。',
                    ]
                ], 409
            );
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
    public function destroy($postId)
    {
        $user = \Auth::user();
        if ($user->is_bookmarked($postId))
        {
            $user->bookmark_posts()->detach($postId);
        } else
        {
            // すでにブックマーク解除済みの場合
            return response()->json(
                [
                    'status' => 'false',
                    'result' => [
                        'message' => 'すでにブックマーク解除済みです。',
                    ]
                ], 409
            );
        }

        return response()->json(
            [
                'status' => 'true',
                'result' => 'OK',
            ], 200
        );
    }
}
