<x-app-layout>
    <x-slot name="header">ユーザー一覧</x-slot>
    <x-slot name="title">ユーザー一覧</x-slot>

    @if ($users->isEmpty())
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p>見つかりませんでした。</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 lg:mr-6">
    @foreach ($users as $user)
    <div class="flex flex-col items-start justify-center w-full p-3 bg-white rounded-lg cursor-pointer hover:duration-200 sahdow-lg card hover:scale-95 hover:transition-all hover:bg-yellow-50" data-href="{{ route('users.show', $user->id) }}">
        <div class="flex items-start justify-between w-full">
            <div class="flex justify-start w-full mb-4">
                {{-- ゲストユーザーの場合は、指定した画像をプロフ画像として表示する。 --}}
                @if ($user->id == 1)
                <img src="{{ asset('images/guest_user_icon.png') }}" class="w-12 h-12 bg-gray-200 rounded-full" alt="photo">
                @else
                <img src="{{ isset($user->profile_image) ? $user->image_url : asset('images/user_icon.png') }}" class="w-12 h-12 bg-gray-200 rounded-full" alt="photo">
                @endif
                <div class="ml-2 truncate">
                    <p class="text-base font-bold text-gray-700 truncate">{{ $user->name }}</p>
                    <p class="text-base font-bold text-gray-500 truncate">
                        教案:&nbsp;
                        <span class="text-green-500">{{ count($user->posts) }}</span>
                        件
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="m-4">{{ $users->appends(request()->input())->onEachSide(1)->links() }}</div>
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

</x-app-layout>
