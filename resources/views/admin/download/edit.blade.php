<p class="text-right">
	<a href="{{ asset('admin/download') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ asset('admin/download/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_download" value="{{ $download->id_download }}">
<div class="row form-group">
	<label class="col-md-3">Nama file/download</label>
	<div class="col-md-9">
		<input type="text" name="judul_download" class="form-control" placeholder="Judul download" value="<?php echo $download->judul_download ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Jenis/Posisi Download</label>
	<div class="col-md-9">
		<select name="jenis_download" class="form-control">
			<option value="Download">Download Biasa</option>
			<option value="Panduan" 
			<?php if($download->jenis_download=="Panduan") { echo "selected"; } ?>
			>Panduan Penelitian</option>
		</select>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Kategori Download</label>
	<div class="col-md-9">
		<select name="id_kategori_download" class="form-control">
			<?php foreach($kategori_download as $kategori_download) { ?>
				<option value="<?php echo $kategori_download->id_kategori_download ?>" 
					<?php if($download->id_kategori_download==$kategori_download->id_kategori_download) { echo "selected"; } ?>
					><?php echo $kategori_download->nama_kategori_download ?></option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Upload File</label>
		<div class="col-md-9">
			<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Isi/Keterangan</label>
		<div class="col-md-9">
			<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi download"><?php echo $download->isi ?></textarea>
		</div>
	</div>

	<div class="row form-group">
		<label class="col-md-3">Link/website terkait Download</label>
		<div class="col-md-9">
			<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $download->website ?>">
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