<div class="card border-left-primary shadow h-100 py-2">
  <div class="card-body">
    <div class="row no-gutters align-items-center">
      <div class="col mr-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Terdapat <span class="text-danger"><?php echo number_format($total->total) ?></span> Aktivitas</div>
        <div class="h5 mb-0 font-weight-bold text-gray-800">Berikut data aktivitas Anda sampai hari ini: <?php echo $this->website->hari_bulan(date('Y-m-d H:i:s')) ?></div>
      </div>
      <div class="col-auto">
        <i class="fas fa-calendar fa-2x text-gray-300"></i>
      </div>
    </div>
  </div>
</div>
<p class="col-md-12 text-right">
  <?php if(isset($pagin)) { echo $pagin; } ?>
</p>
<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">TANGGAL</th>
    <th width="10%">IP ADDRESS</th>
    <th width="45%">HALAMAN</th>
    
</tr>
</thead>
<tbody>

<?php $i=1; foreach($user_log as $user_log) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $this->website->hari_bulan($user_log->tanggal); ?></td>
    <td><?php if($user_log->ip_address=='::1') { echo '127.0.0.1/localhost'; }else{ echo $user_log->ip_address; } ?></td>
    <td><?php echo $user_log->url ?></td>
    
</tr>

<?php $i++; } ?>

</tbody>
</table>
<p class="col-md-12">
  <?php if(isset($pagin)) { echo $pagin; } ?>
</p>