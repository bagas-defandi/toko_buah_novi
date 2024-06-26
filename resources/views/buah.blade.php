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
                @auth()
                    @if (session()->has('pesan'))
                        <div id="pesan" class="alert alert-danger mt-4">
                            <div> {!! session()->get('pesan') !!}</div>
                        </div>
                    @endif
                    @if (auth()->user()->hasRole('pembeli') && $buah->stok > 0)
                        <form method="POST" action="{{ route('tambah-keranjang') }}" class="btn-box">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="buah_id" value="{{ $buah->id }}">
                            <input type="hidden" name="harga_buah" value="{{ $buah->harga }}">
                            <label for="kuantitas">Stok Tersedia {{ $buah->stok }}:</label>
                            <input class="text-center" type="number" id="kuantitas" name="kuantitas" min="1"
                                max="{{ $buah->stok }}" value="1">
                            <button class="ml-4">
                                Tambah Keranjang
                            </button>
                        </form>
                    @endif
                    @if ($buah->stok == 0)
                        <p style="font-weight: bold; font-size: 2rem; color:red;" class="mt-4">STOK HABIS</p>
                    @endif
                @endauth
            </div>
        </div>
    </section>
</x-layout>
