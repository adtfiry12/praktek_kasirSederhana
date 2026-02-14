<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengguna::all();
        return view('pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'role' => $request->role,
            'password' => $request->password
        ]);

        return redirect('pengguna')->with('success', 'data berhasil di tambahkan');
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
        $data = Pengguna::find($id);
        return view('pengguna.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pengguna::find($id);
        $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'role' => 'required'
        ]);

        $updateData = [
        'nama'    => $request->nama,
        'no_telp' => $request->no_telp,
        'role'    => $request->role,
    ];

    if ($request->filled('password')) {
        $updateData['password'] = $request->password;
    }

    $data->update($updateData);

        return redirect('pengguna')->with('success', 'data berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengguna::find($id);
        $data->delete();
        return redirect('pengguna');
    }
}
