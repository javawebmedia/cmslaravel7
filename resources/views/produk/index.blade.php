<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">

            <div class="col-md-12">
              <h1 class="text-center"><?php echo $title ?></h1>
              <hr>
            </div>
              

           <?php  
            if($produk) {
            foreach($produk as $produk) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 produk text-center">
                  <figure class="thumnail">
                    <a href="{{ asset('produk/detail/'.$produk->slug_produk) }}">
                      <img src="{{ asset('public/upload/image/'.$produk->gambar) }}" alt="<?php  echo $produk->nama_produk ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="{{ asset('produk/detail/'.$produk->slug_produk) }}">
                          <?php  echo $produk->nama_produk ?>
                        </a>
                      </h3>
                    <p class="harga">Rp <?php echo number_format($produk->harga_jual,'0',',','.'); ?></p>
                  </div>
                  <div class="link-produk">
                    <p>
                      <input type="hidden" name="quantity" id="<?php echo $produk->id_produk;?>" value="1" class="quantity">
                      <a href="{{ asset('produk/detail/'.$produk->slug_produk) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                        <a href="{{ asset('pemesanan?id_produk='.$produk->id_produk) }}" class="btn btn-info btn-sm">
                          <i class="fa fa-shopping-cart"></i> Pesan Produk Ini
                        </a>
                    </p>
                </div>
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
          </div>
            <div class="col-md-12">
              
            </div>
      </div>
    </div>
  </div>
</div>
</div>
</section><!-- End Hero -->
