<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Edit Buah \"{$buah->nama}\"") }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <img style="height: 300px" class="center mx-auto" src="{{ asset($buah->gambar) }}" alt="{{ $buah->nama }}">
        <form method="POST" action="{{ route('buahs.update', $buah) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mt-4">
                <x-input-label for="nama" :value="__('Nama')" />
                @php  $nama = old('nama') ?? $buah->nama; @endphp
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$nama"
                    required autocomplete="nama" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <!-- Harga -->
            <div class="mt-4">
                <x-input-label for="harga" :value="__('Harga')" />
                @php  $harga = old('harga') ?? $buah->harga; @endphp
                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="$harga"
                    required autocomplete="harga" />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>

            <!-- Berat -->
            <div class="mt-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="jumlah_berat" :value="__('Jumlah Berat')" />
                        @php  $jumlah_berat = old('jumlah_berat') ?? $buah->jumlah_berat; @endphp
                        <x-text-input id="jumlah_berat" class="block mt-1 w-full" type="text" name="jumlah_berat"
                            :value="$jumlah_berat" required autocomplete="jumlah_berat" />
                        <x-input-error :messages="$errors->get('jumlah_berat')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="berat" :value="__('Berat')" />
                        <select id="berat" name="berat" class="w-full px-3 py-2 border rounded-md">
                            <option value="kg" selected>Kilogram</option>
                            <option value="gr">Gram</option>
                        </select>
                        <x-input-error :messages="$errors->get('berat')" class="mt-2" />
                    </div>
                </div>
            </div>

            <!-- Stok -->
            <div class="mt-4">
                <x-input-label for="stok" :value="__('Stok')" />
                @php  $stok = old('stok') ?? $buah->stok; @endphp
                <x-text-input id="stok" class="block mt-1 w-full" type="text" name="stok" :value="$stok"
                    required autocomplete="stok" />
                <x-input-error :messages="$errors->get('stok')" class="mt-2" />
            </div>

            <!-- Gambar -->
            <div class="mt-4">
                <x-input-label for="gambar" :value="__('Gambar')" />
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 py-4 px-3 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="gambar_info_help" id="gambar" type="file" name="gambar">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="gambar_info_help">
                    Format File SVG, PNG, JPG atau GIF (MAKS. 5MB).</p>
                <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
            </div>

            <div class="flex items-center mt-4">
                <x-primary-button class="">
                    {{ __('Edit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
