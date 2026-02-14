@extends('template.layout')
@section('page-title')
    Barang
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class=" m-b-0 text-white">Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('barang/update/'. $barang->id_barang) }}">
                                        @csrf
                                        <div class="form-body">
                                            <h3 class="card-title m-t-15">Edit Data Barang</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kode Barang</label>
                                                        <input type="text" class="form-control"name="kode_barang" value="{{ $barang->kode_barang }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Barang</label>
                                                        <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select name="id_kategori" class="form-control custom-select">
                                                            <option value="null">--Pilih--</option>
                                                            @foreach ($kategori as $k)
                                                                <option value="{{ $k->id_kategori }}" {{ $barang->id_kategori == $k->id_kategori ? 'selected' : '' }}>{{ $k->id_kategori }} || {{ $k->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Harga</label>
                                                        <input type="text" class="form-control" placeholder="Masukan harga Barang" name="harga" value="{{ $barang->harga }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Stok</label>
                                                        <input type="text" class="form-control"name="stok" value="{{ $barang->stok }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Expired</label>
                                                        <input type="date" class="form-control" name="tgl_expired" value="{{ $barang->tgl_expired }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection