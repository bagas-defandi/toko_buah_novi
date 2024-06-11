<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ganti Profil Anda disini.') }}
        </p>

        <img src="{{ asset(Auth::user()->gambar) }}" alt="User Profile Picture" class="w-24 h-24 pt-2 rounded-full">

        <form method="POST" action="{{ route('profile.update-image') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="my-4">
                <input
                    class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 py-4 px-3 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="gambar_info_help" id="gambar" type="file" name="gambar">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="gambar_info_help">
                    Format File PNG Atau JPG (MAKS. 5MB).</p>
                {{-- <x-input-error :messages="$errors->get('gambar')" class="mt-2" /> --}}
            </div>

            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </form>
    </header>
</section>
