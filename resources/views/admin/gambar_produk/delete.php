<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $i ?>">
    <i class="fa fa-trash"></i>
</button>
<div class="modal fade" id="myModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Hapus data?</h4>
</div>
<div class="modal-body">
    
    <p class="alert alert-danger">Yakin ingin menghapus data ini?</p>

</div>
<div class="modal-footer">
    
    
    <a href="<?php echo base_url('admin/gambar_produk/delete/'.$gambar_produk->id_gambar_produk.'/'.$gambar_produk->id_produk) ?>" class="btn btn-danger">
    <i class="fa fa-trash"></i> Ya, Hapus data</a>

    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

</div>
</div>
</div>
</div>
