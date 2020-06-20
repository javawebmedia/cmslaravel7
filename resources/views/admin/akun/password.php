<h4 class="alert alert-info">Ganti Password</h4>

<?php echo form_open_multipart(base_url('admin/akun/password'),'id="tambah"') ?>

<div class="form-group row">
	<label class="col-sm-4 control-label text-right">Password baru <span class="text-danger">*</span></label>
	<div class="col-sm-8">
		<input type="password" name="password" id="password" class="form-control" placeholder="Password baru" value="<?php echo set_value('password') ?>" minlength="6" maxlength="32" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-4 control-label text-right">Konfirmasi Password <span class="text-danger">*</span></label>
	<div class="col-sm-8">
		<input type="password" name="passconf" id="passconf" class="form-control" placeholder="Konfirmasi Password " value="<?php echo set_value('passconf') ?>" minlength="6" maxlength="32" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-4 control-label text-right"></label>
	<div class="col-sm-8">
		<div class="form-group btn-group text-right">
			<button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Ganti Password</button>
			<button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
		</div>
	</div>
</div>

<?php echo form_close(); ?>