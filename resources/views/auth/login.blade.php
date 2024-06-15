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
            <img class="w-full h-3/5" src="{{ asset('images/decoration-login.png') }}" alt="">

            <img class="place-self-center h-4/5" src="{{ asset('images/heading-login1.png') }}" alt="">
            <img class="place-self-center mt-auto w-4/5" src="{{ asset('images/illustration-login.png') }}"
                alt="">
        </div>
        <div class="col-span-2">
            <a href="{{ route('index') }}">
                <img class="ml-auto w-[200px] h-[200px]" src="{{ asset('images/Logo_toko.png') }}" alt="">
            </a>
            <div style="margin-top: 10%" class="w-[400px] mx-auto">
                <p class="font-bold text-gray-700 text-2xl mb-6">Senang bertemu denganmu!</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
                    <div class="mb-6 flex justify-end items-center">
                        <a href="{{ route('password.request') }}">Lupa Password?</a>
                    </div>
                    <button type="submit" class="bg-accent text-white text-xl py-2 w-full rounded-lg">Masuk</button>
                </form>
                <div class="text-center mt-6">
                    <p>
                        Belum jadi member?
                        <a style="color: #734D47" class="font-bold" href="{{ route('register') }}">
                            Ayo buat sekarang!
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
