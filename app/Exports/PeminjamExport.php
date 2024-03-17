<?php

namespace App\Exports;

use App\Models\Peminjam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeminjamExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        return Peminjam::select('user_id', 'kasie_id', 'noSPT', 'barang1', 'kode_barang1', 'stokbarang1', 'barang2', 'kode_barang2', 'stokbarang2', 'barang3', 'kode_barang3', 'stokbarang3', 'tgl_pinjam', 'tgl_pengembalian', 'status')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'NIP', 'Pangkat', 'Seksi', 'No. SPT', 'Barang 1', 'Kode Barang 1', 'Stok Barang 1', 'Barang 2', 'Kode Barang 2', 'Stok Barang 2', 'Barang 3', 'Kode Barang 3', 'Stok Barang 3', 'Tanggal Peminjaman', 'Tanggal Pengembalian', 'Tanggal Dikembalikan', 'Status'];
    }

    public function map($row): array
    {
        $row->nip = "'" . $row->user->nip;
        $row->nama = $row->user->name;
        $row->email = $row->user->email;
        $row->pangkat = $row->user->pangkat;
        $row->seksi = $row->kasie->seksi;
        $row->kode_barang1 = "'" . $row->kode_barang1;
        $row->kode_barang2 = "'" . $row->kode_barang2;
        $row->kode_barang3 = "'" . $row->kode_barang3;

        return [
            $row->nama,
            $row->email,
            $row->nip,
            $row->pangkat,
            $row->seksi,
            $row->noSPT,
            $row->barang1,
            $row->kode_barang1,
            $row->stokbarang1,
            $row->barang2,
            $row->kode_barang2,
            $row->stokbarang2,
            $row->barang3,
            $row->kode_barang3,
            $row->stokbarang3,
            $row->tgl_pinjam,
            $row->tgl_pengembalian,
            $row->tgl_dikembalikan,
            $row->status
        ];
    }
}
