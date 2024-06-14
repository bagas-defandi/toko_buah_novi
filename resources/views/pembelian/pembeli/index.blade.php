<x-app-layout>
    <header class="bg-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Riwayat Pemesanan Anda') }}
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
                                    <th scope="col" class="px-6 py-4">ID</th>
                                    <th scope="col" class="px-6 py-4">Total Harga</th>
                                    <th scope="col" class="px-6 py-4">Metode Bayar</th>
                                    <th scope="col" class="px-6 py-4">Status Bayar</th>
                                    <th scope="col" class="px-6 py-4">Bukti Bayar</th>
                                    <th scope="col" class="px-6 py-4">Status Pengiriman</th>
                                    <th scope="col" class="px-6 py-4">Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    @php
                                        $total_harga = number_format($order->total_harga, 0, ',', '.');
                                    @endphp
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4">{{ $order->id }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a class="underline underline-offset-4"
                                                href="{{ route('pemesanan.pembeli.show', $order->id) }}">
                                                {{ $total_harga }}
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $order->metode_bayar }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $order->status_bayar }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if ($order->bukti_bayar)
                                                <a class="underline underline-offset-4"
                                                    href="{{ asset($order->bukti_bayar) }}">Lihat Bukti</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $order->status_pengiriman }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $order->pengiriman }}
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
            </div>
        </div>
    </div>

</x-app-layout>
