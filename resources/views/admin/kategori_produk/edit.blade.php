
<div class="modal fade" id="Edit<?php echo $kategori_produk->id_kategori_produk ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Edit data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ asset('admin/kategori_produk/edit') }}" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_kategori_produk"   value="{{ $kategori_produk->id_kategori_produk }}">

<div class="form-group row">
	<label class="col-md-3">Upload Gambar Kategori</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar" value="">
		@if ($errors->has('gambar'))
	      	<span class="text-danger">{{ $errors->first('gambar') }}</span>
	    @endif  
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Nama Kategori</label>
	<div class="col-md-9">
		<input type="text" name="nama_kategori_produk" class="form-control" placeholder="Nama kategori berita" value="<?php echo $kategori_produk->nama_kategori_produk ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control simple" placeholder="Keterangan">{{ $kategori_produk->keterangan }}</textarea>
		@if ($errors->has('keterangan'))
	      	<span class="text-danger">{{ $errors->first('keterangan') }}</span>
	    @endif  
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3">Nomor urut</label>
	<div class="col-md-9">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_produk->urutan ?>" required>
</div>
</div>

<div class="form-group row">
	<label class="col-md-3"></label>
	<div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>

<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>
