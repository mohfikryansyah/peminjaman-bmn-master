<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.tabel-barang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.add-barang');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama' => 'required',
            'stokawal' => 'required',
            'kode_barang' => 'required|unique:barangs',
            'satuan' => 'required',
        ]);

        $validatedData['stok'] = $validatedData['stokawal'];

        Barang::create($validatedData);
        return redirect()->back()->with('BARANG_STORED', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        dd($barang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('auth.edit-barang', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {   
        $rules = [
            'nama' => 'required',
            'stokawal' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ];

        if ($request->kode_barang != $barang->kode_barang) {
            $rules['kode_barang'] = 'required|unique:barangs';
        }

        $validatedData = $request->validate($rules);


        Barang::where('id', $barang->id)->update($validatedData);
        return redirect('/dashboard/barang')->with('BARANG_STORED', 'Data barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect()->back();
    }
}
