@extends('template.layout')
@section('page-title')
    Kategori
@endsection
@section('content')
    <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data Kategori </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Kategori</th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->id_kategori }}</td>
                                                <td>{{ $d->nama_kategori }}</td>
                                                <td>
                                                    <a href="{{ url('kategori/edit/'.$d->id_kategori) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('kategori/delete/'. $d->id_kategori) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
@endsection