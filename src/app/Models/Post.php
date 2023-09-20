<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'level',
        'user_id',
        'file_name',
        'file_mimetype',
        'file_size',
        'text_id',
    ];

    protected $appends = ['file_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function text()
    {
        return $this->belongsTo(Text::class);
    }

    // アップロードされた教案ファイルのアクセサ
    public function getFileUrlAttribute()
    {
        return \Storage::url('public/files/' . $this->file_name);
    }

    // マークダウンをパースする
    public function getDescriptionMarkdownAttribute()
    {
        return \Str::markdown(e($this->description));
    }
}
