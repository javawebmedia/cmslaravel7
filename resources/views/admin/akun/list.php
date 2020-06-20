<div class="row">
	<div class="col-md-7">
		<h4 class="alert alert-info">Update Profil Anda</h4>

		<p class="text-center">
			<img src="<?php if($user->gambar =="") { echo $this->website->icon(); }else{ echo base_url('assets/upload/user/thumbs/'.$user->gambar); } ?>" style="max-width: 150px; height: auto;" class="img img-circle img-thumbnail">
		</p>

		<?php echo form_open_multipart(base_url('admin/akun'),'id="tambah"') ?>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Nick name <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Email <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Username <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly disabled>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Level Hak Akses <span class="text-danger">*</span></label>
			<div class="col-sm-9">
				<input type="text" name="akses_level" class="form-control" placeholder="Akses level" value="<?php echo $user->akses_level ?>" readonly disabled>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
			<div class="col-sm-9">

				<input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo $user->gambar ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 control-label text-right"></label>
			<div class="col-sm-9">
				<div class="form-group btn-group text-right">
					<button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
					<button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
					<a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>

	<div class="col-md-5">
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
	</div>
</div>