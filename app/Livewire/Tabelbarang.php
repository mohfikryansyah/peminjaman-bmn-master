<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Tabelbarang extends Component
{   
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url(history: true)]
    public $search = '';

    

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSort()
    {
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        return view('livewire.tabelbarang', [
            'barangs' => Barang::orderBy('stok', $this->sort)
                        ->where('nama', 'like', '%'.$this->search.'%')
                        ->orWhere('kode_barang', 'like', '%'.$this->search.'%')
                        ->simplePaginate(7)
        ]);
    }
}
