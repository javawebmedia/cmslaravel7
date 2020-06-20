
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{ asset('admin/rekening/tambah') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Nama bank</label>
					<div class="col-sm-9">
						<input type="text" name="nama_bank" class="form-control" placeholder="Nama bank" value="{{ old('nama_bank') }}" required>
					</div>
				</div>

				
				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Nomor Rekening</label>
					<div class="col-sm-9">
						<input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="{{ old('nomor_rekening') }}" required>
					</div>
				</div>
				

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Atas Nama</label>
					<div class="col-sm-9">
						<input type="text" name="atas_nama" class="form-control" placeholder="Atas Nama" value="{{ old('atas_nama') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Urutan bank</label>
					<div class="col-sm-9">
						<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 control-label text-right">Logo bank</label>
					<div class="col-sm-9">
						<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="{{ old('gambar') }}">
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
