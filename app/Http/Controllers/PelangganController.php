<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::all();
        return view('pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */

    private function kode_pelanggan() {
        $dataTerakhir = Pelanggan::latest()->first();
        if(!$dataTerakhir) {
            return 'PLG0001';
        }
        $kodeTerakhir = $dataTerakhir->kode_barang;
        $number = (int) substr($kodeTerakhir, 3) + 1;
        return 'PLG' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function create()
    {   
        $data = $this->kode_pelanggan();
        return view('pelanggan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    Pelanggan::create([
        'kode_pelanggan' => $request->kode_pelanggan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp
    ]);
    return redirect('pelanggan')->with('success', 'data berhasil di tambahkan');
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
        $kode_pelanggan = $this->kode_pelanggan();
        $data = Pelanggan::find($id);
        return view('pelanggan.edit', compact('data', 'kode_pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pelanggan::find($id);
        $data->update([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);
        return redirect('pelanggan')->with('success', 'data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pelanggan::find($id);
        $data->delete();
        return redirect('pelanggan')->with('success', 'berhasil menghapus data');
    }
}
