@extends('template.layout')
@section('page-title')
    Pelanggan
@endsection
@section('content')
    <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data Pelanggan </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Pelanggan</th>
                                                <th>Kode Pelanggan</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->id_pelanggan }}</td>
                                                <td>{{ $d->kode_pelanggan }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->alamat }}</td>
                                                <td>{{ $d->no_telp }}</td>
                                                <td>
                                                    <a href="{{ url('pelanggan/edit/'.$d->id_pelanggan) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('pelanggan/delete/'. $d->id_pelanggan) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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