<?php if($pemesanan) { ?>  
<div class="row">
<div class="col-md-6">
    <form action="{{ asset('admin/pemesanan/cari') }}" method="get" accept-charset="utf-8">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="keywords" value="<?php if(isset($_GET['keywords'])) { echo $_GET['keywords']; } ?>" placeholder="Cari..." required>
      <span class="input-group-append">
            <button type="submit" name="cari" class="btn btn-info" value="cari">Cari</button>
            <a href="{{ asset('admin/pemesanan/tambah') }}" class="btn btn-success ">
              <i class="fa fa-plus"></i> Tambah Baru
            </a>
      </span>
    </div>
    </form>
</div>
<div class="col-md-6">
     {{ $pemesanan->links() }}
</div>

</div>

<form action="{{ asset('admin/pemesanan/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<input type="hidden" name="pengalihan" value="{{ url()->full() }}">
<div class="row">
  <div class="input-group mb-3 col-md-4">
    <span class="input-group-append">
      <button class="btn btn-danger btn-flat" type="submit" name="hapus" onClick="check();" >
        <i class="fas fa-trash-alt"></i>
      </button>
    </span>
    <select name="status_pemesanan" class="form-control">
      <option value="Menunggu">Menunggu</option>
      <option value="Dibatalkan">Dibatalkan</option>
      <option value="Konfirmasi">Konfirmasi</option>
      <option value="Dikirim">Dikirim</option>
      <option value="Selesai">Selesai</option>
    </select>  
    <span class="input-group-append">
      <button class="btn btn-success " type="submit" name="status" value="status">
        <i class="fa fa-save"></i> Update Status
      </button>
    </span>
  </div>
<div class="input-group mb-3 col-md-8">
    
    <select name="status_pemesanan_filter" class="form-control">
      <option value="Semua">Semua Status</option>
      <option value="Menunggu">Menunggu</option>
      <option value="Dibatalkan">Dibatalkan</option>
      <option value="Konfirmasi">Konfirmasi</option>
      <option value="Dikirim">Dikirim</option>
      <option value="Selesai">Selesai</option>
    </select>
    <input type="text" class="form-control tanggal" name="mulai" value="" placeholder="dd-mm-yyyy">
    <span class="input-group-append">
      <span class="btn btn-dark" type="submit" name="sd" value="sd">
        s/d
      </span>
    </span>
    <input type="text" class="form-control tanggal" name="selesai" value="" placeholder="dd-mm-yyyy">
    <span class="input-group-append">
      <button class="btn btn-info " type="submit" name="filter" value="Filter">
        <i class="fa fa-print"></i> Filter Data
      </button>
    </span>
  </div>

</div>
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
        <th width="15%">STATUS</th>
        <th width="20%">PEMESAN</th>
        <th width="15%">PRODUK</th>
        <th width="15%%">JUMLAH</th>
        <th width="15%">PEMBAYARAN</th>
        <th width="15%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($pemesanan as $pemesanan) {
    $id_pemesanan = $pemesanan->id_pemesanan;
  ?>

  <tr>
    <td class="text-center">
        <div class="icheck-primary">
            <input type="checkbox" name="id_pemesanan[]" value="<?php echo $pemesanan->id_pemesanan ?>" id="check<?php echo $i ?>">
            <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
    <td>
      <?php 
      if($pemesanan->status_pemesanan=='Menunggu') {
        $class = 'btn-warning';
        $icon   = 'fa-hourglass';
      }elseif($pemesanan->status_pemesanan=='Dibatalkan') {
        $class = 'btn-danger';
        $icon   = 'fa-times';
      }elseif($pemesanan->status_pemesanan=='Konfirmasi') {
        $class = 'btn-primary';
        $icon  = 'fa-upload';
      }elseif($pemesanan->status_pemesanan=='Dikirim') {
        $class = 'btn-info';
        $icon   = 'fa-truck';
      }elseif($pemesanan->status_pemesanan=='Selesai') {
        $class = 'btn-success';
        $icon   = 'fa-check-circle';
      }
      ?>
      <a href="{{ asset('admin/pemesanan/status_pemesanan/'.$pemesanan->status_pemesanan) }}" class="btn btn-sm btn-block {{ $class }}">
        <i class="fa  {{ $icon }}"></i> <?php echo $pemesanan->status_pemesanan ?>
      </a>
      <small>
        <i class="fas fa-key"></i> No Order:<br><strong><?php echo $pemesanan->kode_transaksi ?></strong>
        <br><i class="fas fa-calendar"></i> Tgl Order:<br><strong><?php echo date('d-m-Y',strtotime($pemesanan->tanggal_order)) ?></strong>
        <br><i class="fa fa-calendar"></i> Tgl Update Status:<br><strong><?php echo date('d-m-Y H:i:s',strtotime($pemesanan->tanggal_update)) ?></strong>
        <br><i class="fa fa-key"></i> Token: <br>
        <?php echo $pemesanan->token_transaksi ?>
      </small>
    </td>
    <td>
      <?php echo $pemesanan->nama_pemesan ?>
      <br>
        <small>
          <i class="fas fa-mobile"></i> HP/WA: <?php echo $pemesanan->telepon_pemesan ?>
          <br><i class="fa fa-envelope"></i> Email: <?php echo $pemesanan->email_pemesan ?>
          <br><strong><i class="fas fa-street-view"></i> Alamat: </strong>
          <br><?php echo nl2br($pemesanan->alamat) ?>
        </small>
    </td>
    <td><?php if($pemesanan->nama_produk=="") { echo '<div class="alert alert-warning text-center"><i class="fa fa-times"></i><br>Produk tidak tersedia</div>'; }else{ ?>
      <?php echo $pemesanan->nama_produk ?>
      <small>
        <br><i class="fas fa-tags"></i> Kat: <?php echo $pemesanan->nama_kategori_produk ?>
        <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_jual) ?>
        <br><i class="fas fa-image"></i> Gambar: 
        <br><img src="{{ asset('public/upload/image/thumbs/'.$pemesanan->gambar) }}" class="img img-responsive img-thumbnail">
      </small>
    <?php } ?>
    </td>
    <td>
      <small>
        <i class="fas fa-shopping-cart"></i> Qty: <?php echo $pemesanan->jumlah_produk ?>
        <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_produk) ?>
        <br><i class="fas fa-plus"></i> Sub Total: Rp <?php echo number_format($pemesanan->total_harga) ?>
        <br><i class="fas fa-truck"></i> Ongkir: Rp <?php echo number_format($pemesanan->ongkir) ?>
        <br><i class="fas fa-check"></i> Total: Rp <?php echo number_format($pemesanan->total_harga+$pemesanan->ongkir) ?>
      </small>
    </td>
    <td>
      <small>
        <i class="fas fa-table"></i> Cara bayar: <?php echo $pemesanan->cara_bayar ?>
        <br><i class="fas fa-tag"></i> Tgl Bayar: <?php echo date('d-m-Y',strtotime($pemesanan->tanggal_bayar)) ?>
        <br><i class="fas fa-home"></i> Dari Bank: <?php echo $pemesanan->nama_bank_pengirim ?>
        <br><i class="fas fa-sort-numeric-up-alt"></i> Dari Rek: <?php echo $pemesanan->nomor_rekening_pengirim ?>
        <br><i class="fas fa-user"></i> A.N: <?php echo $pemesanan->pengirim ?>
        <br><i class="fas fa-plus"></i> Jml Bayar: Rp <?php echo number_format($pemesanan->jumlah) ?>
        <br><i class="fas fa-upload"></i> Bukti: <?php if($pemesanan->bukti !="") { ?><a href="{{ asset('public/upload/image/thumbs/'.$pemesanan->bukti) }}" target="_blank"><?php echo $pemesanan->bukti ?></a><?php }else{ echo '-'; } ?>
      </small>
    </td>
    
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/pemesanan/edit/'.$pemesanan->id_pemesanan) }}" class="btn btn-success btn-block btn-sm"><i class="fa fa-check"></i> Update Status</a>
      </div>
      <div class="clearfix"><hr></div>
      <div class="btn-group">
        <a href="{{ asset('admin/pemesanan/detail/'.$pemesanan->id_pemesanan) }}" class="btn btn-secondary btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
        <a href="{{ asset('admin/pemesanan/cetak/'.$pemesanan->id_pemesanan) }}" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i></a>
        <a href="{{ asset('admin/pemesanan/delete/'.$pemesanan->id_pemesanan) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>


</form>

<?php }else{ ?>
<div class="alert alert-info">
  <p>Tidak ditemukan data</p>
</div>

<?php } ?>