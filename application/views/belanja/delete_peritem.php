<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteperitem">
    <i class="fas fa-times-circle"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteperitem" tabindex="-1" aria-labelledby="hapusitemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" class="text-center" id="hapusitemModalLabel">Hapus Barang Belanjaan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h3>Peringatan</h3>
                    Produk yang sudah dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <button class="btn btn-danger"><a href="<?= base_url('belanja/hapus/' . $keranjang['rowid']); ?>" class="text-white "><i class="fa fa-trash"></i> Hapus</a></button>
            </div>
        </div>
    </div>
</div>