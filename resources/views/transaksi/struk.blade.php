<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: consolas;
        }

        .struk {
            background-color: white;
            padding: 20px;
            width: 320px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .struk h1 {
            font-size: 1.25rem;
            font-weight: bold;
            text-align: center;
            margin: 0;

        }

        .struk p {
            font-size: 0.875rem;
            text-align: center;
            margin: 0;
        }

        .struk .item {
            display: flex;
            justify-content: space-between;
            font-size: 0.875;
            margin-block: 5px;
        }

        .struk .total {
            font-weight: bold;
        }

        .struk .footer {
            text-align: center;
            font-size: 0.75;
            margin-top: 10px;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>

<body>
    <div class="struk">
        <p>Struk Belanja</p>
        <p>Jl. Maju Terus Belok Kanan No 23</p>
        <p>{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y H.i') }} $nbsp
            {{ $transaksi->pengguna->id_pengguna }} / {{ $transaksi->pengguna->nama }}</p>
        <div>======================================</div>
        <table width="100%">
            <tr>
                <td align="left">{{ $transaksi->kode_transaksi }}</td>
                <td align="right">{{ $transaksi->pelanggan->nama }}</td>
            </tr>
        </table>
        <div>======================================</div>
        <table width="100%">
            <thead>
                <tr>
                    <td align="left">Barang</td>
                    <td align="center">Qty</td>
                    <td align="right">Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_transaksi as $item)
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td align="center">{{ $item->jumlah_beli }}</td>
                    <td align="right">{{ number_format($item->sub_total, 0, ',', '.') }}</td>
                @endforeach
            </tbody>
        </table>
        <div>======================================</div>
        <table width="100%">
            <tr>
                <td align="left">Total</td>
                <td align="right">{{ number_format($transaksi->total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td align="left">Bayar</td>
                <td align="right">{{ number_format($transaksi->bayar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td align="left">Kembali</td>
                <td align="right">{{ number_format($transaksi->kembali, 0, ',', '.') }}</td>
            </tr>
        </table>
        <div>======================================</div>
        <div class="footer">
            <p>Barang yang sudah di beli tidak dapat di kembalikan</p>
            <p>Terima kasih atas kunjungannya</p>
        </div>
    </div>
</body>

</html>
