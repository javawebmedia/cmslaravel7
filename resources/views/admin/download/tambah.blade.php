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

<form action="{{ asset('admin/download/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row form-group">
<label class="col-md-3">Nama file/download</label>
<div class="col-md-9">
<input type="text" name="judul_download" class="form-control" placeholder="Judul download" value="{{ old('judul_download') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Jenis/Posisi Download</label>
<div class="col-md-9">
<select name="jenis_download" class="form-control">
	<option value="Download">Download Biasa</option>
	<option value="Panduan">Panduan Penelitian</option>}
</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Kategori Download</label>
<div class="col-md-9">
<select name="id_kategori_download" class="form-control">

	<?php foreach($kategori_download as $kategori_download) { ?>
	<option value="<?php echo $kategori_download->id_kategori_download ?>"><?php echo $kategori_download->nama_kategori_download ?></option>
	<?php } ?>

</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Upload file</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Isi/keterangan</label>
<div class="col-md-9">
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi download">{{ old('isi')  }}</textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Link / website yang terkait dengan Download</label>
<div class="col-md-9">
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="{{ old('website') }}">
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