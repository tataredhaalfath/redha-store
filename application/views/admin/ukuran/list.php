<p>
    <a href="<?= base_url('admin/ukuran/tambah'); ?>" class="btn btn-success btn-lg">
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
    <table class="table table-border table-hover" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>SLUG</th>
                <th>URUTAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($ukuran as $ukuran) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $ukuran['nama_ukuran']; ?></td>
                    <td><?= $ukuran['slug_ukuran']; ?></td>
                    <td><?= $ukuran['urutan']; ?></td>

                    <td>
                        <a href="<?= base_url('admin/ukuran/edit/') . $ukuran['id_ukuran']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit">Edit</i></a>
                        <a href="<?= base_url('admin/ukuran/delete/') . $ukuran['id_ukuran']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus ? ')"><i class="fa fa-trash-o">Hapus</i></a>
                    </td>

                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>