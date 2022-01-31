<div class="row">
    <div class="col-lg-4">
        <?php
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        //password lama tidak sesuai
        echo $this->session->flashdata('gagal');

        ?>

    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/user/editpass/') . $user['id_user']; ?>" method="POST">
            <div class="form-group row">
                <label for="passlama" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" id="passlama" name="passlama">
                </div>
            </div>
            <div class="form-group row">
                <label for="passbaru" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" id="passbaru" name="passbaru">
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmpass" class="col-sm-2 col-form-label">Password Konfirmasi</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" id="confirmpass" name="confirmpass">
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