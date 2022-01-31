<div class="row">
    <div class="col-lg-4">
        <?php
        if (isset($error)) {
            echo '<p class="alert alert-warning">';
            echo $error;
            echo '</p>';
        }
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/produk/gambar/' . $produk['id_produk']); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="judul_gambar" class="col-sm-2 col-form-label">Judul Gambar</label>
                <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control" id="judul_gambar" name="judul_gambar" value=" <?= set_value('judul_gambar'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Unggal Gambar</label>
                <div class="col-md-2 col-sm-5">
                    <input type="file" class="form-control" id="gambar" name="gambar" value=" <?= set_value('gambar'); ?>" required>
                </div>

                <div class="col-md-5 col-sm-5 ">
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
                    <th>GAMBAR</th>
                    <th>JUDUL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <img src="<?= base_url('assets/upload/image/thumbs/' . $produk['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                    </td>
                    <td><?= $produk['nama_produk']; ?></td>
                    <td></td>
                </tr>
                <?php $no = 2;
                foreach ($gambar as $gambar) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <img src="<?= base_url('assets/upload/image/thumbs/' . $gambar['gambar']); ?>" alt="" class="img img-responsive img-thumbnail" width="60">
                        </td>
                        <td><?= $gambar['judul_gambar']; ?></td>

                        <td>
                            <a href="<?= base_url('admin/produk/delete_gambar/') . $gambar['id_produk'] . '/' . $gambar['id_gambar']; ?>" class="btn btn-danger btn-xs " onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash-o">Hapus</i></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>