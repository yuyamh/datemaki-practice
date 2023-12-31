<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PostFormRequest;
use App\Facades\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * 教案一覧取得
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'description', 'level', 'user_id','text_id', 'updated_at')
            ->with(['user', 'text'])
            ->latest('updated_at')
            ->get();

        $response = [];
        foreach ($posts as $post)
        {
            $text = null;
            if ($post->text_id)
            {
                $text = [
                    'id'   => $post->text_id,
                    'name' => $post->text->text_name,
                ];
            }
            $tmp = [
                'id'          => $post->id,
                'title'       => $post->title,
                'description' => $post->description,
                'level'       => $post->level,
                'user'        => [
                    'id'            => $post->user_id,
                    'name'          => $post->user->name,
                    'profile_image' => $post->user->profile_image ? $post->user->image_url : asset('images/user_icon.png'),

                ],
                'text'        => $text,
                'updated_at'  => $post->updated_at,
            ];
            array_push($response, $tmp);
        }

        // TODO:paginationのセット

        $this->setResponseData($response);

        return $this->responseSuccess(false);
    }


    /**
     * 教案の新規保存
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->level = $validated['level'];
        $post->user_id = \Auth::id();
        $post->text_id = $validated['text_id'];

        if (isset($validated['file_name']))
        {
            $file = $validated['file_name'];
            $ext  = $file->getClientOriginalextension();

            // ファイルをストレージへ保存
            $fileName = time() . '.' . $ext;
            $file->storeAs('public/files', $fileName);

            $post->file_name = $fileName;
            $post->file_mimetype = $file->getMimeType();
            $post->file_size = $file->getSize();
        }

        $post->save();

        // ファイルサイズの表記を編集
        if (isset($post->file_size))
        {
            $post->file_size = PostService::convertBytesToMegaBytes($post->file_size);
        }

        $this->setResponseData(['status' => 'true']);

        return $this->responseSuccess();
    }

    /**
     * 教案の詳細データ取得
     */
    public function show(Post $post)
    {
        if (isset($post->file_size))
        {
            $post->file_size = PostService::convertBytesToMegaBytes($post->file_size);
        }

        $response = [
            'id'          => $post->id,
            'title'       => $post->title,
            'description' => $post->description,
            'level'       => $post->level,
            'user'        => [
                'id'   => $post->user_id,
                'name' => $post->user->name,
            ],
            'file' => [
                'file_name'     => $post->file_name ?? null,
                'file_mimetype' => $post->file_mimetype ?? null,
                'file_size'     => $post->file_size ?? null,
                'file_url'      => $post->file_name ? $post->file_url : null,
            ],
            'text' => [
                'id'   => $post->text_id ?? null,
                'name' => $post->text->text_name ?? null,
            ],
            'created_at'  => $post->created_at,
            'updated_at'  => $post->created_at,
        ];

        $this->setResponseData($response);

        return $this->responseSuccess();
    }

    /**
     * 教案の更新処理
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $this->authorize($post);
        $validated = $request->validated();

        // ファイルの差し替えを行う
        if (isset($validated['file_name']))
        {
            // 元ファイルの削除
            \Storage::delete('public/files/' . $post->file_name);

            // 新ファイルの保存
            $file = $validated['file_name'];
            $ext  = $file->getClientOriginalextension();
            $fileName = time() . '.' . $ext;
            $file->storeAs('public/files', $fileName);

            // 新ファイルのデータをpostsテーブルの各カラムに保存
            $post->file_name = $fileName;
            $post->file_mimetype = $file->getMimeType();
            $post->file_size = $file->getSize();
        }

        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->level = $validated['level'];
        $post->text_id = $validated['text_id'];
        $post->save();

        // ファイルサイズの表記を編集
        if (isset($post->file_size))
        {
            $post->file_size = PostService::convertBytesToMegaBytes($post->file_size);
        }

        $this->setResponseData(['status' => 'true']);

        return $this->responseSuccess();
    }

    /**
     * 教案の削除処理
     */
    public function destroy(Post $post)
    {
        $this->authorize($post);

        // 教案に紐づくfileNameがデータとして存在するか確認する
        // 存在する場合、実データがストレージ上に格納されているかどうか確認する Storage::exists
        // トランザクション開始　
        // Postテーブルから該当データ行の削除を試みる　$posts->delete();
        // 成功した場合、fileNameに紐づく実データの削除を試みる Storage::delete();
        // いずれも成功した場合、トランザクションを終了（コミット）する
        // いずれか一方でも失敗した場合、ロールバックと、ファイルの復元を試みた上で、メソッドの呼び出し元にエラーを伝達する
        // ロールバックもファイル復元も失敗した場合は、元の状態に戻せないということなので、特に強い警告度で呼び出し元にエラーを伝達する

        try
        {
            // 教案の削除
            if (!$post->delete())
            {
                throw new \Exception('教案の削除に失敗しました');
            }

            // アップロードされたファイルの削除
            if (isset($post->file_name))
            {
                if (!\Storage::exists('public/files/' . $post->file_name) || !\Storage::delete('public/files/' . $post->file_name))
                {
                    throw new \Exception('ファイルの削除に失敗しました');
                }
            }
        } catch (\Exception $e)
        {
            $this->setStatusCode(500);
            $this->setErrorMessages([$e->getMessage()]);
            return $this->responseFailed();
        }

        $this->setResponseData(['status' => 'true']);

        return $this->responseSuccess();
    }

    /**
     * ブックマークした教案を表示する
     */
    public function bookmark_posts()
    {
        $posts = \Auth::user()
            ->bookmark_posts()
            ->latest()
            ->with(['user', 'text'])
            ->get();

        $response = [];
        foreach ($posts as $post)
        {
            $text = null;
            if ($post->text_id)
            {
                $text = [
                    'id'   => $post->text_id,
                    'name' => $post->text->text_name,
                ];
            }

            $tmp = [
                'id'          => $post->id,
                'title'       => $post->title,
                'description' => $post->description,
                'level'       => $post->level,
                'user'        => [
                    'id'            => $post->user_id,
                    'name'     => $post->user->name,
                    'profile_image' => $post->user->profile_image ? $post->user->image_url : asset('images/user_icon.png'),
                ],
                'text'        => $text,
                'created_at'  => $post->created_at,
                'updated_at'  => $post->updated_at,
            ];
            array_push($response, $tmp);
        }

        $this->setResponseData($response);

        return $this->responseSuccess(false);
    }
}
