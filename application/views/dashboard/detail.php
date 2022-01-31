<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome <?= $this->session->userdata('nama_pelanggan'); ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard/detail'); ?>">Dashboard / </a><?= $title; ?></li>

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
                <small>Berikut detail belanja anda : </small>
                <!-- kalau ada transaksi tampilkan -->
                <?php if ($header_transaksi) : ?>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="20%">KODE TRANSAKSI</th>
                                    <th><?= $header_transaksi['kode_transaksi']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])); ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Transaksi</td>
                                    <td>Rp. <?= number_format($header_transaksi['jumlah_transaksi'] - $header_transaksi['kurir'], '0', ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Biaya Kurir</td>
                                    <td>Rp. <?= number_format($header_transaksi['kurir'], '0', ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total</td>
                                    <td style="font-weight:bold;">Rp. <?= number_format($header_transaksi['jumlah_transaksi'], '0', ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Status Bayar</td>
                                    <td><?= $header_transaksi['status_bayar']; ?></td>
                                </tr>
                            </tbody>

                        </table>
                        <table class="table  table-hover table-bordered text-center">
                            <thead>
                                <tr class="table-active">
                                    <th>NO</th>
                                    <th>KODE PRODUK</th>
                                    <th>NAMA PRODUK</th>
                                    <th>UKURAN</th>
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
                                        <td><?= $transaksi['nama_ukuran']; ?></td>
                                        <td> <?= number_format($transaksi['jumlah']); ?></td>
                                        <td>Rp. <?= number_format($transaksi['harga'], '0', ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($transaksi['total_harga'], '0', ',', '.'); ?></td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <p class="alert alert-success"> <i class="fa fa-warning"></i> Belum ada data transaksi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->