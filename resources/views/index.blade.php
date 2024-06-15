<x-layout>
    <!-- shop section -->
    <section class="shop_section layout_padding"
        style="background-image: url(images/bck.png);  background-repeat:no-repeat; background-size: cover;">
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
                    <img src="{{ asset('images/Logo_toko-removebg-preview.png') }}" alt="">
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
                        <img src="{{ asset('images/about-img.jpg') }}" alt="">
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
                @foreach ($buahs as $buah)
                    <div class="box">
                        <img src="{{ asset($buah->gambar) }}" alt="{{ $buah->nama }}">
                        <div class="link_box">
                            <h5>
                                {{ $buah->nama }}
                            </h5>
                            <a href="{{ route('buah', $buah->id) }}">
                                Beli
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- end fruit section -->
</x-layout>
