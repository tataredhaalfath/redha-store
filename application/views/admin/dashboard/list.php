<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-sitemap"></i></span>
            <div class="info-box-content">
                <a href="<?= base_url('admin/produk'); ?>" style="text-decoration: none; color:black">
                    <span class="info-box-text">Data Produk</span>
                    <span class="info-box-number"><?= $this->dashboard_model->total_produk()->total; ?><small> Produk</small> <br>
                        <?= $this->dashboard_model->total_kategori()->total; ?><small> Kategori</small></span>
                </a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number"><?= $this->dashboard_model->total_pelanggan()->total; ?><small> Orang</small></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
                <a href="<?= base_url('admin/transaksi'); ?>" style="text-decoration: none; color:black">
                    <span class="info-box-text">Transaksi</span>
                    <span class="info-box-number"><?= $this->dashboard_model->total_header_transaksi()->total; ?><small> Transaksi</small> <br>
                        <?= $this->dashboard_model->total_header_transaksi_konfirmasi()->total; ?><small> Terbayar</small>
                    </span>
                </a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Transaksi</span>
                <span class="info-box-number">Rp. <?= number_format($this->dashboard_model->total_transaksi()->total, '0', ',', '.'); ?> <br><small>Semua Transaksi</small></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Transaksi TerKonfirmasi</span>
                <span class="info-box-number">Rp. <?= number_format($this->dashboard_model->total_transaksi_konfirmasi()->total, '0', ',', '.'); ?> <br><small>Transaksi Terbayar</small></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-pencil"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Berita</span>
                <span class="info-box-number"><?= $this->dashboard_model->total_berita()->total; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-tasks"></i></span>
            <div class="info-box-content">
                <a href="<?= base_url('admin/rekening'); ?>" style="text-decoration: none; color:black">
                    <span class="info-box-text">Rekening</span>
                    <span class="info-box-number"><?= $this->dashboard_model->total_rekening()->total; ?></span>
                </a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-print"></i></span>
            <div class="info-box-content">
                <a href="<?= base_url('admin/laporan'); ?>" style="text-decoration: none;color:black;">
                    <span class="info-box-text">Laporan</span>
                    <span class="info-box-number"><small> - Harian</small> &nbsp;
                        <small> - Bulanan</small> <br>
                        <small> - Tahunan</small>
                    </span>
                </a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
</div><!-- /.row -->