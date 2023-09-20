<x-page-layout>
    <x-slot name="title">ホーム</x-slot>
    <div class="relative text-center bg-blue-300 h-96">
        <div class="absolute top-0 bottom-0 left-0 right-0">
            <img class="object-cover w-full h-full" src="{{ asset('images/chalk.jpg') }}" alt="ヒーロー画像">
        </div>
        <div class="absolute top-0 bottom-0 left-0 right-0 px-6 bg-black bg-opacity-10">
            <div class="mt-12 text-white md:mt-20 text-shadow">
                <div class="flex flex-col mx-auto bg-white md:w-2/3 p-7 bg-opacity-10">
                    <h1 class="text-2xl font-bold md:text-5xl">新しい授業のアイディアを見つけよう</h1>
                    <h2 class="mt-6 text-base md:mt-8">だてまきは全国の日本語教師のための教案共有データベースです。</h2>
                </div>
            </div>
            @if(!Auth::check())
            <div class="mt-8">
                <x-primary-button type="button" onclick="location.href='{{ route('register') }}'" class="bg-red-500 shadow-md hover:bg-red-400 hover:scale-95 active:scale-90 active:ring-offset-0 focus:ring-offset-0 active:bg-red-500 focus:bg-red-500 focus:ring-transparent">会員登録</x-primary-button>
                <x-primary-button onclick="location.href='{{ route('login') }}'" class="ml-6 bg-orange-500 shadow-md hover:bg-orange-400 hover:scale-95 active:scale-90 active:ring-offset-0 focus:ring-offset-0 active:bg-orange-400 focus:bg-orange-400 focus:ring-transparent">ログイン</x-primary-button>
            @endif
            </div>
        </div>
    </div>
    <div class="px-4 py-10">
        <div class="my-10 text-center">
            <p class="text-lg font-bold">教案を簡単に投稿・検索できるサービス</p>
            <h1 class="mt-5 mb-2 text-4xl font-bold">『だてまき』</h1>
            <h2 class="mb-5 text-xl italic font-bold"><span class="text-orange-500">Da</span>tabase for <span class="text-orange-500">Te</span>achers <span class="text-orange-500">Maki</span>ng Japanese Lesson plans</h2>
            <p class="mb-2">「だてまき」は、日本語教師の方々に向けた教案（授業指導案）共有プラットフォームです。</p>
            <p class="mb-2">他の先生の教案をダウンロードしたり、自分の教案を投稿したりすることができます。</p>
            <p>日本語教師の方々が、授業に新たなアイディアを取り入れる場を提供することを目指して、「だてまき」を作りました。</p>
            <img class="mx-auto my-10" src="{{ asset('images/teacher.png') }}" alt="授業イラスト" height="250" width="250">
        </div>
        <hr class="my-5 border-gray-300">
        <div class="flex flex-col justify-center py-10 md:px-5 md:flex-row">
            <div class="px-3 mb-5 md:flex-1 md:mb-0">
                <div class="flex flex-col-reverse md:flex-col">
                    <img class="mx-auto my-6 md:my-9 lg:my-8" src="{{ asset('images/share.png') }}" alt="共有のイラスト" height="250" width="250">
                    <div>
                        <h1 class="pl-2 my-3 text-lg font-bold border-l-8 border-orange-400">教案のシェア</h1>
                        <p>あなたが作った教案を投稿し、他の先生に共有できます。</p>
                    </div>
                </div>
            </div>
            <div class="px-3 mb-5 md:flex-1 md:mb-0">
                <div class="flex flex-col-reverse md:flex-col">
                    <img class="mx-auto my-6" src="{{ asset('images/seach.png') }}" alt="検索イラスト" height="220" width="220">
                    <div>
                        <h1 class="pl-2 my-3 text-lg font-bold border-l-8 border-orange-400">教案の検索</h1>
                        <p>他の先生が作った教案を、キーワード、使用テキスト、レベル（CEFR基準）で検索できます。</p>
                    </div>
                </div>
            </div>
            <div class="px-3 mb-5 md:flex-1 md:mb-0">
                <div class="flex flex-col-reverse md:flex-col">
                    <img class="mx-auto my-6" src="{{ asset('images/bookmarks.png') }}" alt="ブックマークイラスト" height="220" width="220">
                    <div>
                        <h1 class="pl-2 my-3 text-lg font-bold border-l-8 border-orange-400">教案のブックマーク</h1>
                        <p>お気に入りの教案にブックマークをして、ストックすることができます。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-12 text-center">
            <x-primary-button onclick="location.href='{{ route('posts.index') }}'" class="bg-orange-500 shadow-md hover:bg-orange-400 hover:scale-95 active:scale-90 active:ring-offset-0 focus:ring-offset-0 active:bg-orange-500 focus:bg-orange-500 focus:ring-transparent">教案を見てみる</x-primary-button>
        </div>
    </div>
</x-page-layout>
