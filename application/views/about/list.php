<div class="container p-5">
</div>
<div class="container p-5">
</div>
<!-- about us -->
<section id="about" class="about scrollspy p-5">
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="center light grey-text text-darken-3">About Us</h3>
        </div>
    </div>

    <div class="container p-5">

        <div class="row">

            <div class="col m6 light">
                <h5>We Are Profesionals</h5>
                <p>
                    Pusat penjualan baju lebaran dan baju muslim mulai dari pakaian anak, baju pria dan baju wanita dengan harga yang terjangkau
                </p>
            </div>
            <div class="col m6 light">
                <?php foreach ($kategori as $kategori) : ?>
                    <?php
                    $this->db->select('nama_produk');
                    $this->db->from('produk');
                    $this->db->where('id_kategori', $kategori['id_kategori']);
                    $count = $this->db->get()->result();
                    $jumlah = count($count);

                    ?>
                    <p><?= $kategori['nama_kategori']; ?></p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?= $jumlah; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<div class="container pb-5"></div>
<div class="container pb-5"></div>