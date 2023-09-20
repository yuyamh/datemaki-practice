@if ($posts->isEmpty())
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 lg:mr-6">
    @foreach ($posts as $post)
    <div class="flex flex-col items-start justify-center w-full p-3 bg-white rounded-lg cursor-pointer hover:duration-200 sahdow-lg card hover:scale-95 hover:transition-all hover:bg-yellow-50" data-href="{{ route('posts.show', $post) }}">
        <div class="flex items-start justify-between w-full">
            <div class="flex justify-start w-full mb-4">
                {{-- ゲストユーザーの場合は、ゲストログイン用画像をプロフ画像として表示する。 --}}
                @if ($post->user->role === 'guest')
                <img src="{{ asset('images/guest_user_icon.png') }}" class="w-12 h-12 bg-gray-200 rounded-full" alt="photo">
                @else
                <img src="{{ isset($post->user->profile_image) ? $post->user->image_url : asset('images/user_icon.png') }}" class="w-12 h-12 bg-gray-200 rounded-full" alt="photo">
                @endif
                <div class="ml-2 truncate">
                    <p class="text-sm text-gray-500 truncate">{{ $post->user->name }}</p>
                    <p class="mb-2 text-xl font-bold text-gray-600 truncate">{{ $post->title }}</p>
                    <p class="text-sm text-gray-600">
                        @if(isset($post->text->text_name))
                        <span>{{ $post->text->text_name }}&nbsp;/&nbsp;</span>
                        @else
                        <span>-&nbsp;/&nbsp;</span>
                        @endif
                        <span>{{ $post->level }}&nbsp;</span>
                    </p>
                </div>
            </div>
            {{-- ブックマーク済みであれば、印を表示 --}}
            @if (Auth::check() && Auth::user()->is_bookmarked($post->id))
                <span><i class="text-orange-400 fa-solid fa-bookmark"></i></i></span>
            @endif
        </div>
        <p class="h-16 m-3 mt-0 text-base font-normal leading-snug text-gray-500 break-all line-clamp-3">{{ $post->description }}</p>
        <p class="ml-auto text-xs font-light text-gray-400">{{ $post->updated_at->format('Y/m/d') }}</p>
    </div>
    @endforeach
</div>
<div class="m-4">{{ $posts->appends(request()->input())->onEachSide(1)->links() }}</div>
<script>
const cards = document.querySelectorAll('.card');

cards.forEach(card => {
  card.addEventListener('click', () => {
    const url = card.dataset.href;
    window.location.href = url;
  });
});
</script>
@endif
