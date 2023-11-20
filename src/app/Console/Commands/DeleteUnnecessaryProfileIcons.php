<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteUnnecessaryProfileIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteProfileIcons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DBに紐付いていない不要なプロフィール画像の削除';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // storage(S3)/public/profile_icons以下に保存されているプロフィール画像の取得
        $icons = Storage::files('public/profile_icons');
        $iconsInStorage = array_map(function ($icon) {
            $parts = explode('public/profile_icons/', $icon);
            return end($parts);
        }, $icons);

        // usersテーブルに紐付いているプロフィール画像の名前を取得
        $iconsInDatabase = User::pluck('profile_image')->toArray();

        // 差分を抽出
        $iconsToBeDeleted = array_diff($iconsInStorage, $iconsInDatabase);

        foreach ($iconsToBeDeleted as $iconname)
        {
            Storage::delete('public/profile_icons/' . $iconname);
        }
    }
}
