<?php
$site = $this->konfigurasi_model->listing();
?>
<!-- carousel -->
<div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
    <div class="carousel-inner">
        <div class="container">
            <div class="carousel-item active">
                <div class="row pt-5 justify-content-center">
                    <div class="col-9 col-sm-4 col-md-6 col-lg-4">
                        <h1 class="mb-4">Special Eid Mubarok</h1>
                        <p class="mb-4">Jadikan hari lebaranmu lebih meriah dan memorable</p>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-warning text-white">Get It Now</a>
                    </div>
                    <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="<?= base_url('assets/template/'); ?>img/slideshow/1.jpg" class="img-fluid" alt="slideshow">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row pt-5 justify-content-center">
                    <div class="col-9 col-sm-4 col-md-6 col-lg-4">
                        <h1 class="mb-4">Special Eid Mubarok</h1>
                        <p class="mb-4">Ubah penampilanmu dengan style kekikian</p>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-warning text-white">Get It Now</a>
                    </div>
                    <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="<?= base_url('assets/template/'); ?>img/slideshow/2.jpg" class="img-fluid" alt="slideshow">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row pt-5 justify-content-center">
                    <div class="col-9 col-sm-4 col-md-6 col-lg-4">
                        <h1 class="mb-4">Special Eid Mubarok</h1>
                        <p class="mb-4">Selalu tampil trendy dengan baju islami</p>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-warning text-white">Get It Now</a>
                    </div>
                    <div class="col-3 col-sm-6 col-md-4 col-lg-4 d-none d-sm-block offset-1">
                        <img src="<?= base_url('assets/template/'); ?>img/slideshow/3.jpeg" class="img-fluid" alt="slideshow">
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- ahir carousel -->