@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/rekening/proses_edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_rekening" value="<?php echo $rekening->id_rekening ?>">
<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Nama bank</label>
	<div class="col-sm-9">
		<input type="text" name="nama_bank" class="form-control" placeholder="Nama bank" value="<?php echo $rekening->nama_bank ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Nomor Rekening</label>
	<div class="col-sm-9">
		<input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo $rekening->nomor_rekening ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Atas Nama</label>
	<div class="col-sm-9">
		<input type="text" name="atas_nama" class="form-control" placeholder="Atas Nama" value="<?php echo $rekening->atas_nama ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Urutan bank</label>
	<div class="col-sm-9">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $rekening->urutan ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Logo bank</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $rekening->gambar ?>">
		<small class="text-gray">Logo: 
			<br><img src="{{ asset('public/upload/image/thumbs/'.$rekening->gambar) }}" style="width: 80px height: auto;" class="img img-thumbnail">
		</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="{{ asset('admin/rekening') }}" class="btn btn-danger">Kembali</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</form>

