<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome <?= $this->session->userdata('nama_pelanggan'); ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard / </a><?= $title; ?></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-md-4">
                <?php include('menu.php'); ?>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8">
                <h1><?= $title; ?></h1>
                <small>Berikut riwayat belanja anda : </small>
                <!-- kalau ada transaksi tampilkan -->
                <?php if ($header_transaksi) : ?>
                    <div class="table-responsive">
                        <table class="table  table-hover table-bordered text-center">
                            <thead>
                                <tr class="table-active">
                                    <th>NO</th>
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
                                        <td><?= $header_transaksi['kode_transaksi']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])); ?></td>
                                        <td>Rp. <?= number_format($header_transaksi['jumlah_transaksi'], '0', ',', '.'); ?></td>
                                        <td><?= $header_transaksi['total_item']; ?></td>

                                        <?php if ($header_transaksi['status_bayar'] == 'Konfirmasi') : ?>
                                            <td class="text-success">
                                                <?= $header_transaksi['status_bayar']; ?>
                                            </td>
                                        <?php else : ?>
                                            <td class="text-danger">
                                                <?= $header_transaksi['status_bayar']; ?>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <div class="button-group">
                                                <a href="<?= base_url('dashboard/detail/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                                <a href="<?= base_url('dashboard/konfirmasi/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-info btn-sm mt-1"><i class="fas fa-upload"></i> Bayar</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <p class="alert alert-success"> <i class="fas fa-exclamation-triangle"></i> Belum ada data transaksi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->