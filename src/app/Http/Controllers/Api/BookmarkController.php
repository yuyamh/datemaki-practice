<?php

namespace App\Http\Controllers\Api;

use App\Models\Bookmark;

class BookmarkController extends BaseController
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
            // TODO:エラーレスポンス共通化
            return response()->json(
                [
                    'status' => 'false',
                    'result' => [
                        'message' => 'すでにブックマーク済みです。',
                    ]
                ], 409
            );
        }

        $this->setResponseData(['status' => true]);

        return $this->responseSuccess();
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
            // TODO:エラーレスポンス共通化
            return response()->json(
                [
                    'status' => 'false',
                    'result' => [
                        'message' => 'すでにブックマーク解除済みです。',
                    ]
                ], 409
            );
        }

        $this->setResponseData(['status' => true]);

        return $this->responseSuccess();
    }
}
