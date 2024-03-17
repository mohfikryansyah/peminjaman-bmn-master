@extends('master.layout.main')

@section('content')
    <header class="w-full lg:bg-transparent bg-green-800 absolute top-0 left-0">
        <nav class="z-20 top-0 left-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://bpkhtl15-gorontalo.id/" class="flex ml-2 md:mr-24">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Logo_of_the_Ministry_of_Environmental_Affairs_and_Forestry_of_the_Republic_of_Indonesia.svg/900px-Logo_of_the_Ministry_of_Environmental_Affairs_and_Forestry_of_the_Republic_of_Indonesia.svg.png"
                        class="h-8 mr-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">BPKHTL-XV</span>
                </a>
                <div class="w-fit ml-auto">
                    @auth
                        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                            class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center md:w-full w-[140px]  truncate"
                            type="button">Welcome, {{ auth()->user()->name }}
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownInformation"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{ auth()->user()->name }}</div>
                                <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformationButton">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 ">Logout</button>
                                    </form>
                                </li>
                        </div>
                    @else
                        <a href="/login"
                            class="text-white outline-1 outline hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">LOGIN</a>
                    @endauth
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 lg:-ml-44 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <section
        class="lg:pt-[32vh] pt-[32vh] h-[100vh] bg-[url(https://images.unsplash.com/photo-1511884642898-4c92249e20b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80)] bg-blend-multiply bg-gray-700">
        <div class="grid max-w-screen-lg px-4 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="text-center col-span-12">
                <h1 class="mb-4 text-3xl font-bold tracking-wider md:text-4xl lg:text-5xl text-white dark:text-white">
                    WEBSITE PEMINJAMAN BARANG MILIK NEGARA BPKHTL XV GORONTALO</h1>
                <p class="max-w-2xl mx-auto mb-6 font-light text-gray-200 lg:mb-8 md:text-lg lg:text-xl">Masuk Untuk
                    Melakukan Peminjaman Barang. Hubungi Admin (Yola) untuk pendaftaran akun.</p>
            </div>
        </div>
    </section>
@endsection
