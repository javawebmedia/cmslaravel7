<?php
use Illuminate\Support\Facades\DB;
$site       = DB::table('konfigurasi')->first();
?>
<!-- End #main --><script type="text/javascript">
  $(document).ready(function(){
    // Add
    $('.add_cart').click(function(){
      var product_id    = $(this).data("productid");
      var product_name  = $(this).data("productname");
      var product_price = $(this).data("productprice");
      var quantity      = $('#' + product_id).val();
      var pengalihan    = $('#' + product_id).val();
      $.ajax({
        url : "{{ asset('/') }}keranjang/tambah",
        method : "POST",
        data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity,pengalihan:pengalihan},
        success: function(data){
          window.location.href = "{{ asset('/') }}keranjang";
        }
      });
    });
    // Remove
    $(document).on('click','.romove_cart',function(){
      var row_id=$(this).attr("id"); 
      $.ajax({
        url : "{{ asset('/') }}keranjang/hapus",
        method : "POST",
        data : {row_id : row_id},
        success :function(data){
          window.location.href = "{{ asset('/') }}keranjang";
        }
      });
    });
    
  });
</script>
<script>
  $(document).ready(function() {
    $('.owl-carousel').owlCarousel({
      items: 1,
      autoHeight: true,
      loop: false,
      center: true,
      margin: 5,
      callbacks: true,
      URLhashListener: true,
      autoplayHoverPause: true,
      startPosition: 'URLHash'
    });
  })
</script>
<script>
  
</script>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3><?php echo $site->namaweb?></h3>
              <div class="pb-3">
                <?php echo $site->deskripsi ?>
              </div>
              <div class="social-links mt-3">
                <a href="<?php echo $site->facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?php echo $site->instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?php echo $site->twitter ?>" class="google-plus"><i class="bx bxl-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/') }}">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('produk') }}">Lihat Produk</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('pemesanan') }}">Pemesanan Produk</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('pembayaran') }}">Cara Pembayaran</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('kontak') }}">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Pemesanan</h4>
            <p>
              <strong><?php echo strtoupper($site->namaweb) ?></strong>
              <br><?php echo nl2br($site->alamat) ?>
              <br>Email: <?php echo $site->email ?>
              <br>Telepon: <?php echo $site->telepon ?>
              <br>HP <i class="fab fa-whatsapp"></i>: <?php echo $site->hp ?>
              <br>Website: <?php echo $site->website ?>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo $site->namaweb ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="https://javawebmedia.com/">Java Web Media</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script>
$( ".datepicker" ).datepicker({
  inline: true,
  changeYear: true,
  changeMonth: true,
  dateFormat: "yy-mm-dd",
  yearRange: "1920:2020"
});

$( ".tanggal" ).datepicker({
  inline: true,
  changeYear: true,
  changeMonth: true,
  dateFormat: "dd-mm-yy",
  yearRange: "1920:2020"
});
</script>
  <script src="{{ asset('public/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/template/assets/vendor/aos/aos.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('public/template/assets/js/main.js') }}"></script>
</body>
</html>