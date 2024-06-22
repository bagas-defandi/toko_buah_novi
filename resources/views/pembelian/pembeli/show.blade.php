<x-app-layout>
    <header class="bg-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Pemesanan') }}
            </h2>
            @if ($order->bukti_bayar)
                <div class="text-green-600 font-bold">SUDAH BAYAR</div>
            @else
                <button type="submit" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'upload_bukti_bayar')"
                    class="inline-flex
                    items-center px-4 py-2 bg-accent dark:bg-gray-200 border border-transparent rounded-md font-semibold
                    text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white
                    focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none
                    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition
                    ease-in-out duration-150">
                    KIRIM BUKTI BAYAR
                </button>
            @endif
            <x-modal name="upload_bukti_bayar">
                <form method="post" action="{{ route('pemesanan.pembeli.kirim', $order->id) }}"
                    enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('put')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Silahkan upload bukti pembayaran anda') }}
                    </h2>

                    <div class="mt-4">
                        <x-input-label for="bukti_bayar" :value="__('Bukti Bayar')" />
                        <input
                            class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 py-4 px-3 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="bukti_bayar_info_help" id="bukti_bayar" type="file" name="bukti_bayar">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="bukti_bayar_info_help">
                            Format File PNG atau JPG.</p>
                        <x-input-error :messages="$errors->get('bukti_bayar')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Tidak') }}
                        </x-secondary-button>

                        <x-danger-button type="submit" class="ms-3">
                            {{ __('Kirim') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
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
                @if ($order->bukti_bayar)
                    <div class=""></div>
                @else
                    <img class="h-[700px] mt-14 mx-auto" src="{{ asset('images/QRIS.png') }}" alt="">
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
