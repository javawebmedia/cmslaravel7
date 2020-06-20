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
              

            <div class="col-lg-12 col-md-12 col-sm-12 mb-4 berita">
              <div class="row">
                  <figure class="thumnail col-md-4">
                    <a href="{{ asset('berita/detail/'.$berita->slug_berita) }}">
                      <img src="{{ asset('public/upload/image/thumbs/'.$berita->gambar) }}" alt="<?php  echo $berita->judul_berita ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan col-md-8">
                    <?php echo $berita->isi ?>
    
                  </div>
                  
                </div>
            </div>
          
      </div>
    </div>
  </div>
</div>
</div>
</section><!-- End Hero -->
