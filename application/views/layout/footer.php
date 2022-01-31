<?php
//load data konfigurasi website
$site = $this->konfigurasi_model->listing();
$nav_produk = $this->konfigurasi_model->nav_produk();
?>

<!-- modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" style="height: 500px;">
                <p style="color:black; font-weight:600; font-size: 20px; text-align:center">Masukan username dan password</p>
                <br>

                <?=
                $this->session->flashdata('warning');
                $this->session->flashdata('sukses');
                validation_errors('<div class="alert alert-warning">', '</div>');
                ?>
                <form action="<?= base_url('masuk'); ?>" class="leave-comment" method="POST">
                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo set_value('email'); ?>" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" value="<?php echo set_value('password'); ?>" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>
                <br>
                <hr>
                <div class="text-center">
                    <a href="#">I forgot my password</a><br>
                    <a href="<?= base_url('registrasi'); ?>" class="text-center">Register a new membership</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ahir modal -->

<!-- footer -->
<footer class="border-top p-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-1">
                <a href="">
                    <img src="<?= base_url('assets/template/'); ?>img/logo_small.png">
                </a>
            </div>
            <div class="col-5 text-right">
                <a href="">
                    <img src="<?= base_url('assets/template/'); ?>img/sosial/fb.png">
                    <img src="<?= base_url('assets/template/'); ?>img/sosial/ig.png">
                    <img src="<?= base_url('assets/template/'); ?>img/sosial/tw.png">
                </a>
            </div>
        </div>
        <div class="row mt-3 justify-content-between">
            <div class="col-5">
                <p>All Right Reserved by Redha Store Copyright <?= date('Y'); ?>.</p>
            </div>
            <div class="col-6">
                <nav class="nav justify-content-end text-uppercase">
                    <a class="nav-link pr-0 active" href="#">Jobs</a>
                    <a class="nav-link pr-0" href="#">Developer</a>
                    <a class="nav-link pr-0" href="#">Trems</a>
                    <a class="nav-link pr-0" href="#">Privacy Policy</a>
                </nav>
            </div>
        </div>

    </div>
</footer>
<!-- ahir footer -->

<!-- ahir modal -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= base_url('assets/template/'); ?>js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template/'); ?>js/all.js"></script>
<script>
    var tambah = document.getElementById('tambah');
    var kurang = document.getElementById('kurang');
    var hasil = document.getElementById('hasil');
    var no = 0;
    tambah.onclick = function() {
        hasil.value = 2 + no++;
    }
    kurang.onclick = function() {
        hasil.value = no--;
    }
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>