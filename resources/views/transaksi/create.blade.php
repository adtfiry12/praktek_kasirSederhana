@extends('template.layout')
@section('page-title')
    Transaksi
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah Data</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Tambah Data Transaksi</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kode Transaksi</label>
                                    <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi"
                                        value="{{ $kode_transaksi }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Kode Pelanggan</label>
                                    <input type="text" class="form-control" name="kode_pelanggan" id="kode_pelanggan"
                                        onkeyup="pelanggan()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">No Telepon</label>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp">
                                    <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                                    <input type="hidden" name="id_barang" id="id_barang">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                                        onkeyup="barang()">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Kategori</label>
                                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Stock</label>
                                    <input type="text" class="form-control" name="stok" id="stok">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Tanggal Expired</label>
                                    <input type="text" class="form-control" name="tgl_expired" id="tgl_expired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Jumlah Beli</label>
                                    <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli"
                                        onkeyup="jml_beli()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Sub Total</label>
                                    <input type="text" class="form-control" name="sub_total" id="sub_total">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label><br>
                                    <a href="javascript:void(0)" onclick="TambahRow()" class="btn btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Beli</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="add-row"></tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Total</label>
                                    <input type="text" class="form-control" name="total" id="total">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Bayar</label>
                                    <input type="text" class="form-control" name="bayar" id="bayar"
                                        onkeyup="kembalian()">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Kembali</label>
                                    <input type="text" class="form-control" name="kembali" id="kembali">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Pengguna</label>
                                    <select name="id_pengguna" class="form-control custom-select">
                                        <option value="">Pilih</option>
                                        @foreach ($pengguna as $d)
                                            <option value="{{ $d->id_pengguna }}">{{ $d->id_pengguna }} ||
                                                {{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save
                        </button>
                        <button type="reset" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('bottom')
    <script type="text/javascript">
        function pelanggan() {
            let id = $('#kode_pelanggan').val();

            if (id === '') {
                $('#nama,#no_telp,#id_pelanggan').val('');
                return;
            }

            $.get("{{ url('/caripelanggan') }}", {
                id: id
            }, function(res) {
                if (res.val === 1) {
                    $('#nama').val(res.data.nama);
                    $('#no_telp').val(res.data.no_telp);
                    $('#id_pelanggan').val(res.data.id_pelanggan);
                } else {
                    $('#nama,#no_telp,#id_pelanggan').val('');
                }
            });
        }


        function barang() {
            let id = $('#kode_barang').val();

            if (id === '') {
                $('#id_barang,#nama_kategori,#nama_barang,#harga,#stok,#tgl_expired').val('');
                return;
            }

            $.get("{{ url('/caribarang') }}", {
                id: id
            }, function(res) {
                if (res.val === 1) {
                    $('#id_barang').val(res.data.id_barang);
                    $('#nama_kategori').val(res.data.kategori.nama_kategori);
                    $('#nama_barang').val(res.data.nama_barang);
                    $('#harga').val(res.data.harga);
                    $('#stok').val(res.data.stok);
                    $('#tgl_expired').val(res.data.tgl_expired);
                } else {
                    $('#id_barang,#nama_kategori,#nama_barang,#harga,#stok,#tgl_expired').val('');
                }
            });
        }

        function jml_beli() {
            hrg = document.getElementById('harga').value;
            jml = document.getElementById('jumlah_beli').value;
            total = hrg * jml;
            document.getElementById('sub_total').value = total;
        }

        let no = 1;

        function TambahRow() {
            let namaBarang = $('#nama_barang').val();
            let idBarang = $('#id_barang').val();
            let harga = parseInt($('#harga').val());
            let jumlah = parseInt($('#jumlah_beli').val());
            let stok = parseInt($('#stok').val());

            if (!namaBarang || !jumlah) {
                alert("Data belum lengkap!");
                return;
            }
            if (jumlah > stok) {
                alert("Stok tidak mencukupi")
                return;
            }
            let subTotal = harga * jumlah;
            let row = `
            
                <tr>
                    <td>${no}</td>
                    <td>
                        ${namaBarang}
                        <input type="hidden" name="dt_id_barang[]" value="${$('#id_barang').val()}">
                        <input type="hidden" name="dt_jumlah_beli[]" value="${jumlah}">
                        <input type="hidden" name="dt_harga[]" value="${harga}">
                        <input type="hidden" name="dt_sub_total[]" value="${subTotal}">
                    </td>
                    <td>${harga}</td>    
                    <td>${jumlah}</td>    
                    <td class="subTotal" >${subTotal}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusRow(this)" >Hapus</button>    
                    </td>
                </tr>
            `;
            $('#add-row').append(row);
            hitungTotal();
            clean();
            no++;
        }

        function hitungTotal() {
            let total = 0;
            $('.subTotal').each(function() {
                total += parseInt($(this).text())
            });

            $('#total').val(total);
        }

        function hapusRow(btn) {
            $(btn).closest('tr').remove();
            hitungTotal();
        }

        function clean() {
            $('#id_barang').val('');
            $('#nama_barang').val('');
            $('#harga').val('');
            $('#jumlah_beli').val('');
            $('#sub_total').val('');
            $('#jenis').val('');
            $('#stok').val('');
            $('#tgl_expired').val('');
            $('#kode_barang').val('');
        }

        function kembalian() {
            bayar = document.getElementById('bayar').value;
            total = document.getElementById('total').value;
            kembali = bayar - total;
            document.getElementById('kembali').value = kembali;
        }
    </script>
@endpush
