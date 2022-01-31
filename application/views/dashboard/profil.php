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
            <div class="col-lg-3 col-sm-3 col-md-3">
                <?php include('menu.php'); ?>
            </div>
            <div class="col-lg-9 col-sm-9 col-md-9">
                <h1><?= $title; ?></h1>
                <?=
                $this->session->flashdata('sukses');
                ?>

                <?= validation_errors('<div class="alert alert-warning">', '</div>') ?>
                <form action="<?= base_url('dashboard/profile'); ?>" class="leave-comment" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th><input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="nama" value="<?= $pelanggan['nama_pelanggan']; ?>" required></th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?= $pelanggan['email']; ?>" required readonly></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?= set_value('password'); ?>">
                                    <span class="text-danger">ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><input type="text" name="telepon" id="telepon" class="form-control" placeholder="telepon" value="<?= $pelanggan['telepon']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td><input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="kelurahan" value="<?= $pelanggan['kelurahan']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td><input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="kecamatan" value="<?= $pelanggan['kecamatan']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td><input type="text" name="kota" id="kota" class="form-control" placeholder="kota" value="<?= $pelanggan['kota']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td><input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="kode pos" value="<?= $pelanggan['kode_pos']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Detail Alamat</td>
                                <td><textarea type="textarea" name="alamat" id="alamat" class="form-control" placeholder="alamat" required><?= $pelanggan['alamat']; ?></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fa fa-save"></i> Update
                                    </button>
                                    <button type="reset" class="btn btn-default btn-lg">
                                        <i class="fa fa-times"></i> Reset
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->