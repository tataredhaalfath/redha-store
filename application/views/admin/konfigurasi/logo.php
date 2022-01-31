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
        <form action="<?= base_url('admin/konfigurasi/logo'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="namaweb" class="col-sm-3 col-form-label">Nama Website</label>
                <div class="col-md-8 col-sm-9">
                    <input type="text" class="form-control" id="namaweb" name="namaweb" value="<?= $konfigurasi['namaweb']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="logo" class="col-sm-3 col-form-label">Upload Logo Baru</label>
                <div class="col-md-3 col-sm-5">
                    <input type="file" class="form-control" id="logo" name="logo" value=" <?= $konfigurasi['logo']; ?>">
                    Logo lama : <br> <img src="<?= base_url('assets/upload/image/' . $konfigurasi['logo']); ?>" class="img img-responsive img-thumbnail" alt="logo" width="200">
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