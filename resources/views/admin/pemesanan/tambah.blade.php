<p class="text-right">
  <a href="{{ asset('admin/pemesanan') }}" class="btn btn-success btn-sm">
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
<form action="{{ asset('admin/pemesanan/tambah_proses') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 {{ csrf_field() }}


<p class="alert alert-info">
  <i class="fa fa-user"></i> Isi data pemesanan Anda dengan lengkap dan benar.
</p>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Status Pemesanan</label>
  <div class="col-sm-8">
    <select name="status_pemesanan" class="form-control">
      <option value="Menunggu">Menunggu</option>
      <option value="Dibatalkan" <?php if(isset($_POST['status_pemesanan']) && $_POST['status_pemesanan']=="Dibatalkan") { echo 'selected'; } ?>>Dibatalkan</option>
      <option value="Konfirmasi" <?php if(isset($_POST['status_pemesanan']) && $_POST['status_pemesanan']=="Konfirmasi") { echo 'selected'; } ?>>Konfirmasi</option>
      <option value="Dikirim" <?php if(isset($_POST['status_pemesanan']) && $_POST['status_pemesanan']=="Dikirim") { echo 'selected'; } ?>>Dikirim</option>
      <option value="Selesai" <?php if(isset($_POST['status_pemesanan']) && $_POST['status_pemesanan']=="Selesai") { echo 'selected'; } ?>>Selesai</option>
    </select>  
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Pilih produk pembayaran</label>
  <div class="col-md-8">
    <select name="id_produk" class="form-control select2">
      <?php foreach($produk as $produk) { ?>
        <option value="<?php echo $produk->id_produk ?>" <?php if(isset($_POST['id_produk']) && $_POST['id_produk']==$produk->id_produk) { echo "selected"; }elseif(isset($_GET['id_produk']) && $_GET['id_produk']==$produk->id_produk) { echo 'selected'; } ?>>
          <?php echo $produk->nama_produk ?> (Rp <?php echo number_format($produk->harga_jual,'0',',','.'); ?>)
        </option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Tanggal Order <span class="text-danger">*</span></label>
  <div class="col-sm-8">
    <input type="text" name="tanggal_order" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_order'])) { echo old('tanggal_order'); }else{ echo date('d-m-Y'); } ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Jumlah <span class="text-danger">*</span></label>
  <div class="col-sm-8">
    <input type="number" name="jumlah_produk" class="form-control" value="1"  placeholder="Jumlah" min="1" max="5" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Ongkos Kirim <span class="text-danger">*</span></label>
  <div class="col-sm-8">
    <input type="number" name="ongkir" class="form-control" value="{{ old('ongkir') }}"  placeholder="ongkir" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Nama Anda <span class="text-danger">*</span></label>
  <div class="col-sm-8">
    <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama Anda" value="{{ old('nama_pemesan') }}" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Nomor HP/Whatsapp <span class="text-danger">*</span></label>
  <div class="col-sm-8">
    <input type="text" name="telepon_pemesan" class="form-control" value="{{ old('telepon_pemesan') }}"  placeholder="Nomor HP/Whatsapp" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Email</label>
  <div class="col-sm-8">
    <input type="email" name="email_pemesan" class="form-control" value="{{ old('email_pemesan') }}"  placeholder="Email Anda" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Alamat Pengiriman</label>
  <div class="col-sm-8">
    <textarea name="alamat" class="form-control" placeholder="Alamat">{{ old('alamat') }}</textarea>
  </div>
</div>

<p class="alert alert-info">
  <i class="fa fa-book"></i> Informasi Pembayaran
</p>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Metode Pembayaran</label>
  <div class="col-sm-8">
    <select name="cara_bayar" class="form-control" id="cara_bayar">
      <option value="Tunai">Tunai</option>
      <option value="Transfer"  <?php if(isset($_POST['cara_bayar']) && $_POST['cara_bayar']=="Transfer") { echo 'selected'; } ?>>Transfer</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Pilih Rekening Pembayaran</label>
  <div class="col-md-8">
    <select name="id_rekening" class="form-control" id="id_rekening">
      <option value="">Pilih Rekening</option>
      <?php foreach($rekening as $rekening) { ?>
        <option value="<?php echo $rekening->id_rekening ?>" class="Transfer" <?php if(isset($_POST['id_rekening']) && $_POST['id_rekening']==$rekening->id_rekening) { echo "selected"; }elseif(isset($_GET['id_rekening']) && $_GET['id_rekening']==$rekening->id_rekening) { echo 'selected'; } ?>>
          <?php echo $rekening->nama_bank ?> (<?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->atas_nama ?>)
        </option>
      <?php } ?>
    </select>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  $(function() {
    $("#id_rekening").chained("#cara_bayar");
  });
</script>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Tanggal Bayar</label>
  <div class="col-sm-8">
    <input type="text" name="tanggal_bayar" class="form-control tanggal" placeholder="dd-mm-yyyy" value="{{ old('tanggal_bayar') }}">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Jumlah Pembayaran</label>
  <div class="col-sm-8">
    <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}"  placeholder="Jumlah">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Nama Pemilik Rekening yang digunakan untuk membayar</label>
  <div class="col-sm-8">
    <input type="text" name="pengirim" class="form-control" placeholder="Nama Anda" value="{{ old('pengirim') }}">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Nama Bank yang digunakan untuk membayar</label>
  <div class="col-sm-8">
    <input type="text" name="nama_bank_pengirim" class="form-control" value="{{ old('nama_bank_pengirim') }}"  placeholder="Misal: Bank BCA">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Nomor rekening yang digunakan untuk membayar</label>
  <div class="col-sm-8">
    <input type="text" name="nomor_rekening_pengirim" class="form-control" value="{{ old('nomor_rekening_pengirim') }}"  placeholder="Nomor rekening yang digunakan untuk membayar">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Unggah bukti transfer</label>
  <div class="col-sm-8">
    <input type="file" name="bukti" class="form-control" placeholder="Nomor rekening yang digunakan untuk membayar">
  </div>
</div>

<p class="alert alert-info">
  <i class="fa fa-edit"></i> Informasi Lain
</p>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right">Keterangan Lain</label>
  <div class="col-sm-8">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan">{{ old('keterangan') }}</textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-4 control-label text-right"></label>
  <div class="col-sm-8">
    <div class="btn-group">
      <button type="submit" name="submit" class="btn btn-primary btn-lg" value="login">
        <i class="fa fa-save"></i> Simpan pesanan
      </button>
      <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
        <i class="fa fa-times"></i> Reset
      </button>
    </div>
  </div>
</div>
</form>
