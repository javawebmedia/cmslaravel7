<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Download_model;

class Download extends Controller
{
    // Main page
    public function index()
    {
        $download = DB::table('download')
                    ->join('kategori_download', 'kategori_download.id_kategori_download', '=', 'download.id_kategori_download','LEFT')
                    ->select('download.*', 'kategori_download.nama_kategori_download')
                    ->orderBy('download.id_download','DESC')
                    ->paginate(10);

		$data = array(  'title'		=> 'Data Unduhan File',
						'deskripsi'	=> 'Data Unduhan File',
						'keywords'	=> 'Data Unduhan File',
						'downloads'	=> $download,
                        'content'	=> 'download/index'
                    );
        return view('layout/wrapper',$data);
    }

     // Unduh
    public function unduh($id_download)
    {
        $mydownload = new Download_model();
        $download   = $mydownload->detail($id_download);
        $hits       = $download->hits+1;
        DB::table('download')->where('id_download',$download->id_download)->update([
            'hits'      => $hits
        ]);
        $pathToFile           = './public/upload/file/'.$download->gambar;
        return response()->download($pathToFile, $download->gambar);
    }

}
