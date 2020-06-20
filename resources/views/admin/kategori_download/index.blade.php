<p>
@include('admin/kategori_download/tambah')
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

<?php $i=1; foreach($kategori_download as $kategori_download) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_download->nama_kategori_download ?></td>
    <td><?php echo $kategori_download->slug_kategori_download ?></td>
    <td><?php echo $kategori_download->urutan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_download->id_kategori_download ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_download/delete/'.$kategori_download->id_kategori_download) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_download/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>