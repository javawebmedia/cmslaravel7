<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Galeri_model;

class Galeri extends Controller
{
    // Main page
    public function index()
    {
        $galeri = DB::table('galeri')
                    ->join('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri','LEFT')
                    ->select('galeri.*', 'kategori_galeri.nama_kategori_galeri')
                    ->orderBy('galeri.id_galeri','DESC')
                    ->paginate(10);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  'title'		=> 'Galeri '.$site->namaweb,
						'deskripsi'	=> 'Galeri '.$site->namaweb,
						'keywords'	=> 'Galeri '.$site->namaweb,
						'galeris'	=> $galeri,
						'site'		=> $site,
                        'content'	=> 'galeri/index'
                    );
        return view('layout/wrapper',$data);
    }

     // detail
    public function detail($id_galeri)
    {
        $galeri = DB::table('galeri')
                    ->join('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri','LEFT')
                    ->select('galeri.*', 'kategori_galeri.nama_kategori_galeri')
                    ->where('galeri.id_galeri',$id_galeri)
                    ->orderBy('galeri.id_galeri','DESC')
                    ->first();
        $hits       = $galeri->hits+1;
        DB::table('galeri')->where('id_galeri',$galeri->id_galeri)->update([
            'hits'      => $hits
        ]);
        $data = array(  'title'		=> $galeri->judul_galeri,
						'deskripsi'	=> $galeri->judul_galeri,
						'keywords'	=> $galeri->judul_galeri,
						'galeris'	=> $galeri,
                        'content'	=> 'galeri/detail'
                    );
        return view('layout/wrapper',$data);
    }

}
