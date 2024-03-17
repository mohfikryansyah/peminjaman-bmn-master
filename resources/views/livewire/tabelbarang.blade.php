<div>
    
    <div class="flex md:flex-row flex-col lg:w-full lg:justify-between md:items-center mb-5">
        <h1 class="text-xl md:text-2xl font-semibold">Daftar Barang Milik Negara</h1>
        <div class="flex-1 md:border mx-5"></div>
        <div class="mb-0 md:mt-0 mt-2">
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
                    class="block p-2 w-full lg:w-[250px] pl-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Nama/kode barang">
            </div>
        </div>
    </div>
    {{-- @role('ADMIN') --}}

        <div class="relative overflow-x-auto shadow-lg rounded-lg mb-5">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        @role('ADMIN')
                        <th scope="col" class="px-6 py-3">
                            Kode Barang
                        </th>
                        @endrole
                        <th scope="col" class="px-6 py-3">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Stok Awal
                                <button wire:click="setSort('asc')"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></button>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Sisa Stok
                                <button wire:click="setSort('asc')"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></button>
                            </div>
                        </th>
                        @role('ADMIN')
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $index => $barang)
                        <tr class="bg-white border-b duration-500 hover:bg-gray-100">
                            <th scope="row" class="px-6 py-4">
                                {{ $barangs->firstItem() + $index }}
                            </th>
                            <td wire:key="{{ $barang->id }}"
                                class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                {{ $barang->nama }}
                            </td>
                            @role('ADMIN')
                            <td class="px-6 py-4">
                                {{ $barang->kode_barang }}
                            </td>
                            @endrole
                            <td class="px-6 py-4">
                                {{ $barang->satuan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $barang->stokawal }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $barang->stok }}
                            </td>
                            @role('ADMIN')
                                <td class="px-6 py-4 flex">
                                    @include('components.edit-barang-button')

                                    @include('components.modal-delete-barang')
                                </td>
                            @endrole
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="6" class="px-6 py-4 text-center">
                                Tidak ada Barang
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $barangs->links() }}
    {{-- @endrole --}}
</div>
