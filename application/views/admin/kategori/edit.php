<div class="row">
    <div class="col-lg-4">
        <?php
        if (isset($error)) :  ?>
            <h5 class="alert alert-warning">
                <?= $error; ?>
            </h5>

        <?php endif; ?>
        <?php
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/kategori/edit/') . $kategori['id_kategori']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama_kategoiri" name="nama_kategori" placeholder="nama kategori" value="<?php echo $kategori['nama_kategori']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="urutan" class="col-sm-2 col-form-label">Urutan</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" id="urutan" name="urutan" placeholder="urutan" required value="<?php echo $kategori['urutan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/upload/kategori/') . $kategori['gambar'] ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            </div>
                        </div>
                    </div>
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