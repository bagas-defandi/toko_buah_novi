<x-app-layout>
    <header class="bg-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Pemesanan') }}
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
                                    <th scope="col" class="px-6 py-4">Atas Nama</th>
                                    <th scope="col" class="px-6 py-4">Total Harga</th>
                                    <th scope="col" class="px-6 py-4">Metode Bayar</th>
                                    <th scope="col" class="px-6 py-4">Status Bayar</th>
                                    <th scope="col" class="px-6 py-4">Bukti Bayar</th>
                                    <th scope="col" class="px-6 py-4">Status Pengiriman</th>
                                    <th scope="col" class="px-6 py-4">Pengiriman</th>
                                    <th scope="col" class="px-6 py-4">Dipesan Pada</th>
                                    <th scope="col" class="px-6 py-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    @php
                                        $total_harga = number_format($order->total_harga, 0, ',', '.');
                                    @endphp
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td>{{ $order->user->name }}</td>
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
                                        <td class="white-space-nowrap px-6 py-4">
                                            {{ $order->created_at->timezone('Asia/Jakarta')->format('d F Y, H:i:s') }}
                                        </td>
                                        <td>
                                            @php
                                                $modalNameEdit = "edit-pesanan{$loop->iteration}";
                                                $openModalNameEdit = "\$dispatch('open-modal', '$modalNameEdit')";
                                            @endphp
                                            <button x-data=""
                                                x-on:click.prevent="{{ $openModalNameEdit }}"
                                                class="mr-3 my-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                                                Edit
                                            </button>
                                            <x-modal name="{{ $modalNameEdit }}">
                                                <form method="post"
                                                    action="{{ route('pemesanan.admin.edit', $order) }}"
                                                    class="p-6">
                                                    @csrf
                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __("Konfirmasi Pembayaran atas nama \"{$order->user->name}\", Sejumlah $total_harga, dan Ubah Status") }}
                                                    </h2>
                                                    @method('put')

                                                    <div class="mt-3">
                                                        <x-input-label for="status_pengiriman" :value="__('Status Pengiriman')" />
                                                        <select id="status_pengiriman" name="status_pengiriman"
                                                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                                            <option value="Diproses">Diproses
                                                            </option>
                                                            <option value="Dikirim">Dikirim
                                                            </option>
                                                            <option value="Diterima">Diterima
                                                            </option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('status_pengiriman')" class="mt-2" />
                                                    </div>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Tidak') }}
                                                        </x-secondary-button>

                                                        <x-danger-button type="submit" class="ms-3">
                                                            {{ __('Ya') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                            @php
                                                $modalName = "hapus-pesanan{$loop->iteration}";
                                                $openModalName = "\$dispatch('open-modal', '$modalName')";
                                            @endphp
                                            <x-danger-button x-data=""
                                                x-on:click.prevent="{{ $openModalName }}">
                                                {{ __('Hapus') }}
                                            </x-danger-button>
                                            <x-modal name="{{ $modalName }}">
                                                <form method="post"
                                                    action="{{ route('pemesanan.admin.destroy', $order) }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __("Apakah anda yakin ingin menghapus pesanan \"{$order->user->name}\", Sejumlah $total_harga") }}
                                                    </h2>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Tidak') }}
                                                        </x-secondary-button>

                                                        <x-danger-button type="submit" class="ms-3">
                                                            {{ __('Ya') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
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
