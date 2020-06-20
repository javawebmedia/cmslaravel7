@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
  @include('admin/rekening/tambah')
</p>
<form action="{{ asset('admin/rekening/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">

  <div class="col-md-12">
    <div class="btn-group">
      <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
      </button> 
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
   </div>
</div>
</div>

<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
    <div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-info">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th>GAMBAR</th>
    <th>NAMA BANK</th>
    <th>NOMOR REKENING</th>
    <th>ATAS NAMA</th>
    <th>URUTAN</th>
    <th>ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($rekening as $rekening) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_rekening[]" value="<?php echo $rekening->id_rekening ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
      <td>
        <?php if($rekening->gambar != "") { ?>
            <img src="{{ asset('public/upload/image/thumbs/'.$rekening->gambar) }}" width="60" class="img img-responsive">
        <?php }else{ echo 'Tidak ada'; } ?>
    </td>

    <td><?php echo $rekening->nama_bank ?></td>
    <td><?php echo $rekening->nomor_rekening ?></td>
    <td><?php echo $rekening->atas_nama ?></td>
    <td><?php echo $rekening->urutan ?></td>
    <td>
        <div class="btn-group">
        <a href="{{ asset('admin/rekening/edit/'.$rekening->id_rekening) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="{{ asset('admin/rekening/delete/'.$rekening->id_rekening) }}" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i></a>
        </div>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
</form>