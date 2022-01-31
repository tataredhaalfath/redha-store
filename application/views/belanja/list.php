<div class="container cart-header">
    <div class="row mt-5 text-center">
        <div class="col">
            <h3>Your Cart</h3>
            <p class="text-muted">Pastikan barang anda terbayar lunas</p>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pl-0 cart-breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $subtitle; ?></li>
        </ol>
    </nav>
</div>

<!-- ahir breadcrumb -->
<!-- notifikasi -->
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <?= $this->session->flashdata('success');
            ?>
        </div>
    </div>
</div>
<!-- ahir notigikasi -->
<!-- checkout -->
<section class="checkout">
    <div class="container">
        <div class="row justify-content-between" style="margin-bottom: 100px;">
            <div class="col-lg-6">
                <h4 class="mb-4">Your items</h4>
                <?php foreach ($keranjang as $keranjang) : ?>
                    <?php
                    $id_produk = $keranjang['id'];
                    $produk = $this->produk_model->detail($id_produk);
                    $ukuran = $this->db->get_where('ukuran', ['id_ukuran' => $keranjang['ukuran']])->row_array();
                    ?>
                    <form action="<?= base_url('belanja/update_cart/' . $keranjang['rowid']); ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col-2 col-md-2 thumbnail-img">
                                <img src="<?= base_url('assets/upload/image/thumbs/') . $produk['gambar']; ?>" class="img-fluid" width="80" height="80">
                            </div>
                            <div class="col-3 col-md-3 mx-0">
                                <h5 class="m-0"><?= $keranjang['name']; ?></h5>
                                <p class="m-0" style="color: #B7B7B7;">Size : <?= $ukuran['nama_ukuran']; ?></p>
                                <p class="m-0" style="color: #B7B7B7;">Rp. <?= number_format($keranjang['price'], '0', ',', '.'); ?></p>



                            </div>
                            <div class="col-5 col-md-5 text-left">
                                <button type="button" class="btn btn-sm" id="kurang" style="background-color: #EAEAEF; color: white;"><i class="fa fa-minus-circle"></i></button>
                                <input type="number" value="<?= $keranjang['qty']; ?>" min="1" max="20" id="hasil" name="qty" size="2">
                                <button type="button" class="btn btn-sm btn-success" id="tambah"><i class="fa fa-plus-circle"></i></button>
                            </div>
                            <div class="col-1 col-md-1 mt-1 text-left">
                                <button type="submit" name="update" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            </div>
                            <div class="col-1 col-md-1 mt-1 text-left">
                                <a href="<?= base_url('belanja/hapus/' . $keranjang['rowid']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Items?');"><i class="fas fa-times-circle"></i></a>
                                <?php //include('delete_peritem.php'); 
                                ?>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>


            </div>
            <div class="col-lg-5">
                <div class="card rounded-0 checkout-detail">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Biaya</h5>
                        <?php foreach ($detailkeranjang as $keranjang) : ?>
                            <?php
                            $id_produk = $keranjang['id'];
                            $produk = $this->produk_model->detail($id_produk);
                            $ukuran = $this->db->get_where('ukuran', ['id_ukuran' => $keranjang['ukuran']])->row_array();
                            ?>
                            <div class="row mb-3">
                                <div class="col">
                                    <h6 class="m-0"><?= $keranjang['name']; ?></h6>
                                    <small style="color: #B7B7B7;"><?= $keranjang['qty']; ?> Items</small>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <h6 class="m-0 align-self-center text-success">Rp. <?= number_format($keranjang['subtotal'], '0', ',', '.'); ?></h6>

                                </div>
                            </div>
                        <?php endforeach; ?>


                        <hr>
                        <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Sub Total</h6>
                                <!-- <small style="color: #B7B7B7;">5% Off</small> -->
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 class="m-0 align-self-center text-success">Rp. <?= number_format($this->cart->total(), '0', ',', '.') ?></h6>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Ied Promo</h6>
                                <small style="color: #B7B7B7;">5% Off</small>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <?php
                                $total = $this->cart->total();
                                $diskon = $total / 20;
                                $totalahir = $total - $diskon;
                                ?>
                                <h6 class="m-0 align-self-center text-danger">-Rp. <?= number_format($diskon, '0', ',', '.') ?></h6>
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 class="m-0 align-self-center text-primary">Rp. <?= number_format($this->cart->total(), '0', ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <!-- <button type="button" class="btn btn-block" style="background-color: #ce4202; color: white;"><i class="fa fa-trash"></i>
                            Clear</button> -->
                        <?php if (!isset($id_produk)) : ?>
                        <?php else : ?>
                            <?php include('delete.php'); ?>
                        <?php endif; ?>

                    </div>
                    <div class="col">
                        <?php if (!isset($id_produk)) : ?>
                            <a href="<?= base_url('produk') ?>" class="btn btn-block btn-warning text-white">Belanja Sekarang</a>
                        <?php else : ?>
                            <a href="<?= base_url('belanja/checkout') ?>" class="btn btn-block btn-warning text-white">Checkout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- selesai checkout -->