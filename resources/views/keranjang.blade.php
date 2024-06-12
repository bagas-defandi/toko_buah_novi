<x-layout :with-slider=false img-str="wallpaperbetter.jpg">
    <section class="fruit_section layout_padding">
        <div class="container">
            <form method="POST" action="{{ route('update-keranjang') }}">
                @csrf
                @method('PUT')
                <div class="heading_container">
                    <h2>
                        Keranjang anda
                    </h2>
                    <button type="submit" class="btn-primary ml-auto py-2 px-4">Update Keranjang</button>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Buah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart->items as $item)
                                <tr>
                                    <th scope="row"><img width="100px" src="{{ asset($item->buah->gambar) }}"
                                            alt=""></th>
                                    <td>{{ $item->buah->nama }}</td>
                                    <td>Rp.{{ number_format($item->buah->harga, 0, ',', '.') }}</td>
                                    <td><input class="text-center" type="number" id="kuantitas"
                                            name="kuantitas{{ $item->id }}" min="1"
                                            max="{{ $item->buah->stok }}" value="{{ $item->kuantitas }}">
                                    </td>
                                    <td>Rp.{{ number_format($item->buah->harga * $item->kuantitas, 0, ',', '.') }}</td>
                                    <td>
                                        <button onclick="deleteItem({{ $item->id }})"
                                            class="btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6"><span class="block mt-4 text-xl">Tidak ada
                                        data...</span>
                                </td>
                            @endforelse
                            <tr style="font-size: 2rem" class="text-center">
                                <td colspan="6">Total Harga:
                                    Rp.{{ number_format($cart->total_harga, 0, ',', '.') }}</td>
                            </tr>

                        </tbody>
                    </table>
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
