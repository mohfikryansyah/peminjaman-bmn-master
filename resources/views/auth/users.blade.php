@extends('auth.layouts.main')
@section('content')
    <h1 class="text-2xl font-semibold mb-5">Users</h1>
    <div class="relative overflow-x-auto shadow-lg rounded-lg mb-5">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-slate-800">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Register
                    </th>
                    @role('ADMIN')
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @forelse ($users->skip(1) as $index => $user)
                @foreach ($user->roles as $role)
                    
                @endforeach
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            @if ($user->fotoProfile)
                            <a href="{{ url('storage/' . $user->fotoProfile) }}" target="_blank">
                                <img src="{{ asset('storage/' . $user->fotoProfile) }}" class="aspect-square w-14">
                            </a>
                            @else
                                <p>Belum Upload Foto</p>
                            @endif
                        </td>
                        <td wire:key="{{ $user->id }}" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $role->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            <label class="relative inline-flex items-center mr-5 cursor-pointer">
                                <input type="checkbox" id="verified_{{ $user->id }}" data-user-id="{{ $user->id }}"
                                    class="sr-only peer" {{ $user->verified ? 'checked' : '' }}
                                    onclick="toggleUserStatus(this)">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                            </label>
                        </td>

                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <td colspan="6" class="px-6 py-4 text-center">
                            Tidak ada user
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <script>
        function toggleUserStatus(checkbox) {
            var userId = checkbox.getAttribute('data-user-id');
            var isActive = checkbox.checked;

            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/toggle-user-status/' + userId, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Status updated successfully');
                } else {
                    console.error('Gagal memperbarui status');
                    checkbox.checked = !isActive; // Kembalikan status ke nilai sebelumnya jika terjadi kesalahan
                }
            };

            var data = JSON.stringify({
                isActive: isActive
            });
            xhr.send(data);
        }
    </script>
@endsection
