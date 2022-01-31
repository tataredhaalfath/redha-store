<!-- Features -->
<section class="features bg-light p-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3>Special Eid</h3>
                <p>Promo pakaian cocok untuk lebaran</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($produk as $produk) : ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?= base_url('assets/upload/image/') . $produk['gambar']; ?>" class="figure-img img-fluid" alt="<?= $produk['nama_produk']; ?>">
                            <a href="<?= base_url('produk/detail/') . $produk['slug_produk']; ?>" class="d-flex justify-content-center" style="text-decoration:none;">
                                <p class="align-self-center text-center" style="width:120px; height:20px; background-color: rgba(0, 0, 0, 0.7); color:white;">Quick Review</p>
                            </a>
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5><?php $namep = $produk['nama_produk'];
                                $namep = explode(' ', $namep);
                                echo $namep[0];
                                echo " ";
                                if (isset($namep[1])) {
                                    echo $namep[1];
                                } ?></h5>
                            <p class="text-muted">Rp. <?= number_format($produk['harga'], '0', '', '.') ?></p>
                        </figcaption>
                    </figure>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- ahir Features -->