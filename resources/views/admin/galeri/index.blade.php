
<div class="row">

  <div class="col-md-6">
    <form action="{{ asset('admin/galeri/cari') }}" method="get" accept-charset="utf-8">
    <br>
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci pencarian galeri...." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-btn btn-flat">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
        <a href="{{ asset('admin/galeri/tambah') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru</a>
      </span>
    </div>
    </form>
  </div>
  <div class="col-md-6 text-left">
   
  </div>
</div>

<div class="clearfix"><hr></div>
<form action="{{ asset('admin/galeri/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<div class="row">
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-btn" >
        <button class="btn btn-danger btn-sm" type="submit" name="hapus" onClick="check();" >
          <i class="fa fa-trash"></i>
        </button> 
      </span>
      <select name="id_kategori_galeri" class="form-control form-control-sm">
        <?php foreach($kategori_galeri as $kategori_galeri) { ?>
          <option value="<?php echo $kategori_galeri->id_kategori_galeri ?>"><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
        <?php } ?>
      </select>
      <span class="input-group-btn" >
        <button type="submit" class="btn btn-info btn-sm btn-flat" name="update">Update</button> 
      </span>
    </div>
  </div>

  <div class="col-md-8">
    <div class="btn-group">
      

         <?php if(isset($pagin)) { echo $pagin; } ?>

        </div>
      </div>
    </div>
    <div class="clearfix"><hr></div>
    <div class="table-responsive mailbox-messages">
      <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr class="bg-info">
            <th width="5%" class="text-center">NO</th>
            <th width="8%">GAMBAR</th>
            <th width="20%">JUDUL</th>
            <th width="15%">KATEGORI</th>
            <th width="7%">JENIS</th>
            <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $i=1; foreach($galeri as $galeri) { ?>

            <tr class="odd gradeX">
              <td class="text-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="id_galeri[]" value="<?php echo $galeri->id_galeri ?>" id="check<?php echo $i ?>">
                  <label for="check<?php echo $i ?>"></label>
                </div>
              </td>

              <td><img src="{{ asset('public/upload/image/thumbs/'.$galeri->gambar) }}" class="img img-thumbnail img-fluid"></td>
              <td><?php echo $galeri->judul_galeri ?></td>
              <td><a href="{{ asset('admin/galeri/kategori/'.$galeri->id_kategori_galeri) }}"><?php echo $galeri->nama_kategori_galeri ?></a></td>
              <td><a href="{{ asset('admin/galeri/status_galeri/'.$galeri->jenis_galeri) }}">
                  <?php echo $galeri->jenis_galeri ?></a></td>
              <td>
                    <div class="btn-group">

                        <a href="{{ asset('admin/galeri/edit/'.$galeri->id_galeri) }}" 
                          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                          <a href="{{ asset('admin/galeri/delete/'.$galeri->id_galeri) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                        </div>
                        
                      </td>
                    </tr>

                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div>

              </form>

              <div class="clearfix"><hr></div>
              <div class="pull-right"><?php if(isset($pagin)) { echo $pagin; } ?></div>
