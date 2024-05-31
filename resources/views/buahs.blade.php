<x-layout :with-slider=false img-str="slider-img.jpg">
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
</x-layout>
