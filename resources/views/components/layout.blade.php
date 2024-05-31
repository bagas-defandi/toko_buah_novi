@php
    $imgStr = 'background-image: url(/storage/images/' . $imgStr . ')';
@endphp
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <title>Toko Buah Novi</title>

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />

    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{ url('storage/images/favicon-32x32.png') }}" sizes="32x32" />

    {{-- CSS dan JS --}}
    @vite(['resources/css/bootstrap.css', 'resources/css/style.css', 'resources/css/responsive.css', 'resources/js/jquery.js', 'resources/js/app.js', 'resources/js/bootstrap.js', 'resources/js/custom.js'])
</head>

<body>
    <div class="hero_area">
        <!-- header section start -->
        <div @style([$imgStr => !$withSlider, 'height: 100px' => !$withSlider])>
        </div>

        <!-- end header section -->
        @if ($withSlider)
            <x-slider></x-slider>
        @endif

    </div>

    <x-navigation></x-navigation>

    {{ $slot }}
    <x-info></x-info>

    <x-footer></x-footer>
</body>

</html>
