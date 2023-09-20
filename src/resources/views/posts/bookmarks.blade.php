<x-app-layout>
    <x-slot name="header">ブックマーク一覧</x-slot>
    <x-slot name="title">ブックマーク一覧</x-slot>
    <x-index-cards :posts="$posts" message="まだブックマークしていません。" />
</x-app-layout>
