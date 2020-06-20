<style>
#imagePreview {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<?php echo form_open_multipart(base_url('admin/konfigurasi/direktur')) ?>
<div class="row">
	<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
	
    <div class="col-md-6">
    <div class="form-group">
        <label>Nama Direktur</label>
        <input type="text" name="nama_direktur" class="form-control" value="<?php echo $site->nama_direktur ?>">
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?php echo $site->jabatan ?>">
    </div>
    <div class="form-group">
    	<label>Upload Gambar Stempel dan Tanda Tangan</label>
        <input type="file" name="stempel_tanda_tangan" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
    </div>
    
    <div class="col-md-6">
    	<label>Gambar Stempel dan Tanda Tangan Saat Ini</label><br>
        <img src="<?php echo base_url('assets/upload/image/'.$site->stempel_tanda_tangan) ?>" style="max-width:200px; height:auto;">
    </div>
    
    <div class="col-md-12">
	<input type="submit" name="submit" value="Update  Data Pejabat" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
</div>
</div>
</form>