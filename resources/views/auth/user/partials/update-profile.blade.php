@if (Session::get('profile'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium"></span> {{ Session::get('profile') }}
        </div>
    </div>
@endif

<div class="w-full p-6 border border-gray-200 rounded-lg shadow relative">
    <h5 class="mb-1 text-lg font-bold tracking-wider text-gray-900 dark:text-white">Informasi Profil</h5>
    <p class="mb-8 font-normal text-sm text-gray-500">Perbarui informasi akun dan email anda</p>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-6">

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="fotoProfile">Upload
                Foto</label>

            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="fotoProfile" id="fotoProfile" name="fotoProfile" onchange="previewImage()"
                type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="fotoProfile">PNG, JPEG, or JPG.<span class="text-gray-500"> FORMAT .HEIC tidak terbaca.</span> Ukuran yang disarankan 4x6</p>

            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5"
                value="{{ old('name', $user->name) }}" autocomplete="name">
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5"
                required value="{{ old('email', $user->email) }}" autocomplete="email">
        </div>
        @role(['PEGAWAI', 'KASUBAG'])
        <div class="mb-6">
            <label for="kasie_id"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seksi</label>
            <select id="kasie_id" name="kasie_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected>-- Pilih Seksi --</option>
                @foreach ($kasie as $k)
                    @if (old('kasie_id', $user->kasie_id) === $k->id)
                        <option value="{{ $k->id }}" selected>{{ $k->seksi }}</option>
                    @else
                        <option value="{{ $k->id }}">{{ $k->seksi }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
            <input type="number" min="0" id="nip" name="nip"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5"
                value="{{ old('nip', $user->nip) }}" autocomplete="nip">
            @error('nip')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="pangkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat/Jabatan</label>
            <input type="text" id="pangkat" name="pangkat"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5"
                value="{{ old('pangkat', $user->pangkat) }}" autocomplete="pangkat">
            @error('pangkat')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        @endrole
        <div class="flex items-center gap-4">
            <button type="submit"
                class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Save</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seksiDropdown = document.getElementById('seksi');
            const namaInput = document.getElementById('namaKasie');
            const nipInput = document.getElementById('nipKasie');

            seksiDropdown.addEventListener('change', function() {
                const selectedSeksi = this.value;
                if (selectedSeksi) {
                    fetch(`/get-nama-nip/${selectedSeksi}`)
                        .then(response => response.json())
                        .then(data => {
                            // console.log('Selected Kasie :' . data.selectedSeksi);
                            namaInput.value = data.namaKasie;
                            nipInput.value = data.nipKasie;
                        })
                        .catch(error => console.error(error));
                } else {
                    namaInput.value = '';
                    nipInput.value = '';
                }
            });
        });
    </script> --}}

    <script>
        window.onscroll = function() {
            const imgPreview = document.querySelector('#img-profile');
            const fixed = imgPreview.offsetTop;

            if (window.pageYOffset > fixed) {
                imgPreview.classList.add('lg:fixed');
                imgPreview.classList.remove('lg:absolute');
                imgPreview.classList.add('top-16');
            } else {
                imgPreview.classList.remove('top-16');
                imgPreview.classList.remove('lg:fixed');
                imgPreview.classList.add('lg:absolute');
            }
        }

        function previewImage() {
            const image = document.querySelector('#fotoProfile');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.classList.add("block");

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</div>
