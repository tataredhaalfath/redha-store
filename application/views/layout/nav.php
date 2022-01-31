<?php
//ambil data menu
$site = $this->konfigurasi_model->listing();
$nav_produk = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile = $this->konfigurasi_model->nav_produk();

?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/template/') ?>img/logo_small.png" alt="logo" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-uppercase mx-auto">

                <li class="nav-item <?php if ($this->uri->segment(1) == "") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url(); ?>">Home </a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "produk") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('produk'); ?>">Produk</a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "kategori") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('kategori'); ?>">Category</a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "designer") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('designer') ?>">Designer</a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(1) == "about") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link " href="<?= base_url('about') ?>">About</a>
                </li>
            </ul>
            <!-- cek keranjang -->
            <!-- cek data belanjaan -->
            <?php $keranjang = $this->cart->contents(); ?>
            <!-- ahir cek belanjaan -->
            <a href="<?= base_url('belanja'); ?>" class="nav-link text-white"><i class="fas fa-shopping-bag"></i> My Cart
                (<span><?= count($keranjang); ?></span>)</a>
            <!-- ahir cek keranjang -->
            <!-- cek session login pelanggan -->
            <?php if ($this->session->userdata('email')) : ?>
                <button class="nav-link text-white btn">
                    <a href="<?= base_url('dashboard'); ?>" style="text-decoration: none; color:white;">
                        <?php $nama_user = $this->session->userdata('nama_pelanggan');
                        $nama_user = explode(' ', $nama_user); ?>
                        <i class="fas fa-user"></i> <?= $nama_user[0]; ?>
                    </a>
                </button>
            <?php else : ?>
                <button class="nav-link text-white btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i>
                    Login
                </button>
            <?php endif; ?>
            <!-- ahir cek session login -->
        </div>
    </div>
</nav>
<!-- ahir navbar -->