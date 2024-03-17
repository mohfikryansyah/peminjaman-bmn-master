<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Peminjam;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class DaftarPeminjam extends Component
{
    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Url(history: true)]
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.daftar-peminjam', [
            'peminjams' => Peminjam::where('status', 'like', '%' . $this->search . '%')
                // ->orWhere('nama', 'like', '%'.$this->search.'%')
                ->latest()
                ->simplePaginate(7),
            'peminjamAdmin' => Peminjam::where('status', 'like', '%' . $this->search . '%')
                // ->orWhere('nama', 'like', '%'.$this->search.'%')
                ->where('status', 'Diverifikasi Admin')
                ->latest()
                ->simplePaginate(7),
            'totalBarang' => Barang::all(),
            'totalBarangDipinjam' => Peminjam::where('status', 'like', '%Disetujui%')->get(),
            'totalBarangSelesaiDipinjam' => Peminjam::where('status', 'like', '%Dikembalikan%')->get(),
            'totalBarangMenunggu' => Peminjam::where('status', 'like', '%Menunggu%')->get(),
        ]);
    }
}
