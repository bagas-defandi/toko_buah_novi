<x-app-layout>
    <header class="bg-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                ID Pemesanan: <span class="font-light">{{ $order->id }}</span> <br>
                Atas Nama: <span class="font-light">{{ $order->user->name }}</span> <br>
                Alamat: <span class="font-light">{{ $order->user->alamat }}</span> <br>
            </h2>
        </div>
    </header>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Nama Buah</th>
                                    <th scope="col" class="px-6 py-4">Gambar</th>
                                    <th scope="col" class="px-6 py-4">Harga</th>
                                    <th scope="col" class="px-6 py-4">Kuantitas</th>
                                    <th scope="col" class="px-6 py-4">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->details as $detail)
                                    @php
                                        $harga = number_format($detail->buah->harga, 0, ',', '.');
                                    @endphp
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $detail->buah->nama }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <img style="height: 100px; width: 100px"
                                                src="{{ asset($detail->buah->gambar) }}"
                                                alt="{{ $detail->buah->nama }}">
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ "Rp. {$harga}" }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $detail->kuantitas }}
                                        </td>
                                        <td>
                                            {{ number_format($detail->kuantitas * $detail->buah->harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6" class="text-center"><span class="block mt-4 text-xl">Tidak ada
                                            data...</span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <img class="h-[700px] mt-14 mx-auto" src="{{ asset($order->bukti_bayar) }}" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
