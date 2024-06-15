<section class="nav_section">
    <div class="container">
        <div class="custom_nav2">
            <nav class="navbar navbar-expand custom_nav-container ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex flex-column flex-lg-row align-items-center flex-grow-1 justify-content-between">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">Beranda <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">Tentang Kami </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('buahs') }}">Produk</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            @auth()
                                @if (auth()->user()->hasRole('pembeli'))
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('keranjang') }}">Keranjang<span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                @endif
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard<span
                                            class="sr-only">(current)</span></a>
                                </li>
                            @else
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">Masuk<span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
