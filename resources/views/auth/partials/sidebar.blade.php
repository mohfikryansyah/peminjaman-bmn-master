<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-pallete-300 lg:translate-x-0"
    aria-label="Sidebar">
    @if (auth()->user()->verified)
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard"
                        class="{{ Request::is('dashboard') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                        <svg class="{{ Request::is('dashboard') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                @role(['ADMIN', 'KASUBAG'])
                    <li>
                        <a href="{{ route('pinjam.daftar') }}"
                            class="{{ Request::is('dashboard/daftar-peminjam') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                            <svg class="{{ Request::is('dashboard/daftar-peminjam') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Peminjam</span>
                        </a>
                    </li>
                @endrole


                <li>
                    <a href="/dashboard/barang"
                        class="{{ Request::is('dashboard/barang') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                        <svg class="{{ Request::is('dashboard/barang') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 20">
                            <path
                                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Barang</span>
                    </a>
                </li>

                @role(['ADMIN'])
                <li>
                    <a href="/dashboard/barang/create"
                        class="{{ Request::is('dashboard/barang/create') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">

                        <svg class="{{ Request::is('dashboard/barang/create') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Barang baru</span>
                    </a>
                </li>
                @endrole


                @role(['PEGAWAI', 'KASUBAG'])
                    <li>
                        <a href="{{ route('pinjam.index') }}"
                            class="{{ Request::is('dashboard/piminjaman-barang') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                            <svg class="{{ Request::is('dashboard/piminjaman-barang') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor"
                                viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M0 448c0 35.3 28.7 64 64 64H224V384c0-17.7 14.3-32 32-32H384V64c0-35.3-28.7-64-64-64H64C28.7 0 0 28.7 0 64V448zM171.3 75.3l-96 96c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l96-96c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zm96 32l-160 160c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l160-160c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6zM384 384H256V512L384 384z" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Form Peminjaman</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('user.index') }}"
                            class="{{ Request::is('dashboard/piminjaman-barang-user') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                            <svg class="{{ Request::is('dashboard/piminjaman-barang-user') ? 'text-gray-900' : '' }} w-5 h-5 text-gray-200 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">History Peminjam</span>
                        </a>
                    </li>
                @endrole

                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="/profile"
                            class="{{ Request::is('profile') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="{{ Request::is('profile') ? 'text-gray-900' : '' }} w-6 h-6 text-gray-200 transition duration-75 group-hover:text-gray-900" viewBox="0 0 640 512" height="1em" fill="currentColor"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v17.7c0 7.8 4.8 14.8 11.6 18.7c6.8 3.9 15.1 4.5 21.8 .6l13.8-7.9c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-14.4 8.3c-6.5 3.7-10 10.9-10 18.4s3.5 14.7 10 18.4l14.4 8.3c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-13.8-7.9c-6.7-3.9-15.1-3.3-21.8 .6c-6.8 3.9-11.6 10.9-11.6 18.7v17.7c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V467.8c0-7.9-4.9-14.9-11.7-18.9c-6.8-3.9-15.2-4.5-22-.6l-13.5 7.8c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l14-8.1c6.5-3.8 10.1-11.1 10.1-18.6s-3.5-14.8-10.1-18.6l-14-8.1c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l13.6 7.8c6.8 3.9 15.2 3.3 22-.6c6.9-3.9 11.7-11 11.7-18.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z"/></svg>
                            <span class="flex-1 ml-2 whitespace-nowrap">Pengaturan Akun</span>
                        </a>
                    </li>

                    @role(['ADMIN'])
                        <li>
                            <a href="/register"
                                class="{{ Request::is('register') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="{{ Request::is('register') ? 'text-gray-900' : '' }} w-6 h-6 text-gray-200 transition duration-75 group-hover:text-gray-900" height="1em"
                                fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                                <span class="flex-1 ml-2 whitespace-nowrap">Tambah User</span>
                            </a>
                        </li>
                        <li>
                            <a href="/users"
                                class="{{ Request::is('users') ? 'bg-gray-100 text-gray-900' : '' }} flex items-center p-2 rounded-lg text-gray-200 hover:bg-gray-100 hover:text-gray-900 group">
                                <svg class="{{ Request::is('users') ? 'text-gray-900' : '' }} w-6 h-6 text-gray-200 transition duration-75 group-hover:text-gray-900"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                                <span class="flex-1 ml-2 whitespace-nowrap">Users</span>
                            </a>
                        </li>
                    @endrole
                </ul>
            </ul>
        </div>
    @endif
</aside>
