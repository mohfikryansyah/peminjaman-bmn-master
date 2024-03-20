@extends('auth.layouts.main')
@section('content')
    <h1 class="mb-5 font-bold text-2xl">Detail Peminjam</h1>

    <p class="font-semibold">
        Status :
        @if ($peminjam->status == 'Menunggu')
            <span
                class="bg-yellow-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $peminjam->status }}</span>
        @elseif($peminjam->status == 'Diverifikasi Admin')
            <span
                class="bg-orange-100 text-orange-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">{{ $peminjam->status }}</span>
        @elseif($peminjam->status == 'Disetujui')
            <span
                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $peminjam->status }}</span>
        @else
            <span
                class="bg-blue-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $peminjam->status }}</span>
        @endif
    </p>

    <div class="md:grid md:grid-cols-3 md:gap-5 mt-5">
        <div class="col-span-2">
            <div class="lg:grid lg:grid-cols-2 lg:gap-4 bg-white border border-gray-300 rounded-lg p-5 shadow-lg">
                <div class="mb-3">
                    <label for="nama"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Email</label>
                    <input type="text" id="email" name="email"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->user->email }}" readonly autocomplete="email">
                </div>
                <div class="mb-3">
                    <label for="nip"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">NIP/NIK</label>
                    <input type="number" id="nip" name="nip"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->user->nip }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="pangkat" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Pangkat
                        /
                        Jabatan</label>
                    <input type="text" id="pangkat" name="pangkat"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->user->pangkat }}" readonly>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-2 lg:gap-4 bg-white border border-gray-300 rounded-lg p-5 mt-5 shadow-lg">
                <div class="mb-3 col-span-2">
                    <label for="seksi"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Seksi</label>
                    <input type="text" id="seksi" name="seksi"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required value="{{ $peminjam->kasie->seksi }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="namaKasie" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Nama
                        Kasie</label>
                    <input type="text" id="namaKasie" name="namaKasie"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required value="{{ $peminjam->kasie->namaKasie }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nipKasie" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">NIP
                        Kasie</label>
                    <input type="text" id="nipKasie" name="nipKasie"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required value="{{ $peminjam->kasie->nipKasie }}" readonly>
                </div>
            </div>
        </div>

        <div class="col-span-1 flex space-x-4">
            <div id="img-profile" class="mx-auto w-40 overflow-hidden right-60 rounded-xl aspect-[2/3] mt-5 lg:mt-0">
                <a href="{{ url('storage/' . $peminjam->user->fotoProfile) }}" target="_blank">
                    <img class="img-preview aspect-[2/3] border border-gray-400 h-auto max-w-full rounded-xl mb-3 hover:scale-105 duration-500"
                        src="{{ asset('storage/' . $peminjam->user->fotoProfile) }}">
                </a>
            </div>
            @if (!empty($peminjam->foto_barang))
                <div id="img-profile" class="mx-auto w-40 overflow-hidden right-60 rounded-xl aspect-[2/3] mt-5 lg:mt-0">
                    <a href="{{ url('storage/' . $peminjam->foto_barang) }}" target="_blank">
                        <img class="img-preview aspect-[2/3] border border-gray-400 h-auto max-w-full rounded-xl mb-3 hover:scale-105 duration-500"
                            src="{{ asset('storage/' . $peminjam->foto_barang) }}">
                    </a>
                </div>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('pinjam.confirm', $peminjam->id) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @if (empty($peminjam->foto_barang))
            <div class="lg:grid lg:gap-4 bg-white border border-gray-300 rounded-xl p-5 mt-5 shadow-lg">
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto_barang">Foto
                        Barang</label>
                    <input type="file" id="foto_barang" name="foto_barang"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help">
                    @error('foto_barang')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">
                            {{ $message }}</p>
                    @enderror
                </div>
            </div>
        @endif
        <div class="lg:grid lg:grid-cols-4 lg:gap-4 bg-white border border-gray-300 rounded-xl p-5 mt-5 shadow-lg">
            @if (!empty($peminjam->barang1))
                <div class="mb-3 col-span-1">
                    <label for="barang1" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Barang
                        Pertama</label>
                    <input type="text" id="barang1"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->barang1 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="qtybarang1"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">QTY</label>
                    <input type="text" id="qtybarang1"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->stokbarang1 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="kodebarang1" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Kode
                        Barang</label>
                    <select id="kodebarang1" name="kode_barang1" class="form-control">
                        @if (old('kodebarang1', $peminjam->kode_barang1) === $peminjam->kode_barang1)
                            <option value="{{ $peminjam->kode_barang1 }}" selected>{{ $peminjam->kode_barang1 }} -
                                {{ $peminjam->barang1 }}</option>
                        @else
                            <option value="{{ $k->id }}">{{ $k->seksi }}</option>
                        @endif
                    </select>
                    @if (Session::get('fail1'))
                        <p class="text-xs text-red-500">{{ Session::get('fail1') }}</p>
                    @endif
                </div>
                <div class="mb-3 col-span-1">
                    <label for="seri_barang1"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">NUP/SERI</label>
                    <input type="number" id="seri_barang1" name="seriNUP1"
                        class="border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $peminjam->seriNUP1 ? 'bg-gray-200' : 'bg-gray-50' }}"
                        min="0" value="{{ old('seriNUP1', $peminjam->seriNUP1) }}"
                        {{ $peminjam->seriNUP1 ? 'readOnly' : '' }}>
                </div>
            @endif


            @if (!empty($peminjam->barang2))
                <div class="mb-3 col-span-1">
                    <label for="barang2" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Barang
                        Kedua</label>
                    <input type="text" id="barang2"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->barang2 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="qtybarang2"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">QTY</label>
                    <input type="text" id="qtybarang2"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->stokbarang2 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="kodebarang2" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Kode
                        Barang</label>
                    <select id="kodebarang2" name="kode_barang2" class="form-control">
                        @if (old('kodebarang2', $peminjam->kode_barang2) === $peminjam->kode_barang2)
                            <option value="{{ $peminjam->kode_barang2 }}" selected>{{ $peminjam->kode_barang2 }} -
                                {{ $peminjam->barang2 }}</option>
                        @else
                            <option value="{{ $k->id }}">{{ $k->seksi }}</option>
                        @endif
                    </select>
                    @if (Session::get('fail2'))
                        <p class="text-xs text-red-500">{{ Session::get('fail2') }}</p>
                    @endif
                </div>
                <div class="mb-3 col-span-1">
                    <label for="seribarang2"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">NUP/SERI</label>
                    <input type="number" id="seribarang2" name="seriNUP2"
                        class="border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $peminjam->seriNUP2 ? 'bg-gray-200' : 'bg-gray-50' }}"
                        min="0" value="{{ old('seriNUP2', $peminjam->seriNUP2) }}"
                        {{ $peminjam->seriNUP2 ? 'readOnly' : '' }}>
                </div>
            @endif

            @if (!empty($peminjam->barang3))
                <div class="mb-3 col-span-1">
                    <label for="barang3" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Barang
                        Ketiga</label>
                    <input type="text" id="barang3"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->barang3 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="qtybarang3"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">QTY</label>
                    <input type="text" id="qtybarang3"
                        class="bg-gray-200 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="{{ $peminjam->stokbarang3 }}" readonly>
                </div>
                <div class="mb-3 col-span-1">
                    <label for="kodebarang3" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Kode
                        Barang</label>
                    <select id="kodebarang3" name="kode_barang3" class="form-control">
                        @if (old('kodebarang3', $peminjam->kode_barang3) === $peminjam->kode_barang3)
                            <option value="{{ $peminjam->kode_barang3 }}" selected>{{ $peminjam->kode_barang3 }} -
                                {{ $peminjam->barang3 }}</option>
                        @else
                            <option value="{{ $k->id }}">{{ $k->seksi }}</option>
                        @endif
                    </select>
                    @if (Session::get('fail3'))
                        <p class="text-xs text-red-500">{{ Session::get('fail3') }}</p>
                    @endif
                </div>
                <div class="mb-3 col-span-1">
                    <label for="seribarang3"
                        class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">NUP/SERI</label>
                    <input type="number" id="seribarang3" name="seriNUP3"
                        class="border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $peminjam->seriNUP3 ? 'bg-gray-200' : 'bg-gray-50' }}"
                        min="0" value="{{ old('seriNUP3', $peminjam->seriNUP3) }}"
                        {{ $peminjam->seriNUP3 ? 'readOnly' : '' }}>
                </div>
            @endif
        </div>
        <div class="flex">
            @role('ADMIN')
                @if ($peminjam->status !== 'Diverifikasi Admin' && $peminjam->status !== 'Ditolak')
                    <button type="submit"
                        class="mt-5 p-2 mr-1 text-base font-medium text-center uppercase inline-flex items-center text-white bg-green-600 rounded-lg hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300">
                        VERIFIKASI
                    </button>
                @endif
            @endrole
    </form>
    @role('KASUBAG')
        @if ($peminjam->status == 'Diverifikasi Admin')
            <form action="{{ route('pinjam.confirmAdmin', ['id' => $peminjam->id]) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit"
                    class="mt-5 p-2 mr-1 text-base font-medium text-center uppercase inline-flex items-center text-white bg-green-600 rounded-lg hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300">KONFIRMASI</button>
            </form>
        @endif
    @endrole

    @if ($peminjam->status !== 'Disetujui' && $peminjam->status !== 'Ditolak')
        <form action="{{ route('pinjam.tolak', ['coba' => $peminjam->id]) }}" method="post">
            @csrf
            @method('patch')
            <button type="submit"
                class="mt-5 p-2 mr-1 text-base font-medium text-center uppercase inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300">TOLAK</button>
        </form>
    @endif
    </div>
    @push('select2')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#kodebarang1').select2({
                    placeholder: "Cari kode barang...",
                    ajax: {
                        url: "{{ route('pinjam.kodebarang') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.kode_barang,
                                        text: item.kode_barang + ' - ' + item.nama
                                    }
                                })
                            }
                        }
                    }
                });
            });

            $(document).ready(function() {
                $('#kodebarang2').select2({
                    placeholder: "Cari kode barang...",
                    ajax: {
                        url: "{{ route('pinjam.kodebarang') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.kode_barang,
                                        text: item.kode_barang + ' - ' + item.nama
                                    }
                                })
                            }
                        }
                    }
                });
            });

            $(document).ready(function() {
                $('#kodebarang3').select2({
                    placeholder: "Cari kode barang...",
                    ajax: {
                        url: "{{ route('pinjam.kodebarang') }}",
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.kode_barang,
                                        text: item.kode_barang + ' - ' + item.nama
                                    }
                                })
                            }
                        }
                    }
                });
            });
        </script>
    @endpush

@endsection
