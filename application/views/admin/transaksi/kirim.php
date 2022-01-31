<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style type="text/scc" media="print">
        body{
            font-size : 12px;
            font-family: Arial, Helvetica, sans-serif;
        }
        table{
            border: solid thin #000;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1cm;
        }
        td{
            padding: 6px 12px;
            border: solid thin #000;
            text-align: left;
        }
        .bg-success{
            background-color: #f5f5f5;
            font-weight: bold;
            border: solid thin #000;
        }
    </style>
</head>

<body>
    <div style=" width:19cm; height:27cm; padding-top:1cm;">
        <h1 style="text-align:center; font-size:18px; font-weight:bold; padding-top:20px;  border-top: solid thin #EEE;">PENGIRIMAN</h1>
        <table>

            <tr>
                <td>
                    <strong> PENGIRIM : </strong>
                    <p>
                        <?= $site["namaweb"]; ?>
                        <br>Alamat : <?= $site["alamat"]; ?>
                        <br>Telepon : <?= $site["telepon"]; ?>
                    </p>
                </td>
                <td>
                    <strong> PENERIMA : </strong>
                    <p>
                        <?= $header_transaksi["nama_penerima"] ?>
                        <br>Alamat : <?= $header_transaksi['kelurahan']; ?>, <?= $header_transaksi['kecamatan']; ?>, <?= $header_transaksi['kota']; ?>, pos : <?= $header_transaksi['kode_pos']; ?>
                        <br>Alamat Spesifik : <?= $header_transaksi["alamat"]; ?>
                        <br>Telepon : <?= $header_transaksi["telepon"]; ?>
                    </p>
                </td>
            </tr>
        </table>

        <h2 style="font-weight: bold; text-align:center;">Data Pembelian</h2>
        <table class="table  table-hover table-bordered text-center">
            <thead>
                <tr class="bg-success">
                    <th>NO</th>
                    <th>KODE PRODUK</th>
                    <th>NAMA PRODUK</th>
                    <th>JUMLAH </th>
                    <th>HARGA</th>
                    <th>SUB TOTAL</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $transaksi) : ?>
                    <tr>
                        <td><?= $i; ?> </td>
                        <td><?= $transaksi['kode_produk']; ?></td>
                        <td><?= $transaksi['nama_produk']; ?></td>
                        <td><?= number_format($transaksi['jumlah']); ?></td>
                        <td>Rp. <?= number_format($transaksi['harga'], '0', ',', '.'); ?></td>
                        <td>Rp. <?= number_format($transaksi['total_harga'], '0', ',', '.'); ?></td>

                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>