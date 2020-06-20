@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/video/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_video" value="<?php echo $video->id_video ?>">
<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Judul Video</label>
	<div class="col-sm-9">
		<input type="text" name="judul" class="form-control" placeholder="Judul Video" value="<?php echo $video->judul ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Kode Video Youtube</label>
	<div class="col-sm-9">
		<input type="text" name="video" class="form-control" placeholder="Kode Video Youtube" value="<?php echo $video->video ?>" required>
		<small class="text-gray">Contoh: <span class="text-success">https://www.youtube.com/watch?v=</span><strong class="text-danger">IvjxrQ8c4-w</strong>.
							<br>Copy kode <strong class="text-danger">IvjxrQ8c4-w</strong> sebagai kode Youtube.</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Nomor urut tampil</label>
	<div class="col-sm-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $video->urutan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Keterangan</label>
	<div class="col-sm-9">
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $video->keterangan ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Posisi Video</label>
	<div class="col-sm-9">
		<select name="posisi" class="form-control">
			<option value="Video">Halaman Video</option>
			<option value="Homepage" <?php if($video->posisi=="Homepage") { echo 'selected'; } ?>>Halaman Homepage</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Bahasa</label>
	<div class="col-sm-9">
		<select name="bahasa" class="form-control">
			<option value="Indonesia">Bahasa Indonesia</option>
			<option value="Inggris" <?php if($video->bahasa=="Inggris") { echo 'selected'; } ?>>Bahasa Inggris</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="{{ asset('admin/video') }}" class="btn btn-danger">Kembali</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>

