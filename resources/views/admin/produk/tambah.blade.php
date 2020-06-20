<p class="text-right">
	<a href="{{ asset('admin/produk') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/produk/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Kategori &amp; Status Produk</label>
	<div class="col-sm-3">
		<select name="id_kategori_produk" class="form-control">
			<?php foreach($kategori_produk as $kategori_produk) { ?>
				<option value="<?php echo $kategori_produk->id_kategori_produk ?>"><?php echo $kategori_produk->nama_kategori_produk ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="col-sm-3">
		<select name="status_produk" class="form-control">
			<option value="Publish">Publikasikan</option>
			<option value="Draft">Simpan sebagai draft</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Nama &amp; Kode Produk <span class="text-danger">*</span></label>
	<div class="col-sm-6">
		<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required value="{{ old('nama_produk') }}">
		<small class="text-gray">Setiap awal kata gunakan huruf capital. Misal: <strong>Coklat Nitrico</strong></small>
	</div>
	<div class="col-sm-2">
		<input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required value="{{ old('kode_produk') }}">
		<small class="text-gray">Huruf capital. Misal: <strong>WDEV</strong></small>
	</div>
</div>



<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Deskripsi Produk</label>
	<div class="col-sm-9">
		<textarea name="isi" id="isi"  class="form-control konten" placeholder="Deskripsi Produk">{{ old('isi') }}</textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Deskripsi Ringkas &amp; Keywords Produk (untuk pencarian Google)</label>
	<div class="col-sm-4">
		<textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk">{{ old('deskripsi')  }}</textarea>
		<small class="text-gray">Penjelasan secara ringkas produk</small>
	</div>
	<div class="col-sm-4">
		<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)">{{ old('keywords')  }}</textarea>
		<small class="text-gray">Gunakan koma sebagai pemisah, misal: <strong>web design, desain grafis, produk web, produk android</strong></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Upload gambar</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" required placeholder="Upload gambar" id="file">
		<div id="imagePreview"></div>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Harga Produk</label>
	<div class="col-sm-3">
		<input type="number" name="harga_jual" class="form-control" placeholder="Harga jual" value="{{ old('harga_jual') }}">
		<small class="text-gray">Harga jual</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="{{ old('harga_beli') }}">
		<small class="text-gray">Harga beli</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Harga eceran terendah &amp; tertinggi</label>
	<div class="col-sm-3">
		<input type="number" name="harga_terendah" class="form-control" placeholder="Harga eceran terendah" value="{{ old('harga_terendah') }}">
		<small class="text-gray">Harga eceran terendah</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="harga_tertinggi" class="form-control" placeholder="Harga eceran tertingi" value="{{ old('harga_tertinggi') }}">
		<small class="text-gray">Harga eceran tertingi</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Diskon dan jenisnya</label>
	<div class="col-sm-3">
		<select name="jenis_diskon" class="form-control">
			<option value="Potongan">Potongan Harga (Rp)</option>
			<option value="Persentase">Persentase (%)</option>
		</select>
		<small class="text-gray">Jenis diskon</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="besar_diskon" class="form-control" placeholder="Besar Diskon" value="{{ old('besar_diskon') }}">
		<small class="text-gray">Besaran Diskon. Misal: 100.000 atau 10%</small>
	</div>
	
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Periode Diskon (<small class="text-danger">Jika ada</small>)</label>
	<div class="col-sm-3">
		<input type="text" name="mulai_diskon" class="form-control tanggal" placeholder="dd-mm-yyyy" value="{{ old('mulai_diskon') }}">
		<small class="text-gray">Format: dd-mm-yyyy</small>
	</div>
	<div class="col-sm-3">
		<input type="text" name="selesai_diskon" class="form-control tanggal" placeholder="dd-mm-yyyy" value="{{ old('selesai_diskon') }}">
		<small class="text-gray">Format: dd-mm-yyyy</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Jumlah minimal &amp; Maksimal order (<small class="text-danger">Minimal dan maksimal</small>)</label>
	<div class="col-sm-3">
		<input type="number" name="jumlah_order_min" class="form-control" placeholder="Jumlah minimal" value="{{ old('jumlah_order_min') }}">
		<small class="text-gray">Jumlah <strong>minimal</strong> order dalam 1 kelas</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="jumlah_order_max" class="form-control" placeholder="Jumlah maksimal" value="{{ old('jumlah_order_max') }}">
		<small class="text-gray">Jumlah <strong>maksimal</strong> order dalam 1 kelas</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Satuan, Berat dan Ukuran</label>
	<div class="col-sm-2">
		<input type="text" name="satuan" class="form-control" placeholder="Satuan" value="{{ old('satuan') }}">
		<small class="text-gray">Misal: Buah, Bungkus. Pak, Kilogram, Gram</small>
	</div>
	<div class="col-sm-2">
		<input type="number" name="berat" class="form-control" placeholder="Berat" value="{{ old('berat') }}">
		<small class="text-gray">Dalam satuan <strong>gram</strong></small>
	</div>
	<div class="col-sm-2">
		<input type="text" name="ukuran" class="form-control" placeholder="Ukuran" value="{{ old('ukuran') }}">
		<small class="text-gray">Misal: 10 x 20 x 30 cm</small>
	</div>
</div>



<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Stok dan Urutan ditampilkan</label>
	<div class="col-sm-3">
		<input type="number" name="stok" class="form-control" placeholder="Stok" value="{{ old('stok') }}">
		<small class="text-gray">Format angka.</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
		<small class="text-gray">Format angka</small>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group btn-group pull-right">
			<button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
			<input type="reset" name="reset" class="btn btn-info " value="Reset">
		</div>
	</div>
</div>
</form>
