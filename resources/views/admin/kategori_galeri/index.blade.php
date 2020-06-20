<p>
@include('admin/kategori_galeri/tambah')
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

<?php $i=1; foreach($kategori_galeri as $kategori_galeri) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_galeri->nama_kategori_galeri ?></td>
    <td><?php echo $kategori_galeri->slug_kategori_galeri ?></td>
    <td><?php echo $kategori_galeri->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_galeri->id_kategori_galeri ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_galeri/delete/'.$kategori_galeri->id_kategori_galeri) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_galeri/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>