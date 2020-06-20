<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Konfigurasi_model;
use Image;
use App\Pemesanan_model;
use App\Produk_model;
use PDF;

class Dasbor extends Controller
{


    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();
        $status_pemesanan = 'Menunggu';
        $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->where('pemesanan.status_pemesanan',$status_pemesanan)
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(10);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $menunggu   = DB::table('pemesanan')->where('status_pemesanan','Menunggu')->sum('total_harga');
        $Konfirmasi   = DB::table('pemesanan')->where('status_pemesanan','Konfirmasi')->sum('total_harga');
        $Dikirim   = DB::table('pemesanan')->where('status_pemesanan','Dikirim')->sum('total_harga');
        $Selesai   = DB::table('pemesanan')->where('status_pemesanan','Selesai')->sum('total_harga');

		$data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'pemesanan' => $pemesanan,
                        'kategori'  => $kategori,
                        'menunggu'  => $menunggu,
                        'Konfirmasi'=> $Konfirmasi,
                        'Dikirim'=> $Dikirim,
                        'Selesai'=> $Selesai,
                        'content'   => 'admin/dasbor/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
