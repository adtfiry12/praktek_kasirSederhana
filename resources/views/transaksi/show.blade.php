@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-title">
                        <h4>Data Detail Transaksi Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }} <br>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Transaksi</th>
                                        <th>Barang</th>
                                        <th>Jumlah Beli</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($transaksi->detail_transaksi as $data)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data->kode_transaksi }}</td>
                                            <td>{{ $data->barang->nama_barang }}</td>
                                            <td>{{ $data->jumlah_beli }}</td>
                                            <td>RP. {{ $data->sub_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
