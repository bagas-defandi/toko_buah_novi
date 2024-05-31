<x-layout :with-slider=false img-str="wallpaperbetter.jpg">
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="box">
                <div class="detail-box">
                    <h2>
                        {{ $buah->nama }}
                    </h2>
                    <p style="padding-bottom: 30px ;">
                        @php
                            $harga = number_format($buah->harga, 0, ',', '.');
                        @endphp
                        {{ $buah->nama }} Rp.{{ $harga }}/{{ $buah->berat }} {{ $buah->satuan_berat }}
                    </p>
                </div>
                <div class="img-box">
                    <img src="{{ asset($buah->gambar) }}" style="width: 500px ; border-radius: 60px;">
                </div>
                <div class="btn-box">
                    <a href="">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
