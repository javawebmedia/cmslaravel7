<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="{{ asset('public/css/print.css') }}" media="print">
	<link rel="stylesheet" href="{{ asset('public/css/print.css') }}" media="screen">
</head>
<body>
	<div class="cetak">
		<h1 style="text-align: center;"><?php echo strtoupper($title) ?>
    <br>KODE TRANSAKSI: <?php echo $pemesanan->kode_transaksi ?>  
    </h1>

    <table class="table">
                <thead>
                  <tr>
                    <th width="25%">Kode Order</th>
                    <th width="74%"><?php echo $pemesanan->kode_transaksi ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Produk</td>
                    
                    <td><?php echo $pemesanan->nama_produk ?></td>
                  </tr>
                  <tr>
                    <td>Quantity</td>
                    
                    <td><?php echo $pemesanan->jumlah_produk ?> Pcs</td>
                  </tr>
                  <tr>
                    <td>Harga Produk</td>
                    
                    <td>Rp <?php echo number_format($pemesanan->harga_produk) ?></td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    
                    <td>Rp <?php echo number_format($pemesanan->total_harga) ?></td>
                  </tr>
                  <tr>
                    <td>Nama Penerima</td>
                    
                    <td><?php echo $pemesanan->nama_pemesan ?></td>
                  </tr>
                  <tr>
                    <td>Telepon/Whatapps</td>
                    
                    <td><?php echo $pemesanan->telepon_pemesan ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    
                    <td><?php echo $pemesanan->email_pemesan ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    
                    <td><?php echo nl2br($pemesanan->alamat) ?></td>
                  </tr>
                  
                </tbody>
              </table>
               <hr>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?></small>
		
	</div>
</body>
</html>