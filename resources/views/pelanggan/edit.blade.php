@extends('template.layout')
@section('page-title')
    Pelanggan
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Data Pelanggan</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('pelanggan/update/'.$data->id_pelanggan) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Kode Pelanggan</label>
                                            <input type="text" class="form-control" name="kode_pelanggan" value="{{ $kode_pelanggan }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Pengguna" name="nama" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" id="" cols="30" rows="50" class="form-control" placeholder="Masukan Alamat Anda">{{ $data->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="number" class="form-control" placeholder="Masukan No Telepon Anda" name="no_telp" value="{{ $data->no_telp }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection