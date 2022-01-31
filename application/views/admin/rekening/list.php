<p>
    <a href="<?= base_url('admin/rekening/tambah'); ?>" class="btn btn-success btn-lg">
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

<table class="table table-border" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>NAMA BANK</th>
            <th>NOMOR REKENING</th>
            <th>PEMILIK</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($rekening as $rekening) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $rekening['nama_bank']; ?></td>
                <td><?= $rekening['nomor_rekening']; ?></td>
                <td><?= $rekening['nama_pemilik']; ?></td>

                <td>
                    <a href="<?= base_url('admin/rekening/edit/') . $rekening['id_rekening']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit">Edit</i></a>
                    <a href="<?= base_url('admin/rekening/delete/') . $rekening['id_rekening']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus ? ')"><i class="fa fa-trash-o">Hapus</i></a>
                </td>

            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>

</table>