<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteUnnecessaryUploadedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteFiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DBに紐付いていない不要な添付ファイルの自動削除';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // ストレージ（S3）以下に保存されている添付ファイルの取得
        $files = Storage::files('public/files');
        $filesInStorage = array_map(function ($file) {
            $parts = explode('public/files/', $file);
            return end($parts);
        }, $files);

        // postsテーブルに紐付いている添付ファイルの名前を取得
        $filesInDatabase = Post::pluck('file_name')->toArray();

        // 差分を抽出
        $filesToBeDeleted = array_diff($filesInStorage, $filesInDatabase);

        foreach ($filesToBeDeleted as $filename)
        {
            Storage::delete('public/files/' . $filename);
        }
    }
}
