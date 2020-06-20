<?php 
if(Session()->get('username')=="") {
    return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
}
?>
@include('admin/layout/head')
@include('admin/layout/header')
@include('admin/layout/menu')
@include($content)
@include('admin/layout/footer')