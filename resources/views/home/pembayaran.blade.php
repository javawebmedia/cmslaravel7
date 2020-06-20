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
              
              <p class="text-center">Anda sudah melakukan pembayaran? Silakan lakukan <a href="{{ asset('pembayaran/konfirmasi') }}">Konfirmasi Pembayaran</a>.</p>
              <hr>
                <?php echo $site->isi_pembayaran; ?>
              <hr>
              <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr class="bg-info">
                    <th width="5%">NO</th>
                    <th>GAMBAR</th>
                    <th>NAMA BANK</th>
                    <th>NOMOR REKENING</th>
                    <th>ATAS NAMA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($rekening as $rekening) { ?>
                    <td class="text-center"><?php echo $i ?></td>
                    <td>
                      <?php if($rekening->gambar != "") { ?>
                        <img src="{{ asset('public/upload/image/thumbs/'.$rekening->gambar) }}" width="60" class="img img-responsive">
                      <?php }else{ echo 'Tidak ada'; } ?>
                    </td>
                    <td><?php echo $rekening->nama_bank ?></td>
                    <td><?php echo $rekening->nomor_rekening ?></td>
                    <td><?php echo $rekening->atas_nama ?></td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

