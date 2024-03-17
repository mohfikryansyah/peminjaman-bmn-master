@include('master.app')
@include('auth.partials.navbar')
@include('auth.partials.sidebar')

<div class="flex pt-16 overflow-hidden bg-pallete-300">
    <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64">
        <main class="p-5 rounded-tr-xl rounded-tl-xl bg-white">
            @yield('content')
        </main>
    </div>
</div>
@include('auth.partials.footer')
