<p>
    <a href="<?= base_url('admin/user/tambah'); ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p>
<!-- notifikasi -->
<?php if ($this->session->flashdata('sukses')) : ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('sukses'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="box box-info">
    <div class="box-header">
    </div>
    <div class="box-body">
        <table class="table table-border table-hover" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $user) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['akses_level']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/user/edit/') . $user['id_user']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit">Edit</i></a>
                            <a href="<?= base_url('admin/user/delete/') . $user['id_user']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus ? ')"><i class="fa fa-trash-o">Hapus</i></a>
                        </td>

                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>