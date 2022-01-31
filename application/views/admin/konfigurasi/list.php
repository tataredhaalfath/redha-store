<div class="row">
    <div class="col-md-5 col-lg-5 col-sm-5">
        <!-- notifikasi -->
        <?php if ($this->session->flashdata('sukses')) : ?>

            <?= $this->session->flashdata('sukses'); ?>

        <?php endif; ?>
        <?php
        if (isset($error)) {
            echo '<p class="alert alert-warning">';
            echo $error;
            echo '</p>';
        }        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/konfigurasi'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="namaweb" class="col-sm-3 col-form-label">Nama Website</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="namaweb" name="namaweb" value="<?= $konfigurasi['namaweb']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tagline" class="col-sm-3 col-form-label">Tagline</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="tagline" name="tagline" value="<?= $konfigurasi['tagline']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-md-8 col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $konfigurasi['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-sm-3 col-form-label">Website</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="website" name="website" value="<?= $konfigurasi['website']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $konfigurasi['telepon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $konfigurasi['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="facebook" class="col-sm-3 col-form-label">Alamat Facebook</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $konfigurasi['facebook']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="instagram" class="col-sm-3 col-form-label">Alamat Instagram</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $konfigurasi['instagram']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="keyword" class="col-sm-3 col-form-label">Keyword</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="keyword" name="keyword" value="<?= $konfigurasi['keyword']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="metatext" class="col-sm-3 col-form-label">Metatext</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="metatext" name="metatext" value="<?= $konfigurasi['metatext']; ?> ">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Website</label>
                <div class="col-md-8 col-sm-9">
                    <input class="form-control" id="deskripsi" name="deskripsi" value="<?= $konfigurasi['deskripsi']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="rekening_pembayaran" class="col-sm-3 col-form-label">Rekening Pembayaran</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="rekening_pembayaran" name="rekening_pembayaran" value="<?= $konfigurasi['rekening_pembayaran']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <button class="btn btn-success btn-lg" name="submit" type="submit">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                    <button class="btn btn-info btn-lg" name="reset" type="reset">
                        <i class="fa fa-times"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>