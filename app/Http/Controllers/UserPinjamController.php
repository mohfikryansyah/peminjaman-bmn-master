<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class UserPinjamController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = auth()->user()->id;
            $user = User::find($id);
            if (!$user->hasAnyRole(['KASUBAG', 'PEGAWAI'])) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        return view('auth.peminjam.daftar-peminjam-user', [
            'peminjams' => Peminjam::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function peminjaman(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'noSPT' => 'required|numeric',
            'tgl_pengembalian' => 'required',
            'suratImage' => 'required|mimes:pdf|file|max:1024',
        ]);

        $validatedPinjamBarang = [
            'noSPT' => $request->input('noSPT'),
            'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            'barang1' => $request->input('barang1'),
            'stokbarang1' => $request->input('stokbarang1'),
            'barang2' => $request->input('barang2'),
            'stokbarang2' => $request->input('stokbarang2'),
            'barang3' => $request->input('barang3'),
            'stokbarang3' => $request->input('stokbarang3'),
        ];

        $validatedPinjamBarang['suratImage'] = $request->file('suratImage')->store('surat-images');
        $validatedPinjamBarang['user_id'] = auth()->user()->id;
        $validatedPinjamBarang['kasie_id'] = auth()->user()->kasie_id;
        $validatedPinjamBarang['tgl_pinjam'] = Carbon::today();
        $validatedPinjamBarang['status'] = 'Menunggu';

        // dd($validatedPinjamBarang);
        Peminjam::create($validatedPinjamBarang);

        return redirect('dashboard/piminjaman-barang')->with('PINJAM_STORED', 'Menunggu Konfirmasi Peminjaman Barang');
    }
}
