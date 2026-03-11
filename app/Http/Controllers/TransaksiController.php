<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('pengguna')->get();
        $query = DB::table('transaksi')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'transaksi.id_pelanggan')
            ->join('pengguna', 'pengguna.id_pengguna', '=', 'transaksi.id_pengguna')
            ->select(
                'transaksi.id_transaksi',
                'transaksi.kode_transaksi',
                'pelanggan.nama',
                'pengguna.nama as nama_pengguna',
                'transaksi.total',
                'transaksi.bayar',
                'transaksi.kembali',
                'transaksi.created_at'
            )->get();
        return view('transaksi.index', compact('data', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function kode_transaksi()
    {
        $tgl = date('Y-m-d');
        $number = Transaksi::where("created_at", "like", "%" . $tgl . "%")->count();
        $angka = $number + 1;
        $codes = str_pad($angka, 3, rand(11, 99), STR_PAD_LEFT);
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
        $act = Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'id_pelanggan'   => $request->id_pelanggan,
            'id_pengguna'    => $request->id_pengguna,
            'total'          => $request->total,
            'bayar'          => $request->bayar,
            'kembali'        => $request->kembali
        ]);

        if ($act) {
            $id_barang   = $request->dt_id_barang;
            $jumlah_beli = $request->dt_jumlah_beli;
            $sub_total   = $request->dt_sub_total;

            if (!empty($id_barang)) {
                foreach ($id_barang as $i => $key) {
                    $baru = new DetailTransaksi;

                    $baru->kode_transaksi = $act->kode_transaksi;
                    $baru->id_barang   = $key;
                    $baru->jumlah_beli = $jumlah_beli[$i];
                    $baru->sub_total   = $sub_total[$i];
                    $baru->save();
                }
                return redirect('transaksi')->with('struk_url', route('/struk', ['kode_transaksi' => $act->kode_transaksi]));
            } else {
                return redirect('struk/' . $request->kode_transaksi);
            }
        }
    }

    public function tampilStruk($kode_transaksi)
    {
        $data['transaksi'] = Transaksi::with('pelanggan', 'pengguna')->where('kode_transaksi', $kode_transaksi)->first();
        $data['detail_transaksi'] = DetailTransaksi::with('barang')->where('kode_transaksi', $kode_transaksi)->get();
        return view('transaksi.struk', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($kode_transaksi)
    {
        $data['transaksi'] = Transaksi::with('detail_transaksi.barang')->where('kode_transaksi', $kode_transaksi)->firstOrFail();
        return view('transaksi.show', $data);
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

    public function cari(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return response()->json(['val' => 2]);
        }

        $isi = Pelanggan::where('kode_pelanggan', $id)->first();

        if (!$isi) {
            return response()->json(['val' => 0]);
        }

        return response()->json([
            'val' => 1,
            'data' => $isi
        ]);
    }

    public function caribarang(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return response()->json(['val' => 2]);
        }

        $isi = Barang::with('kategori')
            ->where('kode_barang', $id)
            ->first();

        if (!$isi) {
            return response()->json(['val' => 0]);
        }

        return response()->json([
            'val' => 1,
            'data' => $isi
        ]);
    }
}
