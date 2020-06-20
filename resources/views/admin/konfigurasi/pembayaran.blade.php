<style>
#imagePreview {
    width: 100px;
    height: 100px;
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/konfigurasi/proses_pembayaran') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">
	<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
	
    <div class="col-md-4">
        <div class="form-group">
            <label><h4>Gambar yang sudah diupload</h4></label><br>
            <img src="{{ asset('public/upload/image/'.$site->gambar_pembayaran) }}" class="img img-thumbnail img-fluid">
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="form-group">
            <label>Upload gambar baru</label>
            <input type="file" name="gambar_pembayaran" class="form-control" id="file">
            <div id="imagePreview"></div>
        </div>
        <div class="form-group">
            <label>Judul Informasi Pembayaran</label>
            <input type="text" name="judul_pembayaran" class="form-control" value="<?php echo $site->judul_pembayaran ?>">
        </div>

        <div class="form-group">
            <label>Informasi Lengkap Pembayaran</label>
            <textarea name="isi_pembayaran" class="form-control konten"><?php echo $site->isi_pembayaran ?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Update Informasi Pembayaran" class="btn btn-primary">
            <input type="reset" name="reset" value="Reset" class="btn btn-primary">
        </div>      
    </div>
    
</div>
</form>