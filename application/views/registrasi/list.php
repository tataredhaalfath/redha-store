<div class="container cart-header">
    <div class="row mt-5 text-center">
        <div class="col">
            <h3>Registration Page</h3>
            <p>Selamat bergabung dan selamat berbelanja
                <?php $home = $this->session->userdata('home');
                if (isset($home)) : ?>
                    <a href="<?= base_url(); ?>">Home</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php
            $gagal =  $this->session->userdata('gagal');
            if (isset($gagal)) {
                echo $this->session->flashdata('logingagal');
            }
            echo $this->session->flashdata('sukses');

            ?>
        </div>
    </div>
</div>
<!-- Register -->
<section class="register checkout" style="height: 1000px;">
    <div class="container">
        <div class="row justify-content-center" style="margin-bottom: 100px;">
            <div class="col-lg-10 col-md-10">
                <div class="card rounded-0 register-detail checkout-detail">
                    <div class="card-body">
                        <?= validation_errors('<div class="alert alert-warning">', '</div>') ?>
                        <form action="<?= base_url('registrasi'); ?>" class="leave-comment" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                            </div>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#loginModal">Login</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-block btn-warning text-white">Resigtrasi</button>
                    </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
</section>
<!-- selesai checkout -->