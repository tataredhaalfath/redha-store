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
            <div class="col-lg-3 col-sm-3 col-md-3">
                <?php include('menu.php'); ?>
            </div>
            <div class="col-lg-9 col-sm-9 col-md-9">
                <h1><?= $title; ?></h1>
                <small>Berikut detail belanja anda : </small>
                <!-- kalau ada transaksi tampilkan -->
                <?php if ($header_transaksi) : ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
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
                                <tr>
                                    <td>Bukti Bayar</td>
                                    <td><?php if ($header_transaksi['bukti_bayar'] != '') { ?><img src="<?= base_url('assets/upload/image/' . $header_transaksi['bukti_bayar']); ?>" class="img img-thumbnail" width="200"></td>
                                <?php } else {
                                            echo 'Belum ada bukti bayar';
                                        } ?>
                                </tr>
                            </tbody>
                        </table>

                        <?php
                        //error upload
                        if (isset($error)) {
                            echo '<p class="alert alert-warning">' . $error . '</p>';
                        }

                        //notifikasi error 
                        echo validation_errors('<p class="alert alert-warning">', '</p>');
                        echo $this->session->flashdata('confirm');

                        ?>
                        <form action="<?= base_url('dashboard/konfirmasi/' . $header_transaksi['kode_transaksi']) ?>" method="POST" enctype="multipart/form-data">


                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td width="30%">Pembayaran ke rekening</td>

                                        <td>
                                            <select name="id_rekening" id="id_rekening" class="form-control">
                                                <?php foreach ($rekening as $rekening) : ?>
                                                    <option value="<?= $rekening['id_rekening']; ?>" <?php if ($header_transaksi['id_rekening'] == $rekening['id_rekening']) {
                                                                                                            echo "selected";
                                                                                                        } ?>> <?= $rekening['nama_bank']; ?> ( No. <?= $rekening['nomor_rekening']; ?> a.n <?= $rekening['nama_pemilik']; ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <td>
                                            <input type="text" name="tanggal_bayar" id="tanggal_bayar" class="form-control-md" placeholder="dd-mm-yyyy" value=" <?php if (isset($_POST['tanggal_bayar'])) {
                                                                                                                                                                    echo set_value('tanggal_bayar');
                                                                                                                                                                } elseif ($header_transaksi['tanggal_bayar'] != "") {
                                                                                                                                                                    echo $header_transaksi['tanggal_bayar'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo date('d-m-Y');
                                                                                                                                                                } ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pembayaran</td>
                                        <td>
                                            <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control-md" placeholder="jumlah pembayaran" value="<?php if (isset($_POST['jumlah_bayar'])) {
                                                                                                                                                                            echo set_value('jumlah_bayar');
                                                                                                                                                                        } elseif ($header_transaksi['jumlah_bayar'] != "") {
                                                                                                                                                                            echo $header_transaksi['jumlah_bayar'];
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $header_transaksi['jumlah_transaksi'];
                                                                                                                                                                        }  ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dari Bank</td>
                                        <td>
                                            <input type="text" name="nama_bank" class="form-control-md" value="<?= $header_transaksi['nama_bank']; ?>" placeholder="Nama Bank">
                                            <br><small>Misal : BANK BCA</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dari Nomor Rekening</td>
                                        <td>
                                            <input type="text" name="rekening_pembayaran" class="form-control-md" value="<?= $header_transaksi['rekening_pembayaran']; ?>" placeholder="Nomor Rekening">
                                            <br><small>Misal : 24242424</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemilik rekening</td>
                                        <td>
                                            <input type="text" name="rekening_pelanggan" class="form-control-md" value="<?= $header_transaksi['rekening_pelanggan']; ?>" placeholder="Nama Pemilik Rekening">
                                            <br><small>Misal : Andi</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Upload Bukti Bayar</td>
                                        <td>
                                            <input type="file" name="bukti_bayar" class="form-control-md" placeholder="Upload Bukti Pembayaran">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-md" type="submit" name="submit">
                                                    <i class="fa fa-upload"></i> Submit
                                                </button>&nbsp;
                                                <button class="btn btn-info btn-md" type="reset" name="reset">
                                                    <i class="fa fa-times"></i> Reset
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    </form>
                <?php

                else : ?>
                    <!-- kalau  tidak ada tampilkan notifikasi -->
                    <p class="alert alert-success"> <i class="fa fa-warning"></i> Belum ada data transaksi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->