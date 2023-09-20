<x-app-layout>
    <x-slot name="header">編集フォーム</x-slot>
    <x-slot name="title">教案編集フォーム</x-slot>
    <div class="w-full max-w-2xl mx-auto">
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            <x-form :texts="$texts" :post="$post" />
            <div class="flex justify-center py-5">
                <x-primary-button type="submit" class="mr-12 bg-orange-400 shadow-md hover:bg-orange-300 active:bg-orange-400 focus:bg-orange-400">更新する</x-primary-button>
                <x-secondary-button onclick="location.href='{{ route('posts.show', $post) }}'">キャンセル</x-secondary-button>
            </div>
        </form>
    </div>
</x-app-layout>
