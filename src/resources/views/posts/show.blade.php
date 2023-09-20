<x-app-layout>
    <x-slot name="header">教案詳細</x-slot>
    <x-slot name="title">教案詳細</x-slot>
    <div class="w-full pb-16">
        <div class="flex items-center justify-between mb-5">
            <h1 class="w-2/3 pl-1 text-2xl truncate lg:text-3xl lg:w-4/5">{{ $post->title }}</h1>
            {{-- 自分の投稿にはブックマークボタンを表示しない --}}
            @if ($post->user_id !== Auth::id())
            <div class="flex content-center">
                @if (Auth::check() && !Auth::user()->is_bookmarked($post->id))
                <form action="{{ route('bookmarks.store', $post) }}" method="POST" class="flex content-center">
                    @csrf
                    <button class="inline-flex items-center mr-4 text-2xl tracking-widest text-gray-500 transition duration-150 ease-in-out md:text-4xl hover:scale-95 active:scale-90">
                        <i class="fa-regular fa-bookmark"></i>
                    </button>
                </form>
                @else
                <form action="{{ route('bookmarks.destroy', $post) }}" method="POST" class="flex content-center">
                    @csrf
                    @method('DELETE')
                    <button class="inline-flex items-center mr-4 text-2xl tracking-widest transition duration-150 ease-in-out md:text-4xl hover:scale-95 active:scale-90">
                        <i class="fa-solid fa-bookmark" style="color: #fb923c;"></i>
                    </button>
                </form>
                @endif
            </div>
            @endif
        </div>
        <table class="w-full border-collapse md:text-left md:table-fixed">
            <tbody>
                <tr class="show-tr">
                    <th class="w-full show-th md:w-1/5">レベル</th>
                    <td class="w-full show-td md:w-4/5">{{ $post->level }}</td>
                </tr>
                <tr class="show-tr">
                    <th class="show-th">使用テキスト</th>
                    @if(isset($post->text->text_name))
                    <td class="show-td">{{ $post->text->text_name }}</td>
                    @else
                    <td class="show-td">&ensp;-</td>
                    @endif
                </tr>
                <tr class="show-tr">
                    <th class="show-th">投稿者</th>
                    <td class="text-blue-500 show-td hover:underline"><a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></td>
                </tr>
                <tr class="show-tr">
                    <th class="show-th">概要</th>
                    <td class="show-td">
                        <div class="flex flex-col justify-start text-left markdown-body">
                            {!! $post->description_markdown !!}
                        </div>
                    </td>
                </tr>
                <tr class="show-tr">
                    <th class="show-th">添付ファイル</th>
                    @if(isset($post->file_name))
                    <td class="show-td">
                        <div class="flex flex-col items-center justify-center md:justify-start md:flex-row">
                            <a href="{{ $post->file_url }}" target="_blank" rel="noopener noreferrer">
                                <span class="text-blue-500 hover:underline">{{ $post->file_name }}</span>
                                @if ($post->file_mimetype === 'image/jpeg' || $post->file_mimetype === 'image/png' || $post->file_mimetype === 'application/pdf')
                                <span><i class="fa-solid fa-arrow-up-right-from-square" style="color: #3b82f6;"></i></span>
                                @endif
                            </a>
                            <div class="md:ml-6">
                                {{-- {{ 画像であれば画像を表示 }} --}}
                                @if ($post->file_mimetype === 'image/jpeg' || $post->file_mimetype === 'image/png')
                                <img src="{{ $post->file_url }}">
                                {{-- PDFであれば表示ボタンを表示 --}}
                                @elseif ($post->file_mimetype === 'application/pdf')
                                <a href="{{ $post->file_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-4 py-2 mt-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md shadow-md hover:bg-blue-300 focus:bg-blue-500 active:bg-blue-300 focus:outline-none md:mt-0">
                                    <span><i class="mr-2 fa-solid fa-arrow-up-right-from-square" style="color: #ffffff;"></i></span>
                                    <span>表示</span>
                                </a>
                                @else
                                <a href="{{ $post->file_url }}" download class="inline-flex items-center justify-center px-4 py-2 mt-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md shadow-md hover:bg-blue-300 focus:bg-blue-500 active:bg-blue-300 focus:outline-none md:mt-0">
                                    <span><i class="mr-2 fa-solid fa-download" style="color: #ffffff;"></i></span>
                                    <span>ダウンロード</span>
                                @endif
                                </a>
                            </div>
                        </div>
                    </td>
                    @else
                    <td class="show-td">&ensp;-</td>
                    @endif
                </tr>
                <tr class="show-tr">
                    <th class="show-th">ファイルサイズ</th>
                    @if(isset($post->file_size))
                    <td class="show-td">{{ $post->file_size }}</td>
                    @else
                    <td class="show-td">&ensp;-</td>
                    @endif
                </tr>
                <tr class="show-tr">
                    <th class="show-th">MIMEタイプ</th>
                    @if(isset($post->file_mimetype))
                    <td class="show-td">{{ $post->file_mimetype }}</td>
                    @else
                    <td class="show-td">&ensp;-</td>
                    @endif
                </tr>
                <tr class="show-tr">
                    <th class="show-th">投稿日</th>
                    <td class="show-td">{{ $post->created_at->format('Y/m/d') }}</td>
                </tr>
                <tr class="show-tr">
                    <th class="md:border-b-2 show-th">更新日</th>
                    <td class="border-b-2 show-td">{{ $post->updated_at->format('Y/m/d') }}</td>
                </tr>
            </tbody>
        </table>
        @can('update', $post)
            <div class="flex justify-center my-9">
                <x-primary-button onclick="location.href='{{ route('posts.edit', $post) }}'" class="mr-12 bg-orange-400 shadow-md hover:bg-orange-300 active:bg-orange-400 focus:bg-orange-400">編集する</x-primary-button>
                <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button class="bg-red-500 shadow-md hover:bg-red-300 active:bg-red-500 focus:bg-red-500">削除する</x-primary-button>
                </form>
            </div>
        @endcan
    </div>
</x-app-layout>
