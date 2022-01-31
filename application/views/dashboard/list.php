<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome <?= $this->session->userdata('nama_pelanggan'); ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><?= $title; ?></a></li>

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
            <div class="col-lg-2 col-sm-2 col-md-2">

                <?php include('menu.php'); ?>

            </div>
            <div class="col-lg-10 col-sm-10 col-md-10">

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
                                    <th>EKSPEDISI / RESI</th>

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
                                            <?php if ($header_transaksi['ekspedisi'] == "" && $header_transaksi['resi'] == "" && $header_transaksi['status_bayar'] == "Konfirmasi") : ?>
                                                <small> Pesanan Sedang Di Proses </small>
                                            <?php elseif ($header_transaksi['ekspedisi'] == "" && $header_transaksi['resi'] == "" && $header_transaksi['status_bayar'] == "Belum") : ?>
                                                <small> Segera Lakukan Pembayaran </small>
                                            <?php else : ?>
                                                <small><?= $header_transaksi['ekspedisi']; ?> </small> <br>
                                                <small>no.resi : <?= $header_transaksi['resi']; ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <!-- <td>
                                            <div class="button-group">
                                                <a href="<?= base_url('dashboard/detail/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-success btn-sm "><i class="fas fa-eye"></i> Detail</a>
                                                <a href="<?= base_url('dashboard/konfirmasi/' . $header_transaksi['kode_transaksi']); ?>" class="btn btn-info btn-sm mt-1"><i class="fas fa-upload"></i>Bayar</a>
                                            </div>
                                        </td> -->

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <?=
                    $this->session->flashdata('sukses');
                    ?>
                    <p class="alert alert-success"> <i class="fas fa-exclamation-triangle"></i> Belum ada data transaksi</p>
                <?php endif; ?>



            </div>

        </div>
    </div>
</div>
<!-- End Cart -->