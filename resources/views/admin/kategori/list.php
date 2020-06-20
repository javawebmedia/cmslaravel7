<p>
  <?php include('tambah.php') ?>
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">NAMA KATEGORI</th>
    <th width="25%">SLUG</th>
    <th width="10%">NO URUT</th>
    <th></th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori as $kategori) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori->nama_kategori ?></td>
    <td><?php echo $kategori->slug_kategori ?></td>
    <td><?php echo $kategori->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori->id_kategori ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      <?php include('edit.php') ?>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>