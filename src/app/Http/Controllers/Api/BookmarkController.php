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
            $this->setStatusCode(400);
            $this->setErrorMessages(['すでにブックマーク済みです。']);
            $this->setResponseData(['status' => false]);
            return $this->responseFailed();
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
            $this->setStatusCode(400);
            $this->setErrorMessages(['すでにブックマーク解除済みです。']);
            $this->setResponseData(['status' => false]);
            return $this->responseFailed();
        }

        $this->setResponseData(['status' => true]);

        return $this->responseSuccess();
    }
}
