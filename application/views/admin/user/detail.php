<div class="row">
    <div class="col-lg-4">
        <?php
        //notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        ?>
    </div>
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    </div>
    <div class="box-body with-border">
        <div class="row">
            <div class="col-lg-4 md-6">
                <?= $this->session->flashdata('sukses'); ?>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/upload/profile/') . $user['gambar'] ?>" class="card-img" width="100" height="125">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Nama : <?= $user['nama']; ?></p>
                        <p class="card-text">Email : <?= $user['email']; ?></p>
                        <p class="card-text">Username : <?= $user['username']; ?></p>
                        <p class="card-text">Member Since <?= $user['tanggal_update']; ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>