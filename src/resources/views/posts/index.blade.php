<x-app-layout>
    <x-slot name="header">みんなの教案一覧</x-slot>
    <x-slot name="title">みんなの教案</x-slot>
    <x-index-cards :posts="$posts" message="教案がありません。"/>
</x-app-layout>
