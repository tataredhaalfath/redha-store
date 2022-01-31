<p>
    <a href="<?= base_url('admin/produk/tambah'); ?>" class="btn btn-success btn-lg">
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
                    <th>GAMBAR</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($produk as $produk) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <img src="<?= base_url('assets/upload/image/thumbs/' . $produk['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                        </td>
                        <td><?= $produk['nama_produk']; ?>
                            <small>
                                <br>Stok : <?= number_format($produk['stok'], '0', '', '.'); ?>
                                <br>Stok Minimal : <?= number_format($produk['stok_minimal'], '0', '', '.'); ?>
                            </small>
                        </td>
                        <td><?= $produk['nama_kategori']; ?></td>
                        <td>Harga Jual : <?= number_format($produk['harga'], '0', '', '.'); ?>
                            <small>
                                <br>Harga Beli : <?= number_format($produk['harga_beli'], '0', '', '.'); ?>
                                <br>Harga Diskon : <?= number_format($produk['harga_diskon'], '0', '', '.'); ?>
                                <br>Periode Diskon ; <?= date('d M-Y', strtotime($produk['tanggal_mulai_diskon'])); ?> s.d. <?= date('d M-Y', strtotime($produk['tanggal_selesai_diskon'])); ?>
                            </small>
                        </td>
                        <td><?= $produk['status_produk']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/produk/gambar/') . $produk['id_produk']; ?>" class="btn btn-success btn-xs"><i class="fa fa-image">Gambar(<?= $produk['total_gambar']; ?>)</i></a>
                            <a href="<?= base_url('admin/produk/edit/') . $produk['id_produk']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit">Edit</i></a>
                            <?php include('delete.php'); ?>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>