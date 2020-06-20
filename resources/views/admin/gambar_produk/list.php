<p class="text-right">
    <a href="<?php echo base_url('admin/produk') ?>" class="btn btn-info btn-sm">
<i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>
<p>

  <?php include('tambah.php') ?>
</p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Judul gambar</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<tr>
    <td><?php echo 1 ?></td>
    <td>
    <?php if($produk->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $produk->nama_produk ?></td>
    <td><?php echo 'Gambar utama' ?></td>
    <td>1</td>
    <td>

    </td>
</tr>

<?php $i=2; foreach($gambar_produk as $gambar_produk) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
    <?php if($gambar_produk->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar_produk->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $gambar_produk->nama_gambar_produk ?></td>
    <td><?php echo $gambar_produk->keterangan ?></td>
    <td><?php echo $gambar_produk->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/gambar_produk/edit/'.$gambar_produk->id_gambar_produk) ?>" 
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>