<x-page-layout>
    <x-slot name="header">お問い合わせ</x-slot>
    <x-slot name="title">お問い合わせ</x-slot>
    <div class="flex justify-center w-full">
        <div>
            <p>いつも{{ config('app.name') }}をご利用いただきありがとうございます。</p>
            <p>本サービス内において、ご意見、ご要望、バグ報告等ございましたら下記TwitterアカウントのDMにてご報告いただけますと幸いです。</p>
            <div class="text-center">
                <img src="{{ asset('images/datemaki_logo2.png') }}" alt="ロゴ" width="300" height="300" class="inline-block">
            </div>
            <div class="my-5 text-center">
                <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-orange-400 uppercase transition duration-150 ease-in-out border border-gray-300 rounded-md shadow-sm hover:text-orange-300 hover:border-gray-200 focus:text-orange-300 active:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 hover:scale-95 active:scale-90">
                    <a href="https://twitter.com/Mnsr_3" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <span>メッセージ</span>
                    </a>
                </button>
            </div>
        </div>
    </div>
</x-page-layout>
