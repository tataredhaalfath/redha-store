<!-- Button trigger modal -->
<button type="button" class="btn btn-block" data-toggle="modal" data-target="#delete" style="background-color: #ce4202; color: white;"><i class="fa fa-trash"></i> Clear
</button>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" class="text-center" id="exampleModalLabel">Bersihkan Keranjang Belanja</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h3>Peringatan</h3>
                    Yakin ingin membersihkan keranjang? Data yang sudah dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <button class="btn btn-danger"><a href="<?= base_url('belanja/hapus'); ?>" class="text-white "><i class="fa fa-trash"></i> Bersihkan Keranjang</a></button>
            </div>
        </div>
    </div>
</div>