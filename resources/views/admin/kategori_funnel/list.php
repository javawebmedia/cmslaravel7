<p>
  <?php include('tambah.php') ?>
</p>
<?php
echo form_open(base_url('admin/kategori_funnel/proses'));
?>
<div class="row">

  <div class="col-md-12">
    <div class="btn-group">
        <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
      </button> 
      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
      <?php 
      $url_navigasi = $this->uri->segment(2); 
      if($this->uri->segment(3) != "") { 
         ?>
         <a href="<?php echo base_url('admin/'.$url_navigasi) ?>" class="btn btn-success ">
           <small ><i class="fa fa-arrow-circle-left"></i> Kembali</small></a>
       <?php } ?>
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
    <th>NAMA</th>
    <th>KONTEN FUNNEL</th>
    <th>SLUG</th>
    <th>URUTAN</th>
    <th>ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($kategori_funnel as $kategori_funnel) { ?>

        <td class="text-center">
        <div class="icheck-primary">
                  <input type="checkbox" class="icheckbox_flat-blue " name="id_kategori_funnel[]" value="<?php echo $kategori_funnel->id_kategori_funnel ?>" id="check<?php echo $i ?>">
                   <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
      <td>
        <?php if($kategori_funnel->gambar != "") { ?>
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$kategori_funnel->gambar) ?>" width="60" class="img img-responsive">
        <?php }else{ echo 'Tidak ada'; } ?>
    </td>

    <td><?php echo $kategori_funnel->nama_kategori_funnel ?></td>
    <td><?php echo $kategori_funnel->total ?> Funnel</td>
    <td><?php echo $kategori_funnel->slug_kategori_funnel ?></td>
    <td><?php echo $kategori_funnel->urutan ?></td>
    <td>
        <div class="btn-group">
        <a href="<?php echo base_url('admin/kategori_funnel/edit/'.$kategori_funnel->id_kategori_funnel) ?>" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="<?php echo base_url('admin/kategori_funnel/delete/'.$kategori_funnel->id_kategori_funnel) ?>" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i></a>
        </div>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
<?php echo form_close(); ?>