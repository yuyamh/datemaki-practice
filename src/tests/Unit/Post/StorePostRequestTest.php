<?php

namespace Tests\Unit\Post;

use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\TextSeeder;
use Tests\TestCase;

/**
 * 投稿リクエストテスト
 */
class StorePostRequestTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // 使用テキストをシーディング
        $this->seed(TextSeeder::class);
    }

    /**
     * 概要 Postリクエストのバリデーションテスト
     * 条件 データプロバイダメソッドのラベル
     * 結果 true:バリデーションOK、false:バリデーションNG
     *
     * @dataProvider validationDataProvider
     */
    public function test_StorePostRequestのバリデーションテスト($keys, $values, $expected)
    {
         //入力項目の配列（$keys）と入力値の配列($values)から連想配列を生成
         $dataList = array_combine($keys, $values);

        $request = new StorePostRequest();
        $rules = $request->rules();
        $validator = Validator::make($dataList, $rules);

        // テスト実施
        $actual = $validator->passes();

        // テスト検証
        $this->assertSame($expected, $actual);
    }

    // データプロバイダメソッド
    public function validationDataProvider(): array
    {
        // テスト用ファイルの生成
        $file = UploadedFile::fake()->image('dummy.jpg');
        $unauthorizedFile = UploadedFile::fake('dummy.rtf');

        // 'ラベル' => [入力項目], [入力値], 期待値
        return [
            '入力項目全て入力（エラーなし）' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A1', $file, 1],
                /* 期待値 */
                true,
            ],
            'タイトルなしでエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['', '概要', 'A1', $file, 1],
                /* 期待値 */
                false,
            ],
            'タイトルが256文字以上でエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                [str_repeat('a', 256), '概要', 'A1', $file, 1],
                /* 期待値 */
                false,
            ],
            'タイトルが255文字（エラーなし）' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                [str_repeat('a', 255), '概要', 'A1', $file, 1],
                /* 期待値 */
                true,
            ],
            'レベルなしでエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', '', $file, 1],
                /* 期待値 */
                false,
            ],
            'レベルに指定された入力値以外の入力でエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A55', $file, 1],
                /* 期待値 */
                false,
            ],
            '概要なしでエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '', 'A1', $file, 1],
                /* 期待値 */
                false,
            ],
            '添付ファイルなしOK' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A1', '', 1],
                /* 期待値 */
                true,
            ],
            '添付ファイルに、指定された拡張子以外のファイル添付でエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A1', $unauthorizedFile, 1],
                /* 期待値 */
                false,
            ],
            '使用テキストなしOK' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A1', $file, ''],
                /* 期待値 */
                true,
            ],
            '使用テキストに指定された入力値以外の入力でエラー' => [
                /* 入力項目 */
                ['title', 'description', 'level', 'file_name', 'text_id'],
                /* 入力値 */
                ['タイトル', '概要', 'A1', $file, '55'],
                /* 期待値 */
                false,
            ],
        ];
    }
}
