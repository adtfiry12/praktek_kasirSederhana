<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::all();
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function kode_transaksi()
    {
        $tgl = date('Y-m-d');
        $number = Transaksi::where("created_at", "like", "%" . $tgl . "%")->count();
        $angka = $number + 1;
        $codes = str_pad($angka, 3, rand(11,99), STR_PAD_LEFT);
        $code = "TRS-" . date('ymd') . $codes;

        return $code;
    }


    public function create()
    {   
        $data['pengguna'] = Pengguna::get();
        $data['kode_transaksi'] = self::kode_transaksi();
        return view('transaksi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cari(Request $request){
    $id = $request->id;

    if(!$id){
        return response()->json(['val'=>2]);
    }

    $isi = Pelanggan::where('kode_pelanggan',$id)->first();

    if(!$isi){
        return response()->json(['val'=>0]);
    }

    return response()->json([
        'val'=>1,
        'data'=>$isi
    ]);
}

public function caribarang(Request $request){
    $id = $request->id;

    if(!$id){
        return response()->json(['val'=>2]);
    }

    $isi = Barang::with('kategori')
        ->where('kode_barang', $id)
        ->first();

    if(!$isi){
        return response()->json(['val'=>0]);
    }

    return response()->json([
        'val'=>1,
        'data'=>$isi
    ]);
}

}
