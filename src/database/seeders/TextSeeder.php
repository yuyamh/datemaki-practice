<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Text;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Text::create(['text_name' => 'みんなの日本語 初級Ⅰ']);
        Text::create(['text_name' => 'みんなの日本語 初級Ⅱ']);
        Text::create(['text_name' => 'みんなの日本語 中級Ⅰ']);
        Text::create(['text_name' => 'みんなの日本語 中級Ⅱ']);
        Text::create(['text_name' => 'まるごと 入門（A1）']);
        Text::create(['text_name' => 'まるごと 初級1（A2）']);
        Text::create(['text_name' => 'まるごと 初級2（A2）']);
        Text::create(['text_name' => 'まるごと 初中級（A2/B1）']);
        Text::create(['text_name' => 'まるごと 中級1（B1）']);
        Text::create(['text_name' => 'まるごと 中級2（B1）']);
        Text::create(['text_name' => '初級日本語 げんき 1']);
        Text::create(['text_name' => '初級日本語 げんき 2']);
        Text::create(['text_name' => 'できる日本語 初級']);
        Text::create(['text_name' => 'できる日本語 初中級']);
        Text::create(['text_name' => 'できる日本語 中級']);
        Text::create(['text_name' => 'いろどり 入門（A1）']);
        Text::create(['text_name' => 'いろどり 初級1（A2）']);
        Text::create(['text_name' => 'いろどり 初級2（A2）']);
        Text::create(['text_name' => '日本語初級1 大地']);
        Text::create(['text_name' => '日本語初級2 大地']);
        Text::create(['text_name' => 'Japanese for busy people Ⅰ']);
        Text::create(['text_name' => 'Japanese for busy people Ⅱ']);
        Text::create(['text_name' => 'Japanese for busy people Ⅲ']);
        Text::create(['text_name' => 'つなぐにほんご 初級1']);
        Text::create(['text_name' => 'つなぐにほんご 初級2']);
        Text::create(['text_name' => 'その他']);
    }
}
