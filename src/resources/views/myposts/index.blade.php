<x-app-layout>
    <x-slot name="header">じぶんの教案一覧</x-slot>
    <x-slot name="title">じぶんの教案</x-slot>
    <x-index-cards :posts="$posts" message="まだ教案を投稿していません。みんなにシェアしてみましょう！"/>
</x-app-layout>
