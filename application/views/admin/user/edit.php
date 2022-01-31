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
        <form action="<?= base_url('admin/user/edit/') . $user['id_user']; ?>" method="POST">
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
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>" required>
                    <small id="emailHelp" class="form-text text-muted">Password terenkripsi</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="akses_level" class="col-sm-2 col-form-label">Akses Level</label>

                <div class="col-md-5">
                    <select name="akses_level" id="akses_level" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User" <?php if ($user['akses_level'] == "User") {
                                                    echo "selected";
                                                } ?>>User</option>
                    </select>
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