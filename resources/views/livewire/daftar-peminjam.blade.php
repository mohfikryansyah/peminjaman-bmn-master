<div>
    <div class="mb-3">
        <h1 class="sm:text-2xl text-lg font-semibold">Daftar Peminjam Barang Milik Negara</h1>
    </div>


    @if (Session::get('selesaiSukses'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ Session::get('selesaiSukses') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if (Session::get('deleteSuccess'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-500 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ Session::get('deleteSuccess') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if (Session::get('error'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-gray-200 rounded-lg bg-red-500 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ Session::get('error') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @role(['KASUBAG'])
        <div class="grid lg:grid-cols-4 grid-flow-row lg:gap-4 gap-2 w-full mb-5">

            <a
                class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $totalBarang->count() }}
                </h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total jenis barang</p>
            </a>
            <a
                class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $totalBarangDipinjam->count() }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Barang sedang dipinjam</p>
            </a>
            <a
                class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $totalBarangSelesaiDipinjam->count() }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Barang telah dikembalikan</p>
            </a>
            <a
                class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $totalBarangMenunggu->count() }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Orang menunggu dikonfirmasi</p>
            </a>

        </div>
    @endrole

    <div class="lg:flex lg:space-x-3 space-x-0 space-y-3 lg:space-y-0">

        <a href="{{ route('pinjam.export') }}"
            class="p-3 text-xs font-medium text-center w-full lg:w-28 inline-flex justify-center items-center text-white bg-slate-800 rounded-lg hover:bg-blue-800 lg:mb-2 mb-0">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor"
                viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-167l80 80c9.4 9.4 24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-39 39V184c0-13.3-10.7-24-24-24s-24 10.7-24 24V318.1l-39-39c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9z" />
            </svg>
            Export
        </a>
        <div>
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="search" wire:model.live="search"
                    class="block p-2.5 w-full lg:w-[250px] pl-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Nama/Status">
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-slate-800 tracking-wider">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal Dikembalikan
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            @role('ADMIN')
            <tbody>
                @forelse ($peminjams as $peminjam)
                    <tr class="bg-white border-b">

                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $peminjam->user->fotoProfile) }}"
                                class="aspect-square w-14" alt="">

                        </td>
                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                            <a class="text-blue-500"
                                href="{{ route('pinjam.show', $peminjam->id) }}">{{ $peminjam->user->name }}</a>
                        </th>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_pinjam }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_pengembalian }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_dikembalikan }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            <a href="{{ asset('storage/' . $peminjam->suratImage) }}" target="_blank"
                                class="text-blue-500">Lihat</a>
                        </td>
                        @if ($peminjam->status == 'Menunggu')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @elseif ($peminjam->status == 'Diverifikasi Admin')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @elseif ($peminjam->status == 'Disetujui')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('pinjam.selesai', $peminjam->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Selesai</button>
                                </form>
                            </td>
                        @elseif ($peminjam->status == 'Ditolak')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @else
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @endif

                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td colspan="8" class="px-4 py-6 text-center">
                            Data tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            @endrole

            @role('KASUBAG')
            <tbody>
                @forelse ($peminjamAdmin as $peminjam)
                    <tr class="bg-white border-b">

                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $peminjam->user->fotoProfile) }}"
                                class="aspect-square w-14" alt="">

                        </td>
                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                            <a class="text-blue-500"
                                href="{{ route('pinjam.show', $peminjam->id) }}">{{ $peminjam->user->name }}</a>
                        </th>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_pinjam }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_pengembalian }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            {{ $peminjam->tgl_dikembalikan }}
                        </td>
                        <td class="px-6 py-4 truncate">
                            <a href="{{ asset('storage/' . $peminjam->suratImage) }}" target="_blank"
                                class="text-blue-500">Lihat</a>
                        </td>
                        @if ($peminjam->status == 'Menunggu')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @elseif ($peminjam->status == 'Diverifikasi Admin')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @elseif ($peminjam->status == 'Disetujui')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('pinjam.selesai', $peminjam->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Selesai</button>
                                </form>
                            </td>
                        @elseif ($peminjam->status == 'Ditolak')
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @else
                            <td class="px-6 whitespace-nowrap py-4">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $peminjam->status }}</span>
                            </td>
                        @endif

                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td colspan="8" class="px-4 py-6 text-center">
                            Data tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            @endrole
        </table>
    </div>
    <div class="mt-5">
        {{ $peminjams->links() }}
    </div>
</div>
