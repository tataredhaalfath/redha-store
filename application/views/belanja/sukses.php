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
                    $this->session->flashdata('sukses');
                ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="alert alert-success"> Terimakasih, Barang yang sudah anda beli akan segera kami proses</p>
            </div>

        </div>



    </div>
</div>
<!-- End Cart -->