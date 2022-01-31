<!-- breadcrumb -->
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item "><a href="<?= base_url('produk'); ?>">Produk</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('produk/kategori/') . $produk['slug_kategori']; ?>"><?= $produk['nama_kategori']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $produk['nama_produk']; ?></li>
        </ol>
    </nav>
</div>
<!-- ahir breadcrumb -->

<!-- product single -->
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <form action="<?= base_url('belanja/add'); ?>" method="POST">
                    <?php
                    //element yang dibawa
                    echo form_hidden('id', $produk['id_produk']);
                    echo form_hidden('price', $produk['harga']);
                    echo form_hidden('name', $produk['nama_produk']);
                    echo form_hidden('berat', $produk['berat']);
                    //element redirect
                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>
                    <figure class="figure">
                        <img src="<?= base_url('assets/upload/image/') . $produk['gambar']; ?>" class="figure-img img-fluid" height="800" width="750">
                        <!-- <figcaption class="figure-caption product-thumbnail-container d-flex justify-content-between">
                            <a href="">
                                <img src="img/single/thumbnail/1.png" width="100">
                            </a>
                            <a href="">
                                <img src="img/single/thumbnail/2.png" width="100">
                            </a>
                            <a href="">
                                <img src="img/single/thumbnail/3.png" width="100">
                            </a>
                        </figcaption> -->
                    </figure>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <h3><?= $produk['nama_produk']; ?></h3>
                <p class="text-muted">Rp. <?= number_format($produk['harga'], '0', ',', '.') ?></p>
                <p class="text-muted">Stok : <?php $stok = $produk['stok'];
                                                echo $stok; ?></p>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-4 mx-0">
                        <p class="text-muted">Ukuran :</p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4 mx-0">
                        <select class="custom-select" name="ukuran" id="ukuran">
                            <?php foreach ($ukuran as $ukuran) : ?>
                                <?php if ($produk['id_ukuran1'] == $ukuran['id_ukuran']) : ?>
                                    <option value="<?= $produk['id_ukuran1'] ?>">
                                        <?= $ukuran['nama_ukuran']; ?>
                                    </option>
                                <?php elseif ($produk['id_ukuran2'] == $ukuran['id_ukuran']) : ?>
                                    <option value="<?= $produk['id_ukuran2'] ?>">
                                        <?= $ukuran['nama_ukuran']; ?>
                                    </option>
                                <?php elseif ($produk['id_ukuran3'] == $ukuran['id_ukuran']) : ?>
                                    <option value="<?= $produk['id_ukuran3'] ?>">
                                        <?= $ukuran['nama_ukuran']; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-12">
                        <button type="button" class="btn btn-sm" id="kurang" style="background-color: #EAEAEF; color: white;"><i class="fa fa-minus-circle"></i></button> &nbsp;
                        <input type="number" value="1" min="1" max="<?= $stok; ?>" id="hasil" name="qty" size="3">&nbsp;
                        <button type="button" class="btn btn-sm btn-success" id="tambah"><i class="fa fa-plus-circle"></i></button>
                    </div>

                </div>

                <div class="btn-product">
                    <div class="row">
                        <button type="submit" name="submit" value="submit" class="btn btn-block btn-warning text-white">Add to Cart</button>
                        <button type="submit" name="checkoutlangsung" value="submit" class="btn btn-block" style="background-color: #EAEAEF; color: #ADADAD;">Checkout</button>
                    </div>
                </div>
                <!-- <div class="designed-by">
                    <h5>Designer By</h5>
                    <div class="row">
                        <div class="col-3">
                            <img src="img/single/2.png" class="rounded-circle">
                        </div>
                        <div class="col">
                            <h4>Julia</h4>
                            <p>14.2K <span>Followes</span></p>
                        </div>
                    </div>
                </div> -->
            </div>
            </form>
        </div>
    </div>
</section>
<!-- ahir product single -->

<!-- product description & review -->
<section class="product-description p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Product Description</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                    </li> -->
                </ul>
                <div class="tab-content p-3" id="myTabContent">
                    <div class="tab-pane fade show active product-review" id="description" role="tabpanel" aria-labelledby="description-tab" style="color:black;">
                        <? echo $produk['keterangan']; ?>

                    </div>
                    <!-- <div class="tab-pane fade product-review" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/1.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>Stella</h5>
                                <p>Produk nya keren abis. bahan nya juga nyaman dipakai</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/2.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>George</h5>
                                <p>Istri saya suka dengan produk nya, next order lagi disini</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/1.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>Stella</h5>
                                <p>Produk nya keren abis. bahan nya juga nyaman dipakai</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/2.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>George</h5>
                                <p>Istri saya suka dengan produk nya, next order lagi disini</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/1.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>Stella</h5>
                                <p>Produk nya keren abis. bahan nya juga nyaman dipakai</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 d-none d-md-block">
                                <img src="img/single/review/2.png" class="rounded-circle" width="60">
                            </div>
                            <div class="col">
                                <h5>George</h5>
                                <p>Istri saya suka dengan produk nya, next order lagi disini</p>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product description & review -->

<!-- similar product -->
<section class="similar-product p-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3>Similar Product</h3>
                <p class="text-muted">Produk yang mungkin anda sukai</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($produk_related as $produk_related) : ?>
                <div class="col-sm-3">
                    <figure class="figure">
                        <a href="<?= base_url('produk/detail/') . $produk_related['slug_produk']; ?>">
                            <img src="<?= base_url('assets/upload/image/') . $produk_related['gambar']; ?>" class="figure-img img-fluid" width="350">
                        </a>
                        <figcaption class="figure-caption">
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url('produk/detail/') . $produk_related['slug_produk']; ?>" style=" color:black;">
                                        <h5><?php $related = $produk_related['nama_produk'];
                                            $related = explode(' ', $related);
                                            echo $related[0];
                                            echo " ";
                                            if (isset($related[1])) {
                                                echo $related[1];
                                            }
                                            ?></h5>

                                    </a>
                                </div>
                                <div class="col text-right d-flex justify-content-end">
                                    <p style="font-size: 18px;" class="text-muted">IDR. <?= number_format($produk_related['harga'], '0', ',', '.'); ?></p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- ahir similar product -->