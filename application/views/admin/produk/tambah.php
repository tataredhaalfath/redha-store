<div class="row">
    <div class="col-lg-4">
        <?php
        if (isset($error)) {
            echo '<h5 class="alert alert-warning">';
            echo $error;
            echo '</h5>';
        }        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?= base_url('admin/produk/tambah'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= set_value('nama_produk'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_produk" class="col-sm-2 col-form-label">Kode Produk</label>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= set_value('kode_produk'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
                <div class="col-md-5 col-sm-5">
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <?php foreach ($kategori as $kategori) : ?>
                            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-md-3 col-sm-3">
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>" required>
                    <small class="text-success">Harga Jual</small>
                </div>
                <div class="col-md-3 col-sm-3">
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= set_value('harga_beli'); ?>" required>
                    <small class="text-success">Harga Beli</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Diskon</label>
                <div class="col-md-2 col-sm-2">
                    <input type="number" class="form-control" id="harga_diskon" name="harga_diskon" value="<?= set_value('harga_diskon'); ?>" required>
                    <small class="text-success">Harga Diskon</small>
                </div>
                <div class="col-md-2 col-sm-2">
                    <input type="text" class="form-control reservation" id="tanggal_mulai_diskon" name="tanggal_mulai_diskon" value="<?php echo set_value('tanggal_mulai_diskon'); ?>" placeholder="dd-mm-yyyy" required>
                    <small class="text-success">Tanggal Diskon</small>
                </div>
                <div class="col-md-2 col-sm-2">
                    <input type="text" class="form-control reservation" id="tanggal_selesai_diskon" name="tanggal_selesai_diskon" value="<?= set_value('tanggal_selesai_diskon'); ?>" placeholder="dd-mm-yyyy" required>
                    <small class="text-success">Tanggal Selesai Diskon</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran 1</label>
                <div class="col-md-3 col-sm-5">
                    <select name="id_ukuran1" id="id_ukuran1" class="form-control">
                        <?php foreach ($ukuran1 as $ukuran1) : ?>
                            <option value="<?= $ukuran1['id_ukuran']; ?>"><?= $ukuran1['nama_ukuran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="stok" class="col-sm-2 col-md-1 col-form-label">Stok 1</label>
                <div class="col-md-2 col-sm-2">
                    <input type="number" class="form-control" id="stok1" name="stok1" value=" <?= set_value('stok1'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran 2</label>
                <div class="col-md-3 col-sm-5">
                    <select name="id_ukuran2" id="id_ukuran2" class="form-control">
                        <?php foreach ($ukuran2 as $ukuran2) : ?>
                            <option value="<?= $ukuran2['id_ukuran']; ?>"><?= $ukuran2['nama_ukuran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="stok" class="col-sm-2 col-md-1 col-form-label">Stok 2</label>
                <div class="col-md-2 col-sm-2">
                    <input type="number" class="form-control" id="stok2" name="stok2" value=" <?= set_value('stok2'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="ukuran" class="col-sm-2 col-form-label">Ukuran 3</label>
                <div class="col-md-3 col-sm-5">
                    <select name="id_ukuran3" id="id_ukuran3" class="form-control">
                        <?php foreach ($ukuran3 as $ukuran3) : ?>
                            <option value="<?= $ukuran3['id_ukuran']; ?>"><?= $ukuran3['nama_ukuran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="stok" class="col-sm-2 col-md-1 col-form-label">Stok 3</label>
                <div class="col-md-2 col-sm-2">
                    <input type="number" class="form-control" id="stok3" name="stok3" value=" <?= set_value('stok3'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-label">Stok Minimal</label>
                <div class="col-md-5 col-sm-5">
                    <input type="number" class="form-control" id="stok_minimal" name="stok_minimal" value=" <?= set_value('stok_minimal'); ?>" required>
                    <small class="text-warning">Stok Minimal</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-sm-2 col-form-label">Berat <small>(kg)</small></label>
                <div class="col-md-5 col-sm-5">
                    <input type="text" class="form-control" id="berat" name="berat" value=" <?= set_value('berat'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-sm-2 col-form-label">Ukuran Kemasan</label>
                <div class="col-md-2 col-sm-3 col-3">
                    <input type="number" class="form-control" id="ukurank1" name="ukurank1" value=" <?php echo set_value('ukurank1'); ?>" placeholder="Tinggi" required>
                </div>
                <div class="col-md-2 col-sm-3 col-3">
                    <input type="number" class="form-control" id="ukurank2" name="ukurank2" value=" <?php echo set_value('ukurank2'); ?>" placeholder="Panjang" required>
                </div>
                <div class="col-md-2 col-sm-3 col-3">
                    <input type="number" class="form-control" id="ukurank3" name="ukurank3" value=" <?php echo set_value('ukurank3'); ?>" placeholder="Lebar" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-md-8 col-sm-8">
                    <textarea class="form-control" id="editor" name="keterangan" value=" <?= set_value('keterangan'); ?>" required>
                         <?= set_value('keterangan'); ?> 
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="keyword" class="col-sm-2 col-form-label">Keyword</label>
                <div class="col-md-8 col-sm-8">
                    <input type="text" class="form-control" id="keyword" name="keyword" value=" <?= set_value('keyword'); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar Produk</label>
                <div class="col-md-2 col-sm-5">
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="status_produk" class="col-sm-2 col-form-label">Status Produk</label>
                <div class="col-md-2 col-sm-5">
                    <select name="status_produk" id="status_produk" class="form-control">
                        <option value="Publish">Publikasikan</option>
                        <option value="Draft">Simpan Sebagai Draft</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5 col-sm-5">
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