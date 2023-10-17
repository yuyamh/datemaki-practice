<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // アクセス権の適用
        $this->authorize($request->user());

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // ユーザーが設定したプロフィールアイコン画像の削除
        if ((\Storage::exists('public/profile_icons')) && !is_null($user->profile_image))
        {
            \Storage::delete('public/profile_icons/' . $user->profile_image);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
