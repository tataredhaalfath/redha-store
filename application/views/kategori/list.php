<!-- category -->
<section class="category p-5 mt-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h3>Category</h3>
                <p>Miliki Pakaian Dengan Category Terbaik</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($kategori as $kategori) : ?>
                <div class="col-md-4 col-sm-6">
                    <figure class="figure">
                        <a href="<?= base_url('produk/kategori/' . $kategori['slug_kategori']); ?>">
                            <img src="<?= base_url('assets/upload/kategori/') . $kategori['gambar']; ?>" class="figure-img img-fluid" width="350">
                        </a>
                        <figcaption class="figure-caption">
                            <div class="row">
                                <div class="col">
                                    <h4><?= $kategori['nama_kategori']; ?></h4>
                                    <?php
                                    $this->db->select('nama_produk');
                                    $this->db->from('produk');
                                    $this->db->where('id_kategori', $kategori['id_kategori']);
                                    $count = $this->db->get()->result();
                                    $jumlah = count($count);

                                    ?>
                                    <p><?= $jumlah ?> Items</p>
                                </div>
                            </div>
                        </figcaption>

                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- ahir category -->

<?php
include('desainer.php');
?>