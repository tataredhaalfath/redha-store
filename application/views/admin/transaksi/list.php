<div class="table-responsive box box-info ">
    <table class="table  table-hover table-bordered text-center">
        <thead>
            <tr class="table-active">
                <th>NO</th>
                <th>PELANGGAN</th>
                <th>KODE</th>
                <th>TANGGAL</th>
                <th>JUMLAH TOTAL</th>
                <th>JUMLAH ITEM</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($header_transaksi as $header_transaksi) : ?>
                <tr>
                    <td><?= $i; ?> </td>
                    <td><?= $header_transaksi['nama_pelanggan']; ?>
                        <br><small>
                            Penerima : <?= $header_transaksi['nama_penerima']; ?>
                            <br>Telepon : <?= $header_transaksi['telepon']; ?>
                            <br>Email : <?= $header_transaksi['email']; ?>
                            <br>Alamat Penerima : <?= $header_transaksi['kelurahan']; ?>, <?= $header_transaksi['kecamatan']; ?>, <?= $header_transaksi['kota']; ?>, pos : <?= $header_transaksi['kode_pos']; ?>
                            <br>Alamat Spesifik: <?= $header_transaksi['alamat']; ?>
                        </small>
                    </td>
                    <td><?= $header_transaksi['kode_transaksi']; ?></td>
                    <td><?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])); ?></td>
                    <td>Rp. <?= number_format($header_transaksi['jumlah_transaksi'], '0', ',', '.'); ?></td>
                    <td><?= $header_transaksi['total_item']; ?></td>
                    <?php if ($header_transaksi['status_bayar'] == 'Konfirmasi') : ?>
                        <td class="text-success"><?= $header_transaksi['status_bayar']; ?></td>
                    <?php else : ?>
                        <td class="text-danger"><?= $header_transaksi['status_bayar']; ?></td>
                    <?php endif; ?>

                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url('admin/transaksi/detail/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> Detail</i></a>
                            <a href="<?= base_url('admin/transaksi/cetak/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"> Cetak</i></a>
                            <a href="<?= base_url('admin/transaksi/status/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"> Status</i></a>
                        </div>
                        <div class="clear-fix"></div>
                        <br>
                        <div class="btn-group">
                            <a href="<?= base_url('admin/transaksi/pdf/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"> Unduh Pdf</i></a>
                            <a href="<?= base_url('admin/transaksi/kirim/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"> Pengiriman</i></a>
                            <!-- <a href="<?= base_url('admin/transaksi/word/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-file-word-o"> Word</i></a> -->
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>