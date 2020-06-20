<section id="hero" style="color: #fff;">
  <div class="container">
    <div class="row">
        <div class="owl-carousel owl-theme">
          <?php foreach($slider as $slider) { ?>
          <div class="item">
            <div class="row">
              <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out" class="slideku">
                  <h1><?php echo $slider->judul_galeri ?></h1>
                  <h4><?php echo $slider->isi ?></h4>
                  <div class="text-center text-lg-left">
                    <a href="<?php echo $slider->website ?>" class="btn-get-started scrollto"><i class="fa fa-eye"></i> Lihat Detail...</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 order-1 order-lg-2 hero-img text-center" data-aos="zoom-out" data-aos-delay="300">
                <div class="slideku">
                  <p class="text-center"><img src="{{ asset('public/upload/image/'.$slider->gambar) }}" class="img img-fluid animated" alt="<?php echo $slider->judul_galeri ?>"></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>
</section><!-- End Hero --><!-- Start main -->
<main id="main">

 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-4 col-lg-6 d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <img src="{{ asset('public/upload/image/'.$site->icon) }}" alt="{{ $site->namaweb }}" class="img img-fluid img-thumbnail">
          </div>

          <div class="col-xl-8 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Selamat datang di {{ $site->namaweb }}</h3>
            <?php echo $site->tentang ?>

          </div>
        </div>

      </div>
      <hr>
    </section><!-- End About Section -->

<!-- ======= Apa itu Nitrico? Section ======= -->
<section id="apa-itu-nitrico" class="about">

      
  <div class="container">
    <div class="col-xl-12 col-lg-12 col-md-12 text-center" data-aos="fade-up">
          <h2>Produk <?php $site->namaweb ?></h2>
          <p><?php echo $site->deskripsi ?></p>
          <br><br>
    </div>
        <!-- START -->
    <div class="row">
      <?php  
            if($produks) {
            foreach($produks as $produk) { ?>
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
                    <p class="harga">Rp <?php echo $produk->harga_jual; ?></p>
                  </div>
                  <div class="link-produk">
                    <p>
                      <input type="hidden" name="quantity" id="{{ $produk->id_produk }}" value="1" class="quantity">
                      <a href="{{ asset('produk/detail/'.$produk->slug_produk) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                        <a href="{{ asset('pemesanan?id_produk='.$produk->id_produk) }}" class="btn btn-info btn-sm">
                          <i class="fa fa-shopping-cart"></i> Pesan Produk Ini
                        </a>
                    </p>
                </div>
            </div>
            
          <?php } ?>
          <div class="clearfix"></div>
            <div class="col-md-12">
              <hr>
               {{ $produks->links() }}
              </div>
        <?php }else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          
    </div>
    <!-- END -->
    </div>
  <hr>
</section>
<!-- End Apa itu Nitrico? Section -->

 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <h2>Berita terbaru</h2>
          <p><?php echo $site->namaweb ?></p>
        </div>

        <div class="row">

          <?php  
            if($berita) {
            foreach($berita as $berita) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 berita">
                  <figure class="thumnail">
                    <a href="{{ asset('berita/detail/'.$berita->slug_berita) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$berita->gambar) }}" alt="<?php  echo $berita->judul_berita ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="{{ asset('berita/detail/'.$berita->slug_berita) }}">
                          <?php  echo $berita->judul_berita ?>
                        </a>
                      </h3>
                    <p class="harga"><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 250, $end='...') ?></p>
                    <div class="link-berita">
                      <p>
                        <input type="hidden" name="quantity" id="<?php echo $berita->id_berita;?>" value="1" class="quantity">
                        <a href="{{ asset('berita/read/'.$berita->slug_berita) }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Baca Detail...</a>
                          
                      </p>
                  </div>
                  </div>
                  
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
            <p class="text-center">
              <a href="{{ asset('berita') }}" class="btn btn-info"><i class="fa fa-newspaper"></i> Lihat berita lainnya...</a>
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

</main>
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>