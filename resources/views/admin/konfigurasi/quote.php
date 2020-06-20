<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<script src="<?php echo base_url() ?>assets/fa-picker/dist/js/fontawesome-iconpicker.js"></script>

<?php echo form_open(base_url('admin/konfigurasi/quote')) ?>
<div class="row">
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

<div class="col-md-4">
	
    <hr>
	<div class="form-group">
    	<label>Judul quote 1</label>
        <input type="text" name="judul_1" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_1 ?>">
    </div>
	
	<div class="form-group">
    	<label>Isi quote 1</label>
       <textarea name="isi_1" class="form-control" placeholder="Isi quote 1"><?php echo $site->isi_1 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 1</label>
        <input type="url" name="link_1" class="form-control" placeholder="Link quote" value="<?php echo $site->link_1 ?>">
    </div>
    
    <hr>
	<div class="form-group">
    	<label>Judul quote 2</label>
        <input type="text" name="judul_2" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_2 ?>">
    </div>
    <div class="form-group">
    	<label>Isi quote 2</label>
       <textarea name="isi_2" class="form-control" placeholder="Isi quote 2"><?php echo $site->isi_2 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 2</label>
        <input type="url" name="link_2" class="form-control" placeholder="Link quote" value="<?php echo $site->link_2 ?>">
    </div>
    
    <hr>
	<div class="form-group">
    	<label>Judul quote 3</label>
        <input type="text" name="judul_3" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_3 ?>">
    </div>
    
    <div class="form-group">
    	<label>Isi quote 3</label>
        <textarea name="isi_3" class="form-control" placeholder="Isi quote 3"><?php echo $site->isi_3 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 3</label>
        <input type="url" name="link_3" class="form-control" placeholder="Link quote" value="<?php echo $site->link_3 ?>">
    </div>
</div>

<div class="col-md-4">    
    <hr>
	<div class="form-group">
    	<label>Judul quote 4</label>
        <input type="text" name="judul_4" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_4 ?>">
    </div>
    
    <div class="form-group">
    	<label>Isi quote 4</label>
       <textarea name="isi_4" class="form-control" placeholder="Isi quote 4"><?php echo $site->isi_4 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 4</label>
        <input type="url" name="link_4" class="form-control" placeholder="Link quote" value="<?php echo $site->link_4 ?>">
    </div>
    
    <hr>
	<div class="form-group">
    	<label>Judul quote 5</label>
        <input type="text" name="judul_5" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_5 ?>">
    </div>
    
    <div class="form-group">
    	<label>Isi quote 5</label>
        <textarea name="isi_5" class="form-control" placeholder="Isi quote 5"><?php echo $site->isi_5 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 5</label>
        <input type="url" name="link_5" class="form-control" placeholder="Link quote" value="<?php echo $site->link_5 ?>">
    </div>
    
    <hr>
	<div class="form-group">
    	<label>Judul quote 6</label>
        <input type="text" name="judul_6" class="form-control" placeholder="Judul quote" value="<?php echo $site->judul_6 ?>">
    </div>
    <div class="form-group">
    	<label>Isi quote 6</label>
        <textarea name="isi_6" class="form-control" placeholder="Isi quote 6"><?php echo $site->isi_6 ?></textarea>
        
    </div>
    
    <div class="form-group">
    	<label>Link quote 6</label>
        <input type="url" name="link_6" class="form-control" placeholder="Link quote" value="<?php echo $site->link_6 ?>">
    </div>
</div>

<div class="col-md-4">
<div class="col-md-12 lead text-center"><i class="fa fa-github fa-3x picker-target"></i></div>
	<div class="form-group">
    	<label>Icon Isi quote 1 (Current icon: <i class="<?php echo $site->pesan_1 ?> fa-2x"></i> <?php echo $site->pesan_1 ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_1" value="<?php echo $site->pesan_1 ?>" />
        
    </div>
    
    <div class="form-group">
    	<label>Icon Isi quote 2 (Current icon: <i class="<?php echo $site->pesan_2 ?> fa-2x"></i> <?php echo $site->pesan_2 ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_2" value="<?php echo $site->pesan_2 ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Isi quote 3 (Current icon: <i class="<?php echo $site->pesan_3 ?> fa-2x"></i> <?php echo $site->pesan_3 ?>)</label>
       	<input class="form-control icp icp-auto" type="text" name="pesan_3" value="<?php echo $site->pesan_3 ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Isi quote 4 (Current icon: <i class="<?php echo $site->pesan_4 ?> fa-2x"></i> <?php echo $site->pesan_4 ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_4" value="<?php echo $site->pesan_4 ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Isi quote 5 (Current icon: <i class="<?php echo $site->pesan_5 ?> fa-2x"></i> <?php echo $site->pesan_5 ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_5" value="<?php echo $site->pesan_5 ?>" />
    </div>
    
    <div class="form-group">
    	<label>Icon Isi quote 6 (Current icon: <i class="<?php echo $site->pesan_6 ?> fa-2x"></i> <?php echo $site->pesan_6 ?>)</label>
      	<input class="form-control icp icp-auto" type="text" name="pesan_6" value="<?php echo $site->pesan_6 ?>" />
    </div>
   
</div>

<div class="col-md-12 btn-group">
	<input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
    <input type="reset" name="reset" value="Reset" class="btn btn-warning ">
</div>

<div class="col-md-12">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</div>
</form>
<script>
    $(function() {      
        $('.icp-auto').on('click', function() {
            $('.icp-auto').iconpicker();
            
        }).trigger('click');


        // Events sample:
        // This event is only triggered when the actual input value is changed
        // by user interaction
        $('.icp').on('iconpickerSelected', function(e) {
            $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                    e.iconpickerInstance.options.iconBaseClass + ' ' +
                    e.iconpickerInstance.getValue(e.iconpickerValue);
        });
    });
</script>