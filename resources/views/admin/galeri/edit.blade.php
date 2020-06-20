<p class="text-right">
	<a href="{{ asset('admin/galeri') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>
<?php
// Validasi error

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
?>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/galeri/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_galeri" value="{{ $galeri->id_galeri }}">
<div class="row form-group">
	<label class="col-md-3">Judul galeri</label>
	<div class="col-md-9">
		<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="<?php echo $galeri->judul_galeri ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Urutan, Status Teks Slider &amp; Posisi</label>
	<div class="col-md-3">
		<input type="number" name="urutan" class="form-control" placeholder="No urut tampil"  value="<?php echo $galeri->urutan ?>">
		<small>Urutan tampil</small>
	</div>
	<div class="col-md-3">
		<select name="status_text" class="form-control">
			<option value="Ya">Ya, tampilkan</option>
			<option value="Tidak" <?php if($galeri->status_text=="Tidak") { echo "selected"; } ?>>Tidak, jangan tampilkan teks</option>
		</select>
		<small>Tampilkan teks</small>
	</div>
	<div class="col-md-3">
		<select name="jenis_galeri" class="form-control">
			<option value="Galeri">Galeri Biasa</option>
			<option value="Homepage" 
			<?php if($galeri->jenis_galeri=="Homepage") { echo "selected"; } ?>
			>Homepage - Gambar Slider</option>
			<option value="Pop up" <?php if($galeri->jenis_galeri=="Pop up") { echo "selected"; } ?>>Pop up Homepage</option>
			<option value="Testimonial" <?php if($galeri->jenis_galeri=="Testimonial") { echo "selected"; } ?>>Background Testimonial</option>
		</select>
		<small>Posisi galeri</small>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Kategori Galeri</label>
	<div class="col-md-9">
		<select name="id_kategori_galeri" class="form-control">
			<?php foreach($kategori_galeri as $kategori_galeri) { ?>
				<option value="<?php echo $kategori_galeri->id_kategori_galeri ?>" 
					<?php if($galeri->id_kategori_galeri==$kategori_galeri->id_kategori_galeri) { echo "selected"; } ?>
					><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Upload gambar</label>
		<div class="col-md-9">
			<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Isi galeri</label>
		<div class="col-md-9">
			<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi galeri"><?php echo $galeri->isi ?></textarea>
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Link/website terkait Galeri</label>
		<div class="col-md-9">
			<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $galeri->website ?>">
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3"></label>
		<div class="col-md-9">
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-info " value="Reset">
		</div>
	</div>
</div>
</form>
