@extends('template.layout')
@section('page-title')
    Barang
@endsection
@section('content')
    <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data Barang </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Barang</th>
                                                <th>ID Kategori</th>
                                                <th>kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Expired</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $d)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->id_barang }}</td>
                                                <td>{{ $kategori->nama_kategori }}</td>
                                                <td>{{ $d->kode_barang }}</td>
                                                <td>{{ $d->nama_barang }}</td>
                                                <td>{{ $d->harga }}</td>
                                                <td>{{ $d->stok }}</td>
                                                <td>{{ $d->tgl_expired }}</td>
                                                <td>
                                                    <a href="{{ url('barang/edit/'.$d->id_barang) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ url('barang/delete/'. $d->id_barang) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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