<?php

namespace Tests\Unit\User;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

/**
 * プロフィール情報リクエストテスト
 */
class ProfileUpdateRequestTest extends TestCase
{

    use RefreshDatabase;


    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 入力項目が全て入力されている場合
     * 結果 trueを返すこと
     */
    public function test_入力項目全て入力、エラーなし()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = true;

        // テスト検証
        $this->assertSame($expected, $actual);
    }


    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 名前の項目のみ入力されていない場合
     * 結果 falseを返すこと
     */
    public function test_名前が入力されていない場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => '',
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 名前の入力文字数が255文字の場合
     * 結果 trueを返すこと
     */
    public function test_名前の入力文字数が255文字の場合エラーなし()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // メアドの文字数を255文字に設定
        $user->name = str_repeat('a', 255);
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = true;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 名前の入力文字数が255文字の場合
     * 結果 falseを返すこと
     */
    public function test_名前の入力文字数が255文字より大きい場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // 名前の文字数を256文字に設定
        $user->name = str_repeat('a', 256);
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 メアドの項目のみ入力されていない場合
     * 結果 falseを返すこと
     */
    public function test_メールアドレスが入力されていない場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => '',
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 メアドの入力文字数が255文字の場合
     * 結果 trueを返すこと
     */
    public function test_メールアドレスの入力文字数が255文字の場合エラーなし()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // メアドの文字数を255文字に設定
        $user->email = str_repeat('a', 243) . '@example.com'; //「@example.com」は12文字
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = true;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 メアドの入力文字数が255文字より大きい場合
     * 結果 falseを返すこと
     */
    public function test_メールアドレスの入力文字数が255文字より大きい場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // メアドの文字数を256文字に設定
        $user->email = str_repeat('a', 244) . '@example.com'; //「@example.com」は12文字
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 メアドが他のユーザーと重複した場合
     * 結果 falseを返すこと
     */
    public function test_メールアドレスが他ユーザーと重複した場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // 他のユーザーを作成する
        $anotherUser = User::factory()->create([
            'email' => 'aaa@example.com',
        ]);
        // メアドを他のユーザーと重複させる
        $user->email = 'aaa@example.com';
        // プロフィール画像用のダミーファイルを作成する
        $image = UploadedFile::fake()->image('dummy.jpg');

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 プロフィール画像の項目のみ空の場合
     * 結果 trueを返すこと
     */
    public function test_プロフィール画像が空の場合エラーなし()
    {
        // テストユーザを作成する
        $user = User::factory()->create();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => '',
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user)
        {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = true;

        // テスト検証
        $this->assertSame($expected, $actual);
    }


    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 入力項目が全て入力されている場合
     * 結果 trueを返すこと
     */
    public function test_プロフィール画像のサイズが3072キロバイトの場合エラーなし()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // プロフィール画像用のダミー画像を3072キロバイトで作成する
        $image = UploadedFile::fake()->image('dummy.jpg')->size(3072);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = true;

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    /**
     * 概要 プロフィール情報更新のバリデーションチェック
     * 条件 入力項目が全て入力されている場合
     * 結果 trueを返すこと
     */
    public function test_プロフィール画像のサイズが3072キロバイトより大きい場合エラー()
    {
        // テストユーザを作成する
        $user = User::factory()->create();
        // プロフィール画像用のダミー画像を3073キロバイトで作成する
        $image = UploadedFile::fake()->image('dummy.jpg')->size(3073);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'image' => $image,
        ];

        $request = new ProfileUpdateRequest();
        // ProfileUpdateRequest内の$this->user()が、$userを返すように設定する
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        $rules = $request->rules();
        $validator = Validator::make($data, $rules);

        // テスト実施
        $actual = $validator->passes();

        // 期待値を設定
        $expected = false;

        // テスト検証
        $this->assertSame($expected, $actual);
    }
}
