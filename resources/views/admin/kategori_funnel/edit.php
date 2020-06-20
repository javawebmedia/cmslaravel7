
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
echo form_open_multipart(base_url('admin/kategori_funnel/edit/'.$kategori_funnel->id_kategori_funnel), array('class'	=> 'form-horizontal'));
?>

<div class="row form-group">
	<label class="col-md-3">Nama kategori funnel</label>
	<div class="col-md-9">
		<input type="text" name="nama_kategori_funnel" class="form-control" placeholder="Nama kategori funnel" value="<?php echo $kategori_funnel->nama_kategori_funnel ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Urutan kategori funnel</label>
	<div class="col-md-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_funnel->urutan ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Gambar kategori funnel</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $kategori_funnel->gambar ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Keterangan kategori funnel</label>
	<div class="col-md-9">
		<textarea name="keterangan"  class="form-control simple" placeholder="Keterangan" ><?php echo $kategori_funnel->keterangan ?></textarea>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="<?php echo base_url('admin/kategori_funnel') ?>" class="btn btn-info"> Kembali</a>
		</div>
	</div>
</div>
	<?php
// Form close 
	echo form_close();
	?>

