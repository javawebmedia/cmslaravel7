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
            <div class="col-md-8 text-left">

              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
             <form action="{{ asset('proses_pemesanan') }}" method="post" accept-charset="utf-8">
               {{ csrf_field() }}
               <input type="hidden" name="token_rahasia" value="72827582Uduagd86275gbdahgahgfa">
             

              <p class="alert alert-info">
                Isi data pemesanan Anda dengan lengkap dan benar.
              </p>


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
                <input type="number" name="jumlah_produk" class="form-control" value="{{ old('jumlah_produk') }}"  placeholder="Jumlah" min="1" max="5" required>
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



              <div class="form-group row">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <div class="btn-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="login">
                          <i class="fa fa-save"></i> Kirim pesanan
                        </button>
                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
                          <i class="fa fa-times"></i> Reset
                        </button>
                    </div>
                </div>
              </div>
              </form>
            </div>

            <div class="col-md-4">
                <img src="{{ asset('public/upload/image/'.$site->gambar)}}" class="img img-thumbnail img-fluid">  
            </div>

            <div class="col-md-12">
               <hr>
                <p>Anda sudah melakukan pembayaran? Silakan lakukan <a href="{{ asset('konfirmasi') }}">Konfirmasi Pembayaran</a>.</p>
                <hr>
             </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

