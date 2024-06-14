<x-layout :with-slider=false img-str="wallpaperbetter.jpg">
    <section class="fruit_section layout_padding">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('pesanan.store') }}" enctype="multipart/form-data">
                @csrf
                <h2 style="margin-top: -20px; font-size: 1.5rem; font-weight:bold">Alamat Pengiriman</h2>
                <div class="d-flex">
                    <div>
                        <span>{{ Auth::user()->name }}</span> <br>
                        <span>({{ Auth::user()->no_telp }})</span>
                    </div>
                    <div style="margin-left: 100px">
                        {{ Auth::user()->alamat }}
                    </div>
                </div>
                <h2 style="font-size: 1.5rem; font-weight:bold; margin-top: 30px">Produk dipesan</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart->items as $item)
                                <tr>
                                    <th scope="row"><img width="100px" src="{{ asset($item->buah->gambar) }}"
                                            alt=""></th>
                                    <td>{{ $item->buah->nama }}</td>
                                    <td>Rp.{{ number_format($item->buah->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->kuantitas }}
                                    </td>
                                    <td>Rp.{{ number_format($item->buah->harga * $item->kuantitas, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <td colspan="6"><span class="block mt-4 text-xl">Tidak ada
                                        data...</span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <h2 style="font-size: 1.5rem; font-weight:bold;">Opsi Pengiriman <span
                        style="font-size: 1rem; font-weight:400">(Jika anda pilih GOJEK atau MAXIM
                        anda harus bayar driver secara CASH)</span></h2>
                <div>
                    <span>Pilih Jasa Kirim: </span>
                    <select name="pengiriman" id="pengiriman">
                        <option value="cod">COD</option>
                        <option value="gojek">Gosend by Gojek</option>
                        <option value="maxim">Maxim</option>
                        <option value="grab">Grab</option>
                    </select>
                </div>
                <h2 style="font-size: 1.5rem; font-weight:bold; margin-top: 30px">Metode Bayar</h2>
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="radio" id="cod" name="metode_bayar" value="cod">
                        <label for="cod">COD</label><br>
                        <input type="radio" id="qris" name="metode_bayar" value="qris">
                        <label for="qris">QRIS</label><br>
                    </div>
                    <img src="{{ asset('storage/images/QRIS.png') }}" alt="QRIS Toko Buah Novi">
                </div>
                <h2 style="font-size: 1.5rem; font-weight:bold; margin-top: 30px">Upload Bukti Bayar</h2>
                <div class="mb-3">
                    <input class="form-control" type="file" id="bukti_bayar" name="bukti_bayar">
                </div>
                <p style="font-size: 2rem" class="text-center">Total Pembayaran:
                    Rp.{{ number_format($cart->total_harga, 0, ',', '.') }}</p>
                <div class="d-flex justify-content-between align-items-baseline">
                    <p>Dengan melanjutkan, Saya setuju dengan Syarat & Ketentuan yang berlaku.</p>
                    <button type="submit" class="btn-success px-4 py-2 text-white">Konfirmasi Pembayaran</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function deleteItem(itemId) {
            axios.delete('/hapus-keranjang/' + itemId)
                .then(function(response) {
                    // Handle success, maybe show a success message
                    // alert('Item deleted successfully.');
                    location.reload();
                    location.reload();
                    // console.log(response);
                })
                .catch(function(error) {
                    // Handle error
                    // alert('Error deleting item.');
                    // console.log(error);
                });
        }
    </script>
</x-layout>
