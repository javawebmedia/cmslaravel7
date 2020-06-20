
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><div class="alert alert-success">','</div></div>'); 
?>

<?php echo form_open(base_url('admin/konfigurasi/prolog')) ?>
<div class="row">
<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

<div class="col-md-12">

 <div class="form-group">
    <label>Prolog Topik Prioritas</label>
    <textarea name="prolog_topik" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_topik ?></textarea>
</div>

 <div class="form-group">
    <label>Prolog Program Regular Sekretariat</label>
    <textarea name="prolog_program" rows="3" class="form-control kontenku" placeholder="Prolog Program Regular Sekretariat"><?php echo $site->prolog_program ?></textarea>
</div>

 <div class="form-group">
    <label>Prolog Dukungan Sekretariat</label>
    <textarea name="prolog_sekretariat" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_sekretariat ?></textarea>
</div>

 <div class="form-group">
    <label>Prolog Aksi Lestari</label>
    <textarea name="prolog_aksi" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_aksi ?></textarea>
</div>

 <div class="form-group">
    <label>Prolog Sebaran Inisiatif</label>
    <textarea name="prolog_sebaran" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_sebaran ?></textarea>
</div>

<div class="form-group">
    <label>Prolog Pusat Kolaborasi</label>
    <textarea name="prolog_kolaborasi" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_kolaborasi ?></textarea>
</div>

<div class="form-group">
    <label>Prolog Cara Mendatang</label>
    <textarea name="prolog_agenda" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_agenda ?></textarea>
</div>

<div class="form-group">
    <label>Prolog Info dan Wawasan</label>
    <textarea name="prolog_wawasan" rows="3" class="form-control kontenku" placeholder="Summary of the company"><?php echo $site->prolog_wawasan ?></textarea>
</div>

<div class="form-group btn-group">
    <input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary ">
</div>

</div>


</div>
<?php echo form_close(); ?>

