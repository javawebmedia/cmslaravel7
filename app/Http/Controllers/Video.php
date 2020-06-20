<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Video_model;

class Video extends Controller
{
    // Main page
    public function index()
    {
        $video = DB::table('video')
                    ->select('*')
                    ->orderBy('id_video','DESC')
                    ->paginate(10);
       	$site 	= DB::table('konfigurasi')->first();

		$data = array(  'title'		=> 'Video '.$site->namaweb,
						'deskripsi'	=> 'Video '.$site->namaweb,
						'keywords'	=> 'Video '.$site->namaweb,
						'videos'	=> $video,
						'site'		=> $site,
                        'content'	=> 'video/index'
                    );
        return view('layout/wrapper',$data);
    }

     // detail
    public function detail($id_video)
    {
        $video = DB::table('video')
                    ->join('kategori_video', 'kategori_video.id_kategori_video', '=', 'video.id_kategori_video','LEFT')
                    ->select('video.*', 'kategori_video.nama_kategori_video')
                    ->where('video.id_video',$id_video)
                    ->orderBy('video.id_video','DESC')
                    ->first();
        $hits       = $video->hits+1;
        DB::table('video')->where('id_video',$video->id_video)->update([
            'hits'      => $hits
        ]);
        $data = array(  'title'		=> $video->judul_video,
						'deskripsi'	=> $video->judul_video,
						'keywords'	=> $video->judul_video,
						'videos'	=> $video,
                        'content'	=> 'video/detail'
                    );
        return view('layout/wrapper',$data);
    }

}
