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


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/konfigurasi/proses_gambar') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">
    <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">
    
    <div class="col-md-6">
    <div class="form-group">
        <label>Upload a new gambar</label>
        <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
    </div>
    
    <div class="col-md-6 alert alert-success">
        <label>Your current gambar</label><br>
        <img src="{{ asset('public/upload/image/'.$site->gambar) }}" style="max-width:200px; height:auto;">
    </div>
    
    <div class="col-md-12">
    <input type="submit" name="submit" value="Simpan Gambar Baru" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>
</div>
</form>