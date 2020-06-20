
<div id="Detail<?php echo $produk->id_produk ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $produk->nama_produk ?></h4>
            </div>
            <div class="modal-body">

<div class="panel panel-default">
<div class="panel-body">

     <table class="table table-bordered table-hover" width="100%">
    <tbody>
        <tr>
            <td width="30%">Nama Produk</td>
            <td>: <?php echo $produk->nama_produk ?></td>
        </tr>
        <tr>
          <td width="30%">Jumlah produk</td>
          <td>: <?php echo $produk->jumlah_produk ?> pcs</td>
      </tr>
        <tr>
          <td width="30%">Berat produk</td>
          <td>: <?php echo $produk->berat ?> kg</td>
      </tr>
        <tr>
          <td width="30%">Urutan (PXLXT cm)</td>
          <td>: <?php echo $produk->panjang ?> x <?php echo $produk->lebar ?> x <?php echo $produk->tinggi ?> cm</td>
      </tr>
        <tr>
          <td width="30%">Harga beli</td>
          <td>: Rp <?php echo number_format($produk->harga_produk,'0',',','.') ?></td>
      </tr>
        <tr>
          <td width="30%">Harga jual</td>
          <td>: Rp <?php echo number_format($produk->harga_jual,'0',',','.') ?></td>
      </tr>
        <tr>
          <td width="30%">Biaya kirim minimal</td>
          <td>: Rp <?php echo number_format($produk->biaya_kirim,'0',',','.') ?></td>
      </tr>
        <tr>
          <td width="30%">Kategori</td>
          <td>: <?php echo $produk->nama_kategori_produk ?></td>
      </tr>
        <tr>
          <td width="30%">Brand</td>
          <td>: <?php echo $produk->nama_brand ?></td>
      </tr>
        
        <tr>
          <td width="30%">Gambar</td>
          <td>: <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" class="img img-responsive"></td>
      </tr>
      <tr>
          <td width="30%">Tanggal input</td>
          <td>: <?php echo $produk->tanggal_post ?></td>
      </tr>
        <tr>
          <td width="30%">Terakhir update</td>
          <td>: <?php echo $produk->tanggal ?></td>
      </tr>
        <tr>
          <td width="30%">Diupdate oleh</td>
          <td>: <?php echo $produk->nama ?></td>
      </tr>
      <tr>
          <td colspan="2">
          <p><strong>Deskripsi:</strong></p><hr>
          <?php echo $produk->isi ?></td>
      </tr>
    </tbody>
</table>

  
</div>
</div>
    

</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                <i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>