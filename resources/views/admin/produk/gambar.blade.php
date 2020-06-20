<p><a href="<?php echo base_url('admin/gambar_produk/produk/'.$produk->id_produk) ?>" class="btn btn-success btn-sm">
<i class="fa fa-image"></i> Kelola Gambar</a></p>
<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Judul gambar</th>
    <th>Keterangan</th>
    <th>Urutan</th>
</tr>
</thead>
<tbody>


<tr class="odd gradeX bg-danger">
    <td><?php echo 1 ?></td>
    <td>
    <?php if($produk->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $produk->nama_produk ?></td>
    <td><?php echo 'Gambar utama' ?></td>
    <td>1</td>
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
</tr>

<?php $i++; } ?>

</tbody>
</table>