@extends('template.layout')
@section('page-title')
    Transaksi
@endsection
@section('content')
    @if (session('struk_url'))
        <script>
            window.onload = function() {
                let strukWindow = window.open("{{ session('struk_url') }}", "_blank");
                strukWindow.onload = function() {
                    strukWindow.print();
                }
            }
        </script>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Data Transaksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total</th>
                                    <th>Bayar</th>
                                    <th>Kembali</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $d->kode_transaksi }}</td>
                                        <td>{{ $d->pengguna->nama ?? 'Tidak Ditemukan' }}</td>
                                        <td>{{ number_format($d->total) }}</td>
                                        <td>{{ number_format($d->bayar) }}</td>
                                        <td>{{ number_format($d->kembali) }}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>
                                            <a href="{{ url('transaksi/show/' . $d->kode_transaksi) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="{{ url('transaksi/delete/' . $d->id_transaksi) }}"
                                                class="btn btn-sm btn-warning"
                                                onclick="return confirm('Yakin ingin menghapus?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
