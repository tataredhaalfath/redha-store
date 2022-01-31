<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?= $produk['id_produk']; ?>">
    <i class="fa fa-trash-o">Hapus</i>
</button>

<!-- Modal -->
<div class="modal fade" id="delete-<?= $produk['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" class="text-center" id="exampleModalLabel">Hapus Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4>Peringatan</h4>
                    Yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <a href='<?= base_url('admin/produk/delete/' . $produk['id_produk']); ?>' class="btn btn-danger"><i class="fa fa-trash-o"></i>Hapus</a>
            </div>
        </div>
    </div>
</div>