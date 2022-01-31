<div class="row">
    <div class="col-lg-4">
        <?php
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/kategori/tambah'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="nama kategori" value=" <?= set_value('nama_kategori'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="urutan" class="col-sm-2 col-form-label">Urutan Kategori</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" id="urutan" name="urutan" placeholder="urutan" value=" <?= set_value('urutan'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar kategori</label>
                <div class="col-md-5 col-sm-5">
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
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