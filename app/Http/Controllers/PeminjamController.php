<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kasie;
use App\Models\Barang;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Exports\PeminjamExport;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = auth()->user()->id;
            $user = User::find($id);
            if ($user->hasAnyRole(['PEGAWAI'])) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        //
    }

    public function getNamaNip($seksi)
    {
        $data = Kasie::where('seksi', $seksi)->first();
        return response()->json($data);
    }

    public function getKodebarang()
    {
        $kodebarang = Barang::where('nama', 'LIKE', '%' . request('q') . '%')
            ->orWhere('id', 'LIKE', '%' . request('q') . '%')
            ->paginate(10);
        return response()->json($kodebarang);
    }

    public function show(Peminjam $peminjam)
    {
        return view('auth.peminjam.show-details-peminjam', [
            'peminjam' => $peminjam,
        ]);
    }

    public function export()
    {
        return Excel::download(new PeminjamExport(), 'peminjam.xlsx');
    }

    public function daftarPeminjam()
    {
        return view('auth.daftar-peminjam');
    }

    public function konfirmasiPeminjam(Request $request, $id)
    {
        $validatedPinjamBarang = [
            'kode_barang1' => $request->input('kode_barang1'),
            'kode_barang2' => $request->input('kode_barang2'),
            'kode_barang3' => $request->input('kode_barang3'),
            'seriNUP1' => $request->input('seriNUP1'),
            'seriNUP2' => $request->input('seriNUP2'),
            'seriNUP3' => $request->input('seriNUP3'),
        ];

        $confirm = Peminjam::findOrFail($id);

        $kodeBarang1 = Barang::where('kode_barang', $validatedPinjamBarang['kode_barang1'])->first();
        $kodeBarang2 = Barang::where('kode_barang', $validatedPinjamBarang['kode_barang2'])->first();
        $kodeBarang3 = Barang::where('kode_barang', $validatedPinjamBarang['kode_barang3'])->first();

        if ($request->hasFile('foto_barang')) {
            $confirm
                ->fill([
                    'foto_barang' => ($validatedPinjamBarang['foto_barang'] = $request->file('foto_barang')->store('foto-barang')),
                ])
                ->save();
        }

        if (empty($confirm->kode_barang1) || empty($confirm->seriNUP1)) {
            if ($kodeBarang1) {
                $confirm
                    ->fill([
                        'kode_barang1' => $validatedPinjamBarang['kode_barang1'],
                        'seriNUP1' => $validatedPinjamBarang['seriNUP1'],
                        'status' => 'Diverifikasi Admin',
                    ])
                    ->save();
            } else {
                return back()->with('fail1', 'kode barang tidak ditemukan');
            }
        }

        if (empty($confirm->kode_barang2) || empty($confirm->seriNUP2)) {
            if ($kodeBarang2) {
                $confirm
                    ->fill([
                        'kode_barang2' => $validatedPinjamBarang['kode_barang2'],
                        'seriNUP2' => $validatedPinjamBarang['seriNUP2'],
                        'status' => 'Diverifikasi Admin',
                    ])
                    ->save();
            } else {
                return back()->with('fail2', 'kode barang tidak ditemukan');
            }
        }

        if (empty($confirm->kode_barang3) || empty($confirm->seriNUP3)) {
            if ($kodeBarang3) {
                $confirm
                    ->fill([
                        'kode_barang3' => $validatedPinjamBarang['kode_barang3'],
                        'seriNUP3' => $validatedPinjamBarang['seriNUP3'],
                        'status' => 'Diverifikasi Admin',
                    ])
                    ->save();
            } else {
                return back()->with('fail3', 'kode barang tidak ditemukan');
            }
        }

        return redirect()->back()->with('confirmSuccess', 'Success');
    }

    public function confirmAdmin($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam
            ->fill([
                'status' => 'Disetujui',
            ])
            ->save();

        $kodeBarang1 = Barang::where('kode_barang', $peminjam->kode_barang1)->first();
        $kodeBarang2 = Barang::where('kode_barang', $peminjam->kode_barang2)->first();
        $kodeBarang3 = Barang::where('kode_barang', $peminjam->kode_barang3)->first();


        // dd($peminjam->stokbarang1);
        if ($kodeBarang1->stok >= $peminjam->stokbarang1) {
            $kodeBarang1->decrement('stok', $peminjam->stokbarang1);
        } else {
            return back()->with('fail1', 'stok barang tidak mencukupi');
        }

        if ($kodeBarang2->stok >= $peminjam->stokbarang2) {
            $kodeBarang2->decrement('stok', $peminjam->stokbarang2);
        } else {
            return back()->with('fail1', 'stok barang tidak mencukupi');
        }

        if ($kodeBarang3->stok >= $peminjam->stokbarang3) {
            $kodeBarang3->decrement('stok', $peminjam->stokbarang3);
        } else {
            return back()->with('fail1', 'stok barang tidak mencukupi');
        }

        return redirect()->back();
    }

    public function selesai($id)
    {
        $selesai = Peminjam::findOrFail($id);
        $stokBarang1 = Barang::where('kode_barang', $selesai['kode_barang1'])->first();
        $stokBarang2 = Barang::where('kode_barang', $selesai['kode_barang2'])->first();
        $stokBarang3 = Barang::where('kode_barang', $selesai['kode_barang3'])->first();

        $selesai->status = 'Dikembalikan';
        $selesai->tgl_dikembalikan = Carbon::today();
        $selesai->save();

        if (!empty($selesai->kode_barang1)) {
            $stokBarang1->increment('stok', $selesai['stokbarang1']);
            $stokBarang1->save();
        }

        if (!empty($selesai->kode_barang2)) {
            $stokBarang2->increment('stok', $selesai['stokbarang2']);
            $stokBarang2->save();
        }

        if (!empty($selesai->kode_barang3)) {
            $stokBarang3->increment('stok', $selesai['stokbarang3']);
            $stokBarang3->save();
        }

        return redirect()->back()->with('selesaiSuccess');
    }

    public function tolakPeminjam($id)
    {
        $tolak = Peminjam::findOrFail($id);
        $tolak->status = 'Ditolak';
        $tolak->save();

        return redirect()->back()->with('tolakSuccess', 'Permintaan ditolak');
    }
}
