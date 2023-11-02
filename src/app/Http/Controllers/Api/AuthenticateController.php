<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends BaseController
{

    /**
     * ログイン認証
     */
    public function login(AuthenticateRequest $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            $token = Auth::user()->createToken('AccessToken')->plainTextToken;
            $this->setResponseData(['token' => $token]);
            return $this->responseSuccess();
        } else
        {
            // TODO:エラーレスポンス
            return response()->json(['error' => '認証に失敗しました。'], 401);
        }
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $this->setResponseData(['status' => 'true']);

        return $this->responseSuccess();
    }
}
