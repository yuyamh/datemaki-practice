<x-app-layout>
    <x-slot name="header">{{ $user_name }}&nbsp;さんの教案一覧</x-slot>
    <x-slot name="title">{{ $user_name }}&nbsp;さんの教案一覧</x-slot>
    <x-index-cards :posts="$posts" message="{{ $user_name }}さんはまだ教案を投稿していません。"/>
</x-app-layout>
