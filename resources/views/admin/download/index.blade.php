<form action="{{ asset('admin/download/proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<p class="btn-group">
  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <a href="{{ asset('admin/download/tambah') }}" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah File</a>
  
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th width="10%">UNDUH</th>
    <th width="25%">JUDUL</th>
    <th width="30%">KATEGORI - POSISI</th>
    <th width="5%">HITS</th>
    <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($download as $download) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_download[]" value="<?php echo $download->id_download ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
      <a href="{{ asset('admin/download/unduh/'.$download->id_download) }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> Download</a>
    </td>
    <td><?php echo $download->judul_download ?>
      
      <br><small>
      Link:<br> 
      <textarea name="aa" class="form-control">{{ asset('download/unduh/'.$download->id_download) }}</textarea>
      </small>

    </td>
    <td><?php echo $download->nama_kategori_download ?> - <?php echo $download->jenis_download ?>
      <small>
        <br><?php echo $download->isi ?>
      </small>
    </td>
    <td class="text-center"><?php echo $download->hits ?> Hits</td>
    <td>
      <div class="btn-group">
        <a href="{{ asset('admin/download/edit/'.$download->id_download) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="{{ asset('admin/download/delete/'.$download->id_download) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>

</form>