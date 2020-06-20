<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1><?php echo $title ?></h1>
              <hr>
            </div>
            <div class="col-md-12 text-left">
              
              <p class="text-center">Baca informasi Panduan pembayaran sebelum melakukaan konfirmasi. <a href="{{ asset('pembayaran') }}">Panduan Pembayaran</a>.</p>
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

<form action="{{ asset('konfirmasi_proses') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<?php if($pemesanan==""){}else{ ?>
<p class="alert alert-info">Berikut adalah detail pemesanan Anda</p>
<table class="table">
  <thead>
    <tr>
      <th width="25%">Kode Order</th>
      <th width="1%">:</th>
      <th width="74%"><?php echo $pemesanan->kode_transaksi ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nama Produk</td>
      <td>:</td>
      <td><?php echo $pemesanan->nama_produk ?></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td>:</td>
      <td><?php echo $pemesanan->jumlah_produk ?> Pcs</td>
    </tr>
    <tr>
      <td>Harga Produk</td>
      <td>:</td>
      <td>Rp <?php echo number_format($pemesanan->harga_produk) ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td>:</td>
      <td>Rp <?php echo number_format($pemesanan->total_harga) ?></td>
    </tr>
    <tr>
      <td>Nama Penerima</td>
      <td>:</td>
      <td><?php echo $pemesanan->nama_pemesan ?></td>
    </tr>
    <tr>
      <td>Telepon/Whatapps</td>
      <td>:</td>
      <td><?php echo $pemesanan->telepon_pemesan ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><?php echo $pemesanan->email_pemesan ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo nl2br($pemesanan->alamat) ?></td>
    </tr>
    
  </tbody>
</table>

<?php } ?>
<p class="alert alert-info">
  Isi data pembayaran Anda dengan lengkap dan benar.
</p>
<hr>

<div class="form-group row">
    <label class="col-sm-3 control-label">Pilih rekening pembayaran</label>
    <div class="col-md-9">
      <select name="id_rekening" class="form-control select2">
        <?php foreach($rekening as $rekening) { ?>
        <option value="<?php echo $rekening->id_rekening ?>" <?php if(isset($_POST['id_rekening']) && $_POST['id_rekening']==$rekening->id_rekening) { echo "selected"; } ?>>
          <?php echo $rekening->nama_bank ?> (<?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->atas_nama ?>)
        </option>
        <?php } ?>
      </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Kode Transaksi</label>
    <div class="col-sm-9">
        <input type="text" name="kode_transaksi" class="form-control" placeholder="Kode transaksi" value="<?php if($pemesanan==""){ echo old('kode_transaksi'); }else{ echo $pemesanan->kode_transaksi; }?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Cara bayar</label>
    <div class="col-sm-9">
        <select name="cara_bayar" class="form-control" id="cara_bayar">
            <option value="Transfer">Transfer</option>
            <option value="Tunai">Tunai</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Tanggal bayar</label>
    <div class="col-sm-9">
        <input type="text" name="tanggal_bayar" class="form-control tanggal" placeholder="dd-mm-yyyy" value="">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Upload bukti bayar
      <br><small class="text-gray">Format JPG, PNG, GIF. Maksimal 2 MB</small>
    </label>
    <div class="col-sm-9">
        <input type="file" name="bukti" placeholder="Upload bukti bayar" class="form-control">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Kode/Nomor Transaksi</label>
    <div class="col-sm-9">
        <input type="text" name="kode_transaksi" class="form-control" placeholder="Kode/Nomor transaksi" value="">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
    <div class="col-sm-9">
        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="">
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nama Pemilik Rekening</label>
    <div class="col-sm-9">
        <input type="text" name="pengirim" class="form-control" placeholder="Nama Pemilik Rekening" value="" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nama Bank</label>
    <div class="col-sm-9">
        <input type="text" name="nama_bank_pengirim" class="form-control" value=""  placeholder="Nama Bank" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nomor Rekening Pembayaran</label>
    <div class="col-sm-9">
        <input type="text" name="nomor_rekening_pengirim" class="form-control" value="" placeholder="Nomor rekening pembayaran" required>
        <small class="text-gray">Nomor rekening yang digunakan untuk membayar</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Keterangan lain</label>
    <div class="col-sm-9">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
    </div>
</div>



<div class="form-group row">
    <label class="col-sm-3 control-label"></label>
<div class="col-sm-9">
    <div class="btn-group">
        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="login">
          <i class="fa fa-save"></i> Simpan Data
        </button>
        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
          <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>

</form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

