@extends('auth.layouts.main')

@section('content')
    <div>
        <div class="mb-3">
            <h1 class="sm:text-2xl text-lg font-semibold">Dashboard</h1>
        </div>
        <div class="lg:h-[87vh] w-full relative">
            <div class="grid lg:grid-cols-4 grid-flow-row lg:gap-4 gap-2 w-full lg:absolute">
                @role('ADMIN')
                    <a
                        class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $totalBarang->count() }}
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
                @endrole

                @role(['PEGAWAI', 'KASUBAG'])
                    <a
                        class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $totalBarang->count() }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Total barang</p>
                    </a>
                    <a
                        class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $totalBarangDipinjam->where('user_id', auth()->user()->id)->count() }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Barang sedang dipinjam</p>
                    </a>
                    <a
                        class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $totalBarangSelesaiDipinjam->where('user_id', auth()->user()->id)->count() }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Barang telah dikembalikan</p>
                    </a>
                    <a
                        class="block cursor-default w-full lg:max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $totalBarangMenunggu->where('user_id', auth()->user()->id)->count() }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Barang menunggu konfirmasi</p>
                    </a>
                @endrole

            </div>
            <div class="flex flex-col items-center justify-center h-full">
                <div class="flex flex-col mb-5 mt-20">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Logo_of_the_Ministry_of_Environmental_Affairs_and_Forestry_of_the_Republic_of_Indonesia.svg/900px-Logo_of_the_Ministry_of_Environmental_Affairs_and_Forestry_of_the_Republic_of_Indonesia.svg.png"
                        class="h-52" alt="">
                </div>
                <h1 class="text-center mb-5 sm:mb-0 text-3xl sm:text-4xl font-extrabold">BPKHTL Wilayah XV Gorontalo</h1>
                <p class="text-center text-2xl max-w-2xl">Jl. Rusli Datau No.10, Dulomo Sel., Kec. Kota Utara, Kota
                    Gorontalo,
                    Gorontalo 96128</p>
            </div>
        </div>
    </div>
@endsection
