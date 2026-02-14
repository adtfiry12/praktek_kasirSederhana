@extends('template.layout')
@section('page-title')
    Kategori
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Tambah Data Kategori</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('kategori/store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama Kategori" name="nama_kategori">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection