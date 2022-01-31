<div class="col-md-4">
    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Laporan Harian</h4>
        </div>
        <div class="box-body">
            <form action="<?= base_url('admin/laporan/harian') ?>" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <select name="tanggal" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = 1;
                                for ($i = $mulai; $i < $mulai + 31; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = 1;
                                for ($i = $mulai; $i < $mulai + 12; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = date('Y') - 2;
                                for ($i = $mulai; $i < $mulai + 7; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Laporan Bulanan</h4>
        </div>
        <div class="box-body">
            <form action="<?= base_url('admin/laporan/bulanan') ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = 1;
                                for ($i = $mulai; $i < $mulai + 12; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = date('Y') - 2;
                                for ($i = $mulai; $i < $mulai + 7; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Laporan Tahunan</h4>
        </div>
        <div class="box-body">
            <form action="<?= base_url('admin/laporan/tahunan') ?>" method="post">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control select2" style="width: 100%;">
                                <?php
                                $mulai = date('Y') - 2;
                                for ($i = $mulai; $i < $mulai + 7; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>