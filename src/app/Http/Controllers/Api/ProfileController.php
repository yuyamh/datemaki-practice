<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ApiProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{

    /**
     * プロフィール情報を一覧取得する
     */
    public function index()
    {
        $user = \Auth::user();

        $response = [
            "id"                => $user->id,
            "name"              => $user->name,
            "email"             => $user->email,
            "email_verified_at" => $user->email_verified_at,
            "role"              => $user->role,
            "profile_image"     => $user->profile_image,
            "image_url"         => $user->profile_image ? $user->image_url : asset('images/user_icon.png'),
            "created_at"        => $user->created_at,
            "updated_at"        => $user->updated_at,
        ];

        $this->setResponseData($response);

        return $this->responseSuccess(false);
    }

    /**
     * プロフィール情報の更新（名前、メールアドレス、プロフィールアイコン）
     */
    public function update(ApiProfileUpdateRequest $request)
    {
        // アクセス権の適用
        $this->authorize($request->user());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email'))
        {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('image'))
        {
            // プロフィール画像ファイルの保存
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->storeAs('public/profile_icons', $filename);

            // 古いプロフィール画像を削除
            if (isset($request->user()->profile_image))
            {
                \Storage::delete('public/profile_icons/' . $request->user()->profile_image);
            }

            $request->user()->profile_image = $filename;
        }

        $request->user()->save();

        $this->setResponseData(['status' => true]);

        return $this->responseSuccess();
    }
}
