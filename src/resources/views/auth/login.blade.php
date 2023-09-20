<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="text-orange-400 border-gray-300 rounded shadow-sm focus:ring-orange-400" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 focus:ring-orange-400">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="flex flex-col items-center w-full mt-12">
        <button onclick="location.href='{{ route('register') }}'" class="inline-flex items-center justify-center w-3/5 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md shadow-md md:w-2/5 hover:bg-red-400 focus:bg-red-500 active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">新規登録</button>
        <p class="m-3 text-sm text-gray-600">または</p>
        <button onclick="location.href='{{ route('guest_login') }}'" class="inline-flex items-center justify-center w-3/5 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md shadow-md md:w-2/5 bg-amber-700 hover:bg-amber-500 focus:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">ゲストログイン</button>
    </div>
</x-guest-layout>
