{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Toko Buah Novi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <main class="min-h-screen grid grid-cols-5">
        <div style="background-color: #FFF7F5;" class="grid col-span-3">
            <img class="w-full h-3/5" src="{{ asset('storage/images/decoration-login.png') }}" alt="">

            <img class="place-self-center h-4/5" src="{{ asset('storage/images/heading-login1.png') }}" alt="">
            <img class="place-self-center mt-auto w-4/5" src="{{ asset('storage/images/illustration-login.png') }}"
                alt="">
        </div>
        <div class="col-span-2">
            <img class="ml-auto w-[200px] h-[200px]" src="{{ asset('storage/images/Logo_toko.png') }}" alt="">
            <div style="margin-top: 10%" class="w-[400px] mx-auto">
                <p class="font-bold text-gray-700 text-2xl mb-6">Senang berkenalan denganmu!</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-6">
                        <input class="block w-full rounded-lg border-gray-300 py-3 shadow-sm" type="text"
                            name="name" id="name" placeholder="Masukkan Nama anda" required=""
                            value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <input class="block w-full rounded-lg border-gray-300 py-3 shadow-sm" type="email"
                            name="email" id="email" placeholder="Masukkan Email anda" required=""
                            value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <input class="block w-full rounded-lg border-gray-300 py-3 shadow-sm" type="password"
                            name="password" id="password" placeholder="Masukkan Password" required="">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-6">
                        <input class="block w-full rounded-lg border-gray-300 py-3 shadow-sm" type="password"
                            name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password"
                            required="">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button type="submit" class="bg-accent text-white text-xl py-2 w-full rounded-lg">
                        Buat Akun
                    </button>
                </form>
                <div class="text-center mt-6">
                    <p>
                        Sudah jadi member?
                        <a style="color: #734D47" class="font-bold" href="{{ route('login') }}">
                            Ayo belanja sekarang!
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
