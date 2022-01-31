<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><?= $title; ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?=
                    $this->session->flashdata('success');
                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="alert alert-success"> Registrasi telah dilakukan. <a href="<?= base_url('masuk'); ?>" class="btn btn-info btn-sm">Login disini </a>
                    Anda juga bisa melakukan checkout <a href="<?= base_url('belanja/checkout'); ?>" class="btn btn-warning btn-sm">
                        <i class="fa fa-shopping-cart"></i>Checkout</a></p>
            </div>

        </div>



    </div>
</div>
<!-- End Cart -->