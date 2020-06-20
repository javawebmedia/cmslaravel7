<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="{{ asset('public/css/print.css') }}" media="print">
	<link rel="stylesheet" href="{{ asset('public/css/print.css') }}" media="screen">
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" media="print" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" media="screen" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="cetak">
		<h1 style="text-align: center;">TANDA PEMESANAN BARANG
    <br>KODE TRANSAKSI: <?php echo $pemesanan->kode_transaksi ?>  
    </h1>

    <table class="printer">
  <thead>
    <tr class="bg-info">
      
      <th>PENGIRIM (TOKO)</th>
      <th width="50%">DETAIL CUSTOMER (KEPADA)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <strong><?php echo strtoupper($site->namaweb) ?></strong>
              <br><?php echo nl2br($site->alamat) ?>
                <br>Email: <?php echo $site->email ?>
                <br>Telepon: <?php echo $site->telepon ?>
                <br>HP: <?php echo $site->hp ?>
                <br>Website: <?php echo $site->website ?>
      </td>
      <td>
        <strong><?php echo strtoupper($pemesanan->nama_pemesan) ?></strong>
        <br><strong>Alamat: </strong>
          <br><?php echo nl2br($pemesanan->alamat) ?>
        <br>HP/WA: <?php echo $pemesanan->telepon_pemesan ?>
          <br>Email: <?php echo $pemesanan->email_pemesan ?>
      </td>
      
    </tr>
  </tbody>
</table>
<h4>DATA PESANAN</h4>
<table class="printer">
  <thead>
    <tr class="text-center">
      <th width="5%">NO</th>
      <th width="20%">NO ORDER</th>
      <th width="20%">NAMA BARANG</th>
      <th width="10%">HARGA</th>
      <th width="10%">QTY</th>
      <th width="10%">SUB TOTAL</th>
      <th width="10%">ONGKIR</th>
      <th width="10%">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="text-center">1</td>
      <td><strong><?php echo $pemesanan->kode_transaksi ?></strong>
        <br>Tgl Order:<strong><?php echo date('d-m-Y',strtotime($pemesanan->tanggal_order)) ?></strong>
      </td>
      <td>
        <?php if($pemesanan->nama_produk=="") { echo '<div class="alert alert-warning text-center"><i class="fa fa-times"></i><br>Produk tidak tersedia</div>'; }else{ ?>
          <?php echo $pemesanan->nama_produk ?>
          <small>
            <br><i class="fas fa-tags"></i> Kat: <?php echo $pemesanan->nama_kategori_produk ?>
            <br><i class="fas fa-tag"></i> Harga: Rp <?php echo number_format($pemesanan->harga_jual) ?>
            <!-- <br><i class="fas fa-image"></i> Gambar: 
            <br><img src="{{ asset('public/upload/image/thumbs/'.$pemesanan->gambar) }}" class="img img-responsive img-thumbnail"> -->
          </small>
        <?php } ?>
      </td>
      <td class="text-center">Rp <?php echo number_format($pemesanan->harga_produk) ?></td>
      <td class="text-center"><?php echo $pemesanan->jumlah_produk ?> Pcs</td>
      <td class="text-center">Rp <?php echo number_format($pemesanan->total_harga) ?></td>
      <td class="text-center">Rp <?php echo number_format($pemesanan->ongkir) ?></td>
      <td class="text-center">Rp <?php echo number_format($pemesanan->total_harga+$pemesanan->ongkir) ?></td>
    </tr>
  </tbody>
</table>

<h4>PEMBAYARAN</h4>
<table class="printer">
  <tbody>
    <tr>
      <td width="25%">Cara bayar</td>
      <td><?php echo $pemesanan->cara_bayar ?></td>
    </tr>
    <tr>
      <td>Tanggal Bayar</td>
      <td><?php echo date('d-m-Y',strtotime($pemesanan->tanggal_bayar)) ?></td>
    </tr>
    <tr>
      <td>Dari Bank</td>
      <td><?php echo $pemesanan->nama_bank_pengirim ?></td>
    </tr>
    <tr>
      <td>Dari Rekening</td>
      <td><?php echo $pemesanan->nomor_rekening_pengirim ?></td>
    </tr>
    <tr>
      <td>Atas Nama</td>
      <td><?php echo $pemesanan->pengirim ?></td>
    </tr>
    <tr>
      <td>Jumlah Bayar</td>
      <td>Rp <?php echo number_format($pemesanan->jumlah) ?></td>
    </tr>
    <tr>
      <td>Bukti</td>
      <td><?php echo $pemesanan->bukti ?></td>
    </tr>
  </tbody>
</table>
               <hr>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?> | <?php echo $site->website ?></small>
		
	</div>
</body>
</html>