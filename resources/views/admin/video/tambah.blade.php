
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{ asset('admin/video/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Judul Video</label>
					<div class="col-sm-9">
						<input type="text" name="judul" class="form-control" placeholder="Judul Video" value="{{ old('judul') }}" required>
					</div>
				</div>
				

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Kode Video Youtube</label>
					<div class="col-sm-9">
						<input type="text" name="video" class="form-control" placeholder="Kode Video Youtube" value="{{ old('video') }}" required>
						<small class="text-gray">Contoh: <span class="text-success">https://www.youtube.com/watch?v=</span><strong class="text-danger">IvjxrQ8c4-w</strong>.
							<br>Copy kode <strong class="text-danger">IvjxrQ8c4-w</strong> sebagai kode Youtube.</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Nomor urut tampil</label>
					<div class="col-sm-9">
						<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Keterangan</label>
					<div class="col-sm-9">
						<textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Posisi Video</label>
					<div class="col-sm-9">
						<select name="posisi" class="form-control">
							<option value="Video">Halaman Video</option>
							<option value="Homepage">Halaman Homepage</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Bahasa</label>
					<div class="col-sm-9">
						<select name="bahasa" class="form-control">
							<option value="Indonesia">Bahasa Indonesia</option>
							<option value="Inggris">Bahasa Inggris</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right"></label>
					<div class="col-sm-9">
						<div class="form-group pull-right btn-group">
							<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
							<input type="reset" name="reset" class="btn btn-success " value="Reset">
							<button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				</form>

			</div>
		</div>
	</div>
</div>
