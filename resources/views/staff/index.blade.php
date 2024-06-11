<x-app-layout>
    <header class="bg-transparent">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-bold text-xl text-primary-dark dark:text-gray-200 leading-tight">
                {{ __('Staff Anda') }}
            </h2>
            <a href="{{ route('staffs.create') }}"
                class="inline-flex items-center px-4 py-2 bg-accent dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Tambah
                Staff</a>
        </div>
    </header>

    @if (session()->has('pesan'))
        @php
            $pesan = session()->get('pesan');
            $words = explode(' ', $pesan);
            $lastWord = end($words);
        @endphp
        <div class="pt-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">
                <div @class([
                    'relative',
                    'block',
                    'w-full',
                    'p-4',
                    'mb-4',
                    'text-base',
                    'leading-5',
                    'text-white',
                    'bg-green-500' => $lastWord == 'ditambah',
                    'bg-red-500' => $lastWord == 'dihapus',
                    'rounded-lg',
                    'opacity-100',
                    'font-regular',
                ])>
                    {{ $pesan }}
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Nama</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                    <th scope="col" class="px-6 py-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($staffs as $staff)
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $staff->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $staff->email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @php
                                                $modalName = "confirm-staff-deletion{$loop->iteration}";
                                                $openModalName = "\$dispatch('open-modal', '$modalName')";
                                            @endphp
                                            <x-danger-button x-data=""
                                                x-on:click.prevent="{{ $openModalName }}">
                                                {{ __('Hapus') }}
                                            </x-danger-button>
                                            <x-modal name="{{ $modalName }}">
                                                <form method="post"
                                                    action="{{ route('staffs.destroy', ['idStaff' => $staff->id]) }}"
                                                    class="p-6">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                        {{ __("Apakah anda yakin ingin menghapus Staff {$staff->name}") }}
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
