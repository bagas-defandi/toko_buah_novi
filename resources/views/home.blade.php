<!DO>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <title>Toko Buah Novi</title>

        <!-- fonts style -->
        <link
            href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
            rel="stylesheet" />

        {{-- Icon --}}
        <link rel="icon" type="image/png" href="storage/images/favicon-32x32.png" sizes="32x32" />

        {{-- CSS dan JS --}}
        @vite(['resources/css/app.css', 'resources/css/bootstrap.css', 'resources/css/style.css', 'resources/css/responsive.css', 'resources/js/jquery.js', 'resources/js/app.js', 'resources/js/bootstrap.js', 'resources/js/custom.js'])
    </head>

    <body>
        <div class="hero_area">
            <!-- header section strats -->
            <div class="brand_box">
                <a class="navbar-brand" href="">
                </a>
            </div>
            <!-- end header section -->
            <!-- slider section -->
            <section class=" slider_section position-relative">
                <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="object-fit: cover; height:400px;">
                            <div class="img-box">
                                <img src="{{ asset('storage/images/wallpaperbetter.com_1920x1080.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="carousel-item"style="object-fit: cover; height:400px;">
                            <div class="img-box">
                                <img src="{{ asset('storage/images/slider-img.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="carousel-item"style="object-fit: cover; height:400px;">
                            <div class="img-box">
                                <img src="{{ asset('storage/images/wallpaperbetter.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <img src="{{ asset('storage/images/prev.png') }}" alt="" style="margin-right: -30px">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <img src="{{ asset('storage/images/next.png') }}" alt="" style="margin-left: -30px">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
            <!-- end slider section -->
        </div>

        <!-- nav section -->

        <section class="nav_section">
            <div class="container">
                <div class="custom_nav2">
                    <nav class="navbar navbar-expand custom_nav-container ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-flex  flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Our Fruit </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>

        <!-- end nav section -->

        <!-- shop section -->

        <section class="shop_section layout_padding"
            style="background-image: url(storage/images/bck.png);  background-repeat:no-repeat; background-size: cover;">
            <div class="container">
                <div class="box">
                    <div class="detail-box">
                        <h2>
                            Toko buah Novi
                        </h2>
                        <p>
                            Menyediakan buah-buahan yang berkualitas
                    </div>
                    <div class="img-box">
                        <img src="{{ asset('storage/images/Logo_toko-removebg-preview.png') }}" alt="">
                    </div>
                    <div class="btn-box">
                    </div>
                </div>
            </div>
        </section>

        <!-- end shop section -->

        <!-- about section -->

        <section class="about_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img-box">
                            <img src="{{ asset('storage/images/about-img.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="detail-box">
                            <div class="heading_container">
                                <hr>
                                <h2>
                                    About
                                </h2>
                            </div>
                            <p>
                                Sejak tahun 2020, toko Buah Novi adalah salah satu ukm yang bergerak di bidang
                                perdagangan
                                eceran buah-buahan di Kota Jambi. Toko Buah Novi akan selalu menjadi ukm yang
                                mengutamakan
                                kualitas buah-buahan lokal dan impor demi memberikan pelayanan yang terbaik kepada
                                konsumen.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end about section -->

        <!-- fruit section -->

        <section class="fruit_section layout_padding">
            <div class="container">
                <div class="heading_container">
                    <hr>
                    <h2>
                        Daftar Buah
                    </h2>
                </div>
            </div>
            <div class="container-fluid">

                <div class="fruit_container">
                    <div class="box">
                        <img src="{{ asset('storage/images/jeruk santang.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                jeruk santang
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/buah blueberry.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                Blueberry
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/naga.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                buah naga
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/buah cerry.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                cerry
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/buah strowberry.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                strawberry
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/apel.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                apel fuji
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/lemon.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                lemon
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/kiwi.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                kiwi
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/kelengkeng.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                kelengkeng
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/alpukat.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                alpukat
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/anggur.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                anggur
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/markisah.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                markisa
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/mangga..jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                mangga
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/pear century.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                pear century
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="{{ asset('storage/images/pear jambu.jpg') }}" alt="">
                        <div class="link_box">
                            <h5>
                                pear jambu
                            </h5>
                            <a href="">
                                Beli
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end fruit section -->


        <!-- info section -->

        <section class="info_section layout_padding">
            <div class="container">
                <div class="info_logo">
                    <h2>
                        Contact Us
                    </h2>
                </div>
                <div class="info_contact">
                    <div class="row">
                        <div class="col-md-4">
                            <a
                                href="https://www.google.com/maps?ll=-1.603082,103.61783&z=16&t=m&hl=id&gl=ID&mapclient=embed&q=Jl.+Hayam+Wuruk+No.5+Talang+Jauh+Kec.+Jelutung+Kota+Jambi,+Jambi+36123">
                                <img src="{{ asset('storage/images/location.png') }}" alt="">
                                <span>
                                    Jl. Hayam Waruk No.5
                                </span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="{{ asset('storage/images/call.png') }}" alt="">
                                <span>
                                    Call : +62822-8225-4006
                                </span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="{{ asset('storage/images/mail.png') }}" alt="">
                                <span>
                                    tokobuahnovi@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; justify-content: center; margin-left: 90px;">
                    <div class="col-md-4 col-lg-3">
                        <div class="info_social">
                            <div>
                                <a target="_blank" rel="noopener"
                                    href="https://id-id.facebook.com/novi.kurniawaty.9">
                                    <img src="{{ asset('storage/images/facebook-logo-button.png') }}">
                                </a>
                            </div>
                            <div>
                                <a target="_blank" rel="noopener" href="https://www.instagram.com/tokobuahnovi/">
                                    <img src="{{ asset('storage/images/instagram.png') }}">
                                </a>
                            </div>
                            <div>
                                <a target="_blank" rel="noopener"
                                    href="https://www.tiktok.com/@tokobuahnovi?lang=id-ID">
                                    <img src="{{ asset('storage/images/tiktok.png') }}"
                                        style="width:34px; margin-top:1px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- end info section -->


        <!-- footer section -->
        <section class="container-fluid footer_section">
            <p>
                &copy; <span id="displayYear"></span> Toko buah Novi
                <a href="ht.design/">Created by Kelompok PPSI | All Right Reserved</a>
            </p>
        </section>
        <!-- footer section -->

        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script src="js/script.js"></script>


        </bod>
