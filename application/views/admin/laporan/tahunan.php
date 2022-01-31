<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-shopping-cart"></i> <?= $title; ?>
                <small class="pull-right">Tahun : <?= $tahun ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $grand_total = 0;
                    foreach ($laporan as $laporan) :
                        $grand_total = $grand_total + $laporan['total_harga']; ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $laporan['kode_transaksi']; ?></td>
                            <td><?= date('d-m-Y', strtotime($laporan['tanggal_transaksi'])); ?></td>
                            <td><?= $laporan['nama_produk']; ?></td>
                            <td><?= $laporan['harga']; ?></td>
                            <td><?= $laporan['jumlah']; ?></td>
                            <td> <?= number_format($laporan['total_harga'], '0', ',', '.'); ?> </td>

                        </tr>
                    <?php $i++;

                    endforeach; ?>
                </tbody>
            </table>
            <h5>Grand Total : Rp. <?= number_format($grand_total, '0', ',', '.'); ?></h5>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <button target="_blank" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</section>