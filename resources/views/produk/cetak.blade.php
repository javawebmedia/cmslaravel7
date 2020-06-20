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
		<h1><?php echo strtoupper($produk->nama_produk) ?></h1>

    <table>
      <tbody>
        <tr>
          <td><p class="about_text">
                      <strong><?php echo $site->namaweb ?></strong>
                        <br><?php echo nl2br($site->alamat) ?>
                        <br>Telepon: <?php echo $site->telepon; ?>
                        <br>Whatsapp: <?php echo $site->hp; ?>
                        <br>Email: <?php echo $site->email; ?>
                    </p></td>
        </tr>
      </tbody>
    </table>
                    

                    
		<table class="table">
          <tbody>
    <tr>
      <td width="30%">Nama Produk</td>
      <td>: <?php echo $produk->nama_produk ?></td>
    </tr>
    <tr>
      <td width="30%">Jumlah Produk</td>
      <td>: <?php echo $produk->stok ?> pcs</td>
    </tr>
    <tr>
      <td width="30%">Berat produk</td>
      <td>: <?php echo $produk->berat ?> kg</td>
    </tr>
    <tr>
      <td width="30%">Urutan (PXLXT cm)</td>
      <td>: <?php echo $produk->ukuran ?> cm</td>
    </tr>
    <tr>
      <td width="30%">Harga beli</td>
      <td>: Rp <?php echo number_format($produk->harga_beli,'0',',','.') ?></td>
    </tr>
    <tr>
      <td width="30%">Harga jual</td>
      <td>: Rp <?php echo number_format($produk->harga_jual,'0',',','.') ?></td>
    </tr>
    <tr>
      <td width="30%">Kategori</td>
      <td>: <?php echo $produk->nama_kategori_produk ?></td>
    </tr>
    
    <tr>
      <td width="30%">Gambar</td>
      <td>: <img src="{{ asset('public/upload/image/'.$produk->gambar) }}" class="img img-responsive" style="width: 25%; height: auto;"></td>
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
      <td colspan="2">
      <p><strong>Deskripsi:</strong></p><hr>
      <?php echo $produk->isi ?></td>
    </tr>
  </tbody>
              </table>
              <hr>
              <?php echo $produk->isi;  ?>
               <hr>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?></small>
		
	</div>
</body>
</html>