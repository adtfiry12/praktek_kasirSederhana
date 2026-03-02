<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = Barang::all();
        $data['kategori'] = Kategori::with('barang')->first();
        return view('barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    private function kode_barang()
    {
        $dataTerakhir = Barang::latest()->first();
        if (!$dataTerakhir) {
            return 'BRG0001';
        }
        $kodeTerakhir = $dataTerakhir->kode_barang;
        $number = (int) substr($kodeTerakhir, 3) + 1;
        return 'BRG' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function create()
    {
        $data['kategori'] = Kategori::get();
        $data['kode_barang'] = $this->kode_barang();
        return view('barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'tgl_expired' => 'required'
        ]);

        Barang::create([
            'id_kategori' => $request->id_kategori,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'tgl_expired' => $request->tgl_expired
        ]);

        return redirect('barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kategori'] = Kategori::get();
        $data['barang'] = Barang::find($id);
        return view('barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Barang::find($id);
        $request->validate([
            'id_kategori' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'tgl_expired' => 'required'
        ]);

        $data->update([
            'id_kategori' => $request->id_kategori,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'tgl_expired' => $request->tgl_expired
        ]);

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('barang');
    }
}
