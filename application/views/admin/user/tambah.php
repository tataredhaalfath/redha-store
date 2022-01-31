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
        <form action="<?= base_url('admin/user/tambah'); ?>" method="POST">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pengguna</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email Pengguna</label>
                <div class="col-md-5">
                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-md-5">
                    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Level Hak Akses" class="col-sm-2 col-form-label">Akses Level</label>
                <div class="col-md-5">
                    <select name="akses_level" id="akses_level" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
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