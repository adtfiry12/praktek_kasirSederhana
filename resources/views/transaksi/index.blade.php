@extends('template.layout')
@section('page-title')
    Transaksi
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
                                                <th>ID Transaksi</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Total</th>
                                                <th>Bayar</th>
                                                <th>Kembali</th>
                                                <th>Create At</th>
                                                <th>Nama Pelanggan</th>
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
                                                    <a href="{{ url('transaksi/edit/'.$d->id_transaksi) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ url('transaksi/delete/'. $d->id_transaksi) }}" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
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