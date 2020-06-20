<p class="text-right">
  <a href="<?php echo base_url('admin/gambar_produk/produk/'.$gambar_produk->id_gambar_produk) ?>" 
  class="btn btn-success btn-sm" ><i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>
    
<?php
// Error upload 
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open_multipart(base_url('admin/gambar_produk/edit/'.$gambar_produk->id_gambar_produk));
?>

<div class="row form-group">
	<label class="col-md-3">Gambar produk <span class="text-danger">*</span></label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo set_value('gambar') ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Judul gambar</label>
	<div class="col-md-9">
		<input type="text" name="nama_gambar_produk" class="form-control" placeholder="Judul gambar" value="<?php echo $gambar_produk->nama_gambar_produk ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Urutan gambar</label>
	<div class="col-md-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $gambar_produk->urutan ?>" >
	</div>
</div>



<div class="row form-group">
	<label class="col-md-3">Keterangan gambar</label>
	<div class="col-md-9">
		<textarea name="keterangan"  class="form-control" placeholder="Keterangan" ><?php echo $gambar_produk->keterangan ?></textarea>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

