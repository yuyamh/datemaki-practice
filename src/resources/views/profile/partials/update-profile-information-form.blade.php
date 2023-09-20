<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- アイコン変更、ゲストユーザーの場合は変更不可 --}}
        <div>
           <x-picture-input :user="$user" />
           <x-input-error class="mt-2" :messages="$errors->get('picture')" />
        </div>

        {{-- 名前変更、ゲストユーザーの場合は変更不可 --}}
        <div>
            @can ('update', $user)
            <x-input-label for="name" :value="__('Nickname')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            @else
            <x-input-label for="name" :value="__('Nickname')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1 text-gray-700 bg-gray-300 border border-gray-400 opacity-50" :value="$user->name" readonly disabled />
            <p class="mt-1 text-xs text-red-500">※変更不可</p>
            @endcan
        </div>

        {{-- メールアドレス変更、ゲストユーザーの場合は変更不可--}}
        <div>
            @can ('update', $user)
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-orange-400" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @else
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1 text-gray-700 bg-gray-300 border border-gray-400 opacity-50" :value="$user->email" readonly disabled />
            <p class="mt-1 text-xs text-red-500">※変更不可</p>
            @endcan

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            @can ('update', $user)
            <x-primary-button class="focus:ring-orange-400">{{ __('Save') }}</x-primary-button>
            @endcan

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
