<div class="row">
    <div class="col-lg-4">
        <?php
        if (isset($error)) {
            echo '<h5 class="alert alert-warning">';
            echo $error;
            echo '</h5>';
        }
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/user/editprofile/') . $user['id_user']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pengguna</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email Pengguna</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/upload/profile/') . $user['gambar'] ?>" class="img-thumbnail" alt="">
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