<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->isLocal() || app()->runningUnitTests())
        {
            // 開発＆テスト環境
            // storage/app/public/fileディレクトリと、その中身の全削除
            if (Storage::disk('public')->exists('files'))
            {
                Storage::deleteDirectory('public/files');
            }

            // アップロードされたプロフィール画像を全削除
            if (Storage::disk('public')->exists('profile_icons'))
            {
                Storage::deleteDirectory('public/profile_icons');
            }
        } else
        {
            // 本番環境
            // S3のfileディレクトリと、その中身の全削除
            if (Storage::disk('s3')->exists('public/files'))
            {
                Storage::deleteDirectory('public/files');
            }

            // アップロードされたプロフィール画像を全削除
            if (Storage::disk('s3')->exists('public/profile_icons'))
            {
                Storage::deleteDirectory('public/profile_icons');
            }
        }

        // テキストとゲストユーザーのseeding実行
        $this->call([
            GuestUserSeeder::class,
            AdminUserSeeder::class,
            TextSeeder::class,
        ]);

        if (app()->isLocal() || app()->runningUnitTests())
        {
            //開発&テスト環境はファクトリでダミーデータ登録。
            $this->call([
                DummyDataSeeder::class, //ダミーデータの登録
            ]);
        } else
        {
            // 本番環境は本格的なサンプルデータ登録。
            $this->call([
                SampleUserSeeder::class, // サンプルユーザの登録
                SamplePostsSeeder::class, // サンプルデータの登録
            ]);
        }
    }
}
