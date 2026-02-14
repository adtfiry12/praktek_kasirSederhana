@extends('template.layout')
@section('page-title')
    Pengguna
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Data Pengguna</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('pengguna/update/'. $data->id_pengguna) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Pengguna" name="nama" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="number" class="form-control" placeholder="Masukan No Telepon Anda" name="no_telp" value="{{ $data->no_telp }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" class="form-control">
                                                <option value="">-Pilih-</option>
                                                <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="Kasir" {{ $data->role == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                                                <option value="Manager" {{ $data->role == 'Manager' ? 'selected' : '' }}>Manager</option>
                                                <option value="Supervisor" {{ $data->role == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Masukam Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection