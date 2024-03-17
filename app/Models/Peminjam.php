<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['']

    public function hitungSelisihTanggal()
    {
        $tanggalPengembalian = Carbon::parse($this->tgl_pengembalian);
        $tanggalSekarang = Carbon::now();

        $selisihHari = $tanggalSekarang->diffInDays($tanggalPengembalian);

        return $selisihHari;
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kasie()
    {
        return $this->belongsTo(Kasie::class, 'kasie_id');
    }
}