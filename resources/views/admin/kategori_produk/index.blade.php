<p>
@include('admin/kategori_produk/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="10%">GAMBAR</th>
    <th width="20%">NAMA KATEGORI</th>
    <th width="20%">SLUG</th>
    <th width="20%">KETERANGAN</th>
    <th width="10%">NO URUT</th>
    <th></th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_produk as $kategori_produk) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td class="text-center">
      <?php if($kategori_produk->gambar=="") { echo '-';}else{ ?>
        <img src="{{ asset('public/upload/image/thumbs/'.$kategori_produk->gambar) }}" class="img img-fluid img-thumbnail" style="width: 100px; height: auto;">
      <?php } ?>
    </td>
    <td><?php echo $kategori_produk->nama_kategori_produk ?></td>
    <td><?php echo $kategori_produk->slug_kategori_produk ?></td>
    <td><small><?php echo $kategori_produk->keterangan ?></small></td>
    <td><?php echo $kategori_produk->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_produk->id_kategori_produk ?>">
    <i class="fa fa-edit"></i>
</button>
      <a href="{{ asset('admin/kategori_produk/delete/'.$kategori_produk->id_kategori_produk) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
      @include('admin/kategori_produk/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>