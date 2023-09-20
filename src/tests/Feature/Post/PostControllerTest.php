<?php

namespace Tests\Feature\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    use RefreshDatabase;

    private $user;
    private $post;
    private $data;
    private $file;

    public function setUp(): void
    {
        parent::setUp();

        // テスト用ユーザを1件生成
        $this->user = User::factory()->create();

        // テスト用投稿を1件生成
        $this->post = Post::factory()->create([
            'user_id' => 1,
        ]);

        // store, updateアクションに必要なダミーファイルを生成
        $this->file = UploadedFile::fake()->image('dummy.jpg');

        // store, updateアクションに必要なデータを作成
        $this->data = [
            'title' => $this->post->title,
            'description' => $this->post->description,
            'level' => $this->post->level,
            'user_id' => $this->user->id,
            'file_name' => $this->file,
            'file_mimetype' => $this->post->file_mimetype,
            'file_size' => $this->post->file_size,
            'text_id' => $this->post->text_id,
        ];
    }

    /**
     * 教案一覧画面が正しく表示できるかテスト
     */
    public function test_indexアクションテスト()
    {
        // テスト実行、ホーム画面からみんなの教案一覧画面へ遷移
        $response = $this->from(route('welcome'))
                         ->get(route('posts.index'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('posts.index')
                 ->assertViewHas(['posts']);
    }

    /**
     * 教案投稿画面が正しく表示できるかテスト
     */
    public function test_createアクションテスト()
    {
        // テスト実行、教案一覧画面から教案投稿画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.index'))
                         ->get(route('posts.create'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('posts.create');
    }

    /**
     * 教案投稿処理が正しく実行できるかテスト
     */
    public function test_storeアクションテスト()
    {
        // テスト実行、投稿後に教案投稿画面からじぶんの教案一覧画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.create'))
                         ->post(route('posts.store'), $this->data);

        // テスト検証
        $response->assertRedirect(route('myposts.index'));
    }

    /**
     * 教案詳細画面が正しく表示できるかテスト
     */
    public function test_showアクションテスト()
    {
        // テスト実行、みんなの教案一覧画面から教案詳細画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.index'))
                         ->get(route('posts.show', ['post' => $this->post]));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('posts.show')
                 ->assertViewHas('post');
    }

    /**
     * 教案詳細画面が正しく表示できるかテスト
     */
    public function test_editアクションテスト()
    {
        // テスト実行、教案詳細画面から教案編集画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.show', ['post' => $this->post]))
                         ->get(route('posts.edit', ['post' => $this->post]));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('posts.edit')
                 ->assertViewHas('post');
    }

    /**
     * 教案更新処理が正しく実行できるかテスト
     */
    public function test_updateアクションテスト()
    {
        // テスト実行、編集後に教案編集画面から教案詳細画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.edit', ['post' => $this->post]))
                         ->patch(route('posts.update', ['post' => $this->post]), $this->data);

        // テスト検証
        $response->assertRedirect(route('posts.show', ['post' => $this->post]));
    }

    /**
     * 教案削除処理が正しく実行できるかテスト
     */
    public function test_destroyアクションテスト()
    {
        // テスト実行、編集後に教案削除画面からじぶんの教案一覧画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.show', ['post' => $this->post]))
                         ->delete(route('posts.destroy', ['post' => $this->post]));

        // テスト検証
        $response->assertRedirect(route('myposts.index'));
    }

    /**
     * ブックマークした教案画面が正しく表示できるかテスト
     */
    public function test_ブックマークした教案一覧画面の表示テスト()
    {
        // テスト実行、ホーム画面からみんなの教案一覧画面へ遷移
        $response = $this->actingAs($this->user)
                         ->from(route('posts.index'))
                         ->get(route('bookmarks'));

        // テスト検証
        $response->assertOk()
                 ->assertViewIs('posts.bookmarks')
                 ->assertViewHas(['posts']);
    }
}
