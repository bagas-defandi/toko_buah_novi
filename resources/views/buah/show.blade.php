<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Variasi Buah \"{$buah->nama}\"") }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">
            <a href="#"
                class="mr-3 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Tambah Variasi
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <img style="height: 300px" class="center mx-auto" src="{{ asset($buah->gambar) }}" alt="{{ $buah->nama }}">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Nama Variasi</th>
                                    <th scope="col" class="px-6 py-4">Harga</th>
                                    <th scope="col" class="px-6 py-4">Stok</th>
                                    <th scope="col" class="px-6 py-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <td colspan="6" class="text-center"><span class="block mt-4 text-xl">Tidak ada
                                        data...</span>
                                </td> --}}
                                @forelse ($buah->buah_variations as $variation)
                                    @php
                                        $harga = number_format($variation->harga, 0, ',', '.');
                                    @endphp
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $variation->nama }}</td>

                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ "Rp. {$harga} = Per {$variation->berat}/{$variation->satuan_berat}" }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ "{$variation->stok} {$variation->satuan_berat}" }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @php
                                                $modalName = "confirm-buah-deletion{$loop->iteration}";
                                                $openModalName = "\$dispatch('open-modal', '$modalName')";
                                            @endphp
                                            <a href="{{ route('buahs.edit', $buah) }}"
                                                class="mr-3 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'">
                                                Edit
                                            </a>
                                            <x-danger-button x-data=""
                                                x-on:click.prevent="{{ $openModalName }}">
                                                {{ __('Hapus') }}
                                            </x-danger-button>
                                            <x-modal name="{{ $modalName }}">
                                                <form method="post" action="{{ route('buahs.destroy', $buah) }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __("Apakah anda yakin ingin menghapus Buah \"{$buah->nama}\"") }}
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
