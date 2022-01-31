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
                            <div class="col-3 col-md-3 thumbnail-img">
                                <img src="<?= base_url('assets/upload/image/thumbs/') . $produk['gambar']; ?>" class="img-fluid" width="80" height="80">
                            </div>
                            <div class="col-7 col-md-7 mx-0">
                                <h5 class="m-0"><?= $keranjang['name']; ?></h5>
                                <p class="m-0" style="color: #B7B7B7;">Size : <?= $ukuran['nama_ukuran']; ?></p>
                                <p class="m-0" style="color: #B7B7B7;">Berat : <?= $keranjang['berat']; ?> Kg </p>
                                <p class="m-0" style="color: #B7B7B7;">Qty : <?= $keranjang['qty']; ?> Items</p>
                                <p class="m-0" style="color: #B7B7B7;">Rp. <?= number_format($keranjang['price'], '0', ',', '.'); ?></p>
                            </div>
                            <div class="col-2 col-md-2 text-left">
                                <!-- <button type="button" class="btn btn-sm" id="kurang" style="background-color: #EAEAEF; color: white;"><i class="fa fa-minus-circle"></i></button> -->
                                <!-- <input type="number" value="<?= $keranjang['qty']; ?>" min="1" max="20" id="hasil" name="qty" size="2"> -->
                                <!-- <button type="button" class="btn btn-sm btn-success" id="tambah"><i class="fa fa-plus-circle"></i></button> -->
                            </div>
                            <!-- <div class="col-1 col-md-1 mt-1 text-left">
                                <button type="submit" name="update" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                            </div> -->
                            <!-- <div class="col-1 col-md-1 mt-1 text-left"> -->
                            <!-- <a href="<?= base_url('belanja/hapus/' . $keranjang['rowid']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></a> -->
                            <?php  //include('delete_peritem.php'); 
                            ?>
                            <!-- </div> -->
                        </div>

                    <?php endforeach; ?>
                    </form>
                    <h4 class="mb-3" style="margin-top: 100px;">Your Address</h4>

                    <form action="<?= base_url('belanja/checkout') ?>" method="post">

                        <div class="form-group">
                            <?php $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 8)) ?>
                            <label for="kode_transaksi">Kode Transaksi</label>
                            <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" placeholder="kode transaksi" value="<?= $kode_transaksi ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="penerima">Nama Penerima</label>
                            <input type="text" class="form-control" id="penerima" name="nama_pelanggan" placeholder="nama pelanggan" value="<?= $pelanggan['nama_pelanggan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Penerima</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $pelanggan['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon Penerima</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="no telepon" value="<?= $pelanggan['telepon']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="kelurahan" value="<?= $pelanggan['kelurahan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?= $pelanggan['kecamatan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota" placeholder="kota" value="<?= $pelanggan['kota']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Kode Post</label>
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="kode_pos" value="<?= $pelanggan['kode_pos']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Spesifik</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat lengkap" value="<?= $pelanggan['alamat']; ?>" required>
                        </div>

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
                                    <small style="color: #B7B7B7;"><?= $item =  $keranjang['qty']; ?> Items</small>
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
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 class="m-0 align-self-center text-success">Rp. <?php $subtot = $this->cart->total();
                                                                                    echo number_format($subtot, '0', ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Pengiriman Standar</h6>
                                <?php $berat = $this->cart->total_berat(); ?>
                                <small style="color: #B7B7B7;">JNE/JNT/NINJA (<?= ceil($berat); ?> kg)</small>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <?php
                                //$total_item = $this->cart->total_items();;

                                //$kurir = $total_item * 13000 

                                $total_berat = $this->cart->total_berat();
                                $kurir = ceil($total_berat);
                                $kurir *= 26000;
                                ?>
                                <h6 class="m-0 align-self-center text-success">Rp. <?= number_format($kurir, '0', ',', '.') ?></h6>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Ied Promo</h6>
                                <small style="color: #B7B7B7;">10% Off</small>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <?php
                                $total = $this->cart->total();
                                $diskon = $total / 10;
                                $totalahir = ($total - $diskon) + $kurir;
                                ?>
                                <h6 class="m-0 align-self-center text-danger">-Rp. <?= number_format($diskon, '0', ',', '.') ?></h6>
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <div class="col">
                                <h6 class="m-0">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 class="m-0 align-self-center text-primary">Rp. <?= number_format($this->cart->total() + $kurir, '0', ',', '.') ?></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<= $pelanggan['id_pelanggan];?>">
                <input type="hidden" name="total" id="total" value="<?= $total; ?>">
                <input type="hidden" name="kurir" id="kurir" value="<?= $kurir; ?>">

                <input type="hidden" name="jumlah_transaksi" id="jumlah_transaksi" value="<?= $this->cart->total() + $kurir; ?>">
                <input type="hidden" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('Y-m-d'); ?>">
                <div class="row mt-3">
                    <div class="col">
                        <!-- <button type="button" class="btn btn-block" style="background-color: #ce4202; color: white;"><i class="fa fa-trash"></i>
                            Clear</button> -->
                        <?php if (isset($id_produk)) : ?>

                            <?php include('delete.php'); ?>
                    </div>
                    <div class="col">

                        <button type="button" class="btn btn-block btn-warning text-white" data-toggle="modal" data-target="#staticBackdrop">Checkout</button>
                    <?php else : ?>
                        <a href="<?= base_url('produk') ?>" class="btn btn-block btn-warning text-white">Belanja Sekarang</a>
                    <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- selesai checkout -->

<!-- Modal -->
<!-- <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">

                <img src="<?= base_url('assets/template/') ?>img/cart/sukses_checkout.png" class="mb-5">
                <h3>Checkout Berhasil</h3>
                <p>Segera lakukan konfirmasi pembayaran <br> agar pesanan anda dapat segera dikirim</p>
                <button type="submit" class="btn mt-3 btn-warning">Konfirmasi Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- end modal -->




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('assets/template/') ?>img/cart/sukses_checkout.png" class="mb-5">
                <h3>Checkout Berhasil</h3>
                <p style="color: #B7B7B7;">Segera lakukan konfirmasi pembayaran <br> agar pesanan anda dapat segera dikirim</p>
                <button type="submit" class="btn mt-3 btn-warning">Konfirmasi Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>