<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

			</div>
			<div class="modal-body">

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
				echo form_open_multipart(base_url('admin/kategori_funnel'),array(	'class'	=> 'form-horizontal'));
				?>
				<div class="row form-group">
					<label class="col-md-3">Nama kategori funnel</label>
					<div class="col-md-9">
						<input type="text" name="nama_kategori_funnel" class="form-control" placeholder="Nama kategori funnel" value="<?php echo set_value('nama_kategori_funnel') ?>" required>
					</div>
				</div>

				<div class="row form-group">
					<label class="col-md-3">Urutan kategori funnel</label>
					<div class="col-md-9">
						<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
					</div>
				</div>

				<div class="row form-group">
					<label class="col-md-3">Gambar kategori funnel</label>
					<div class="col-md-9">
						<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo set_value('gambar') ?>">
					</div>
				</div>

				<div class="row form-group">
					<label class="col-md-3">Keterangan kategori funnel</label>
					<div class="col-md-9">
						<textarea name="keterangan"  class="form-control simple" placeholder="Keterangan" ><?php echo set_value('keterangan') ?></textarea>
					</div>
				</div>

				<div class="row form-group">
					<label class="col-md-3"></label>
					<div class="col-md-9">
						<div class="form-group pull-right btn-group">
							<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
							<input type="reset" name="reset" class="btn btn-success " value="Reset">
							<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php
// Form close 
				echo form_close();
				?>

			</div>
		</div>
	</div>
</div>
