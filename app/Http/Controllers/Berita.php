<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Berita_model;

class Berita extends Controller
{
    // Beritapage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Beritapage')->orderBy('id_galeri', 'DESC')->first();
    	// $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
    	$model 	= new Berita_model();
		$berita = $model->listing();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'beritas'	=> $berita,
                        'content'   => 'berita/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function read($slug_berita)
    {
        $site   = DB::table('konfigurasi')->first();
        $slider = DB::table('galeri')->where('jenis_galeri','Beritapage')->orderBy('id_galeri', 'DESC')->first();
        // $berita = DB::table('berita')->where('status_berita','Publish')->orderBy('id_berita', 'DESC')->get();
        $model  = new Berita_model();
        $berita = $model->read($slug_berita);

        $data = array(  'title'     => $berita->judul_berita,
                        'deskripsi' => $berita->judul_berita,
                        'keywords'  => $berita->judul_berita,
                        'slider'    => $slider,
                        'site'      => $site,
                        'berita'    => $berita,
                        'content'   => 'berita/read'
                    );
        return view('layout/wrapper',$data);
    }
}