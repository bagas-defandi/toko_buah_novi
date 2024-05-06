<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Buah') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <form method="POST" action="{{ route('buahs.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nama -->
            <div class="mt-4">
                <x-input-label for="nama" :value="__('Nama')" />
                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>

            <!-- Harga -->
            <div class="mt-4">
                <x-input-label for="harga" :value="__('Harga')" />
                <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>

            <!-- Berat -->
            <div class="mt-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="jumlah_berat" :value="__('Jumlah Berat')" />
                        <input type="text" id="jumlah_berat" name="jumlah_berat"
                            class="w-full px-3 py-2 border rounded-md">
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
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
