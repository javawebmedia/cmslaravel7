<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $i ?>">
    <i class="fas fa-trash-alt"></i>
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
    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
    
    <a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger">
    <i class="fas fa-trash-alt"></i> Ya, Hapus data</a>

</div>
</div>
</div>
</div>
