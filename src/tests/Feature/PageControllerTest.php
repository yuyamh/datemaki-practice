<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * 利用規約画面が正しく表示できるかテスト
     */
    public function test_利用規約の表示テスト()
    {
        // テスト実行、ホーム画面から利用規約画面へ遷移
        $response = $this->from(route('welcome'))
                         ->get(route('page.terms'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('page.terms')
                 ->assertSee('利用規約');
    }

    /**
     * プライバシーポリシー画面が正しく表示できるかテスト
     */
    public function test_プライバシーポリシーの表示テスト()
    {
        // テスト実行、ホーム画面からプライバシーポリシー画面へ遷移
        $response = $this->from(route('welcome'))
                         ->get(route('page.policy'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('page.policy')
                 ->assertSee('プライバシーポリシー');
    }

    /**
     * お問い合わせ画面が正しく表示できるかテスト
     */
    public function test_お問い合わせの表示テスト()
    {
        // テスト実行、ホーム画面からお問い合わせ画面へ遷移
        $response = $this->from(route('welcome'))
                         ->get(route('page.contact'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('page.contact')
                 ->assertSee('お問い合わせ');
    }
}
