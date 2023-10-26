<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthenticateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
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
            return response()->json(['token' => $token], 200);
        } else
        {
            return response()->json(['error' => '認証に失敗しました。'], 401);
        }
    }

    /**
     * ログイン中のユーザ情報を返す
     */
    public function user(Request $request)
    {
        return response()->json(
            [
                $request->user()->name,
                $request->user()->email,
            ]
        );
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'ログアウトしました。'], 200);
    }
}
