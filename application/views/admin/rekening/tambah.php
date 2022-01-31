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
        <form action="<?= base_url('admin/rekening/tambah'); ?>" method="POST">
            <div class="form-group row">
                <label for="nama_bank" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Nama Bank</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="nama_bank" value=" <?= set_value('nama_bank'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nomor_rekening" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Nomor Rekening</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="nomor rekening" value=" <?= set_value('nomor_rekening'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pemilik" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Nama Pemilik Rekening</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="nama pemilik rekening" value=" <?= set_value('nama_pemilik'); ?>" required>
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