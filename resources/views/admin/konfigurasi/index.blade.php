

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/konfigurasi/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}

<div class="row">
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

<div class="col-md-12">
 <div class="form-group">
    <label>Summary of the company</label>
    <textarea name="tentang" rows="3" class="form-control konten" id="isi" placeholder="Summary of the company"><?php echo $site->tentang ?></textarea>
    </div>
</div>


<div class="col-md-12">
 <div class="form-group">
    <label>Web Description</label>
    <textarea name="deskripsi" rows="3" class="form-control" placeholder="Web Description"><?php echo $site->deskripsi ?></textarea>
    </div>
</div>

<div class="col-md-6">
	<h3>Basic information:</h3><hr>
    <div class="form-group">
    <label>Company name</label>
    <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo $site->namaweb ?>" required class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Singkat</label>
    <input type="text" name="nama_singkat" placeholder="Nama singkat organisasi/perusahaan" value="<?php echo $site->nama_singkat ?>" required class="form-control">
    </div>

    <div class="form-group">
    <label>Singkatan</label>
    <input type="text" name="singkatan" placeholder="ABC" value="<?php echo $site->singkatan ?>" required class="form-control">
    </div>
    
    <div class="form-group">
    <label>Company tagline/motto</label>
    <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $site->tagline ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Company tagline/motto 2</label>
    <input type="text" name="tagline2" placeholder="Company tagline/motto 2" value="<?php echo $site->tagline2 ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Website address</label>
    <input type="url" name="website" placeholder="{{ asset('/') }}" value="<?php echo $site->website ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Official email</label>
    <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site->email ?>" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Registrasion &amp; Order email</label>
    <input type="email" name="email_cadangan" placeholder="youremail@address.com" value="<?php echo $site->email_cadangan ?>" class="form-control" required>
    </div>
    
     <div class="form-group">
    <label>Address</label>
    <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $site->alamat ?></textarea>
    </div>
    
     <div class="form-group">
    <label>Phone number</label>
    <input type="text" name="telepon" placeholder="021-000000" value="<?php echo $site->telepon ?>" class="form-control">
    </div>
    
      <div class="form-group">
    <label>Fax</label>
    <input type="text" name="fax" placeholder="021-000000" value="<?php echo $site->fax ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>Mobile / Celluler</label>
    <input type="text" name="hp" placeholder="021-000000" value="<?php echo $site->hp ?>" class="form-control">
    </div>
    
    <h3>Social network</h3><hr>
    
    <div class="form-group">
    <label>URL Facebook <i class="fa fa-facebook"></i></label>
    <input type="text" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo $site->facebook ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Facebook <i class="fa fa-facebook"></i></label>
    <input type="text" name="nama_facebook" placeholder="<?php echo $site->namaweb ?>" value="<?php echo $site->nama_facebook ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>URL Twitter <i class="fa fa-twitter"></i></label>
   <input type="text" name="twitter" placeholder="http://twitter.com/namakamu" value="<?php echo $site->twitter ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Twitter <i class="fa fa-facebook"></i></label>
    <input type="text" name="nama_twitter" placeholder="Nama akun twitter" value="<?php echo $site->nama_twitter ?>" class="form-control">
    </div>
    
     <div class="form-group">
    <label>URL Instagram <i class="fa fa-instagram"></i></label>
   <input type="text" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo $site->instagram ?>" class="form-control">
    </div>

    <div class="form-group">
    <label>Nama Instagram <i class="fa fa-facebook"></i></label>
    <input type="text" name="nama_instagram" placeholder="Nama akun instagram" value="<?php echo $site->nama_instagram ?>" class="form-control">
    </div>
    
</div>

<div class="col-md-6">
    <h3>Cara Pemesanan Produk</h3><hr>
    <div class="form-group">
    <label>Pilih Cara Pemesanan Produk</label>
    <select name="cara_pesan" class="form-control">
        <option value="Formulir Pemesanan">Formulir Pemesanan</option>
        <option value="Keranjang Belanja" <?php if($site->cara_pesan=='Keranjang Belanja') { echo 'selected'; } ?>>Keranjang Belanja</option>
    </select>
    </div>

    <h3>Text di bawah peta dan link downloadnya</h3><hr>
    <div class="form-group">
    <label>Text bawah peta</label>
    <input type="text" name="text_bawah_peta" placeholder="Text bawah peta" value="<?php echo $site->text_bawah_peta ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label>Link text di bawah peta <i class="fa fa-link"></i></label>
    <input type="text" name="link_bawah_peta" placeholder="Link text di bawah peta" value="<?php echo $site->link_bawah_peta ?>" class="form-control">
    </div>
    
	<h3>Modul SEO (Search Engine Optimization)</h3><hr>
	<div class="form-group">
    <label>Keywords (Keyword search for Google, Bing, etc)</label>
    <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $site->keywords ?></textarea>
    </div>
    
    <div class="form-group">
    <label>Metatext</label>
    <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $site->metatext ?></textarea>
    </div>
    
    <h3>Google Map</h3><hr>
    <div class="form-group">
    <label>Google Map</label>
    <textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $site->google_map ?></textarea>
    </div>
    
    <div class="form-group map">
        <style type="text/css" media="screen">
            iframe {
                width: 100%;
                max-height: 200px;
            }
        </style>
    <?php echo $site->google_map ?>

    <hr>
    <div class="form-group btn-group">
        <input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
        <input type="reset" name="reset" value="Reset" class="btn btn-primary ">
    </div>
    </div>
</div>


</div>
</form>

