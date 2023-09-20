<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyPostControllerTest extends TestCase
{

    use RefreshDatabase;

    private $user;
    private $myPost;
    private $otherPost;

    public function setUp(): void
    {
        parent::setUp();

        // ユーザを2件生成、うち1件をテストユーザ（ログイン対象）に設定
        User::factory()->count(2)->create();
        $this->user = User::find(1);

        // テスト用投稿（ログイン対象のユーザ）を1件生成
        $this->myPost = Post::factory()->create([
            'user_id' => $this->user->id,
        ]);

        // 他のユーザの投稿を生成
        $this->otherPost = Post::factory()->create([
            'title' => '他のユーザの投稿',
            'user_id' => 2,
        ]);
    }

    /**
     * じぶんの教案一覧画面が正しく表示できるかテスト
     */
    public function test_indexアクションテスト()
    {
        // テスト実行、みんなの教案一覧画面からじぶんの教案一覧画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.index'))
                         ->get(route('myposts.index'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('myposts.index')
                 ->assertViewHas(['posts'])
                 ->assertSee($this->myPost->title) // 自分の投稿が表示されていることを確認
                 ->assertDontSee($this->otherPost->title); // 他のユーザーの投稿が表示されていないことを確認
    }
}
