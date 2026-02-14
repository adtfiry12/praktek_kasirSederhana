@extends('template.layout')
@section('page-title')
    Pengguna
@endsection
@section('content')
    <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data Pengguna </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Pengguna</th>
                                                <th>Nama</th>
                                                <th>No Telp</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->id_pengguna }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->no_telp }}</td>
                                                <td>{{ $d->role }}</td>
                                                <td>
                                                    <a href="{{ url('pengguna/edit/'.$d->id_pengguna) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('pengguna/delete/'. $d->id_pengguna) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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