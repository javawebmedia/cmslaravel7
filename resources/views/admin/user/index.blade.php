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
  @include('admin/user/tambah')
</p>
<form action="{{ asset('admin/user/proses') }}" method="post" accept-charset="utf-8">
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
        <th width="5%">NO</th>
        <th width="10%">GAMBAR</th>
        <th width="20%">NAMA</th>
        <th width="20%">EMAIL</th>
        <th width="20%">USERNAME</th>
        <th width="10%">LEVEL</th>
        <th>ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($user as $user) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_user[]" value="<?php echo $user->id_user ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
        <small class="text-center"><?php echo $i ?></small>
    </td>
      <td class="text-center">
        <?php if($user->gambar != "") { ?>
            <img src="{{ asset('public/upload/user/thumbs/'.$user->gambar) }}" class="img img-fluid img-thumbnail">
        <?php }else{ echo '<small class="btn btn-sm btn-warning">Tidak ada</small>'; } ?>
    </td>

    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->akses_level ?></td>
    <td>
        <div class="btn-group">
        <a href="{{ asset('admin/user/edit/'.$user->id_user) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="{{ asset('admin/user/delete/'.$user->id_user) }}" class="btn btn-danger btn-sm  delete-link">
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