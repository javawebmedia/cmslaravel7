<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Download_model;

class Download extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mydownload 			= new Download_model();
		$download 			= $mydownload->semua();
		$kategori_download 	= DB::table('kategori_download')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Download',
						'download'			=> $download,
						'kategori_download'	=> $kategori_download,
                        'content'			=> 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $keywords           = $request->keywords;
        $download             = $mydownload->cari($keywords);
        $kategori_download    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Download',
                        'download'            => $download,
                        'kategori_download'   => $kategori_download,
                        'content'           => 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_downloadnya       = $request->id_download;
            for($i=0; $i < sizeof($id_downloadnya);$i++) {
                DB::table('download')->where('id_download',$id_downloadnya[$i])->delete();
            }
            return redirect('admin/download')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_downloadnya       = $request->id_download;
            for($i=0; $i < sizeof($id_downloadnya);$i++) {
                DB::table('download')->where('id_download',$id_downloadnya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_download'    => $request->id_kategori_download
                    ]);
            }
            return redirect('admin/download')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_download($status_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $download             = $mydownload->status_download($status_download);
        $kategori_download    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Download',
                        'download'            => $download,
                        'kategori_download'   => $kategori_download,
                        'content'           => 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $download             = $mydownload->all_kategori_download($id_kategori_download);
        $kategori_download    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Download',
                        'download'            => $download,
                        'kategori_download'   => $kategori_download,
                        'content'           => 'admin/download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_download    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Download',
                        'kategori_download'   => $kategori_download,
                        'content'           => 'admin/download/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Unduh
    public function unduh($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload = new Download_model();
        $download   = $mydownload->detail($id_download);
        $hits       = $download->hits+1;
        DB::table('download')->where('id_download',$download->id_download)->update([
            'hits'      => $hits
        ]);
        $pathToFile           = './public/upload/file/'.$download->gambar;
        return response()->download($pathToFile, $download->gambar);
    }

    // edit
    public function edit($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mydownload           = new Download_model();
        $download             = $mydownload->detail($id_download);
        $kategori_download    = DB::table('kategori_download')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Download',
                        'download'            => $download,
                        'kategori_download'   => $kategori_download,
                        'content'           => 'admin/download/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_download'  => 'required|unique:download',
                            'gambar'          => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/file/');
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('download')->insert([
            'id_kategori_download'  => $request->id_kategori_download,
            'id_user'               => Session()->get('id_user'),
            'judul_download'        => $request->judul_download,
            'jenis_download'        => $request->jenis_download,
            'isi'                   => $request->isi,
            'gambar'                => $input['nama_file'],
            'website'               => $request->website
        ]);
        return redirect('admin/download')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_download'    => 'required',
                            'gambar'            => 'file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/file/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('download')->where('id_download',$request->id_download)->update([
                'id_kategori_download'  => $request->id_kategori_download,
                'id_user'               => Session()->get('id_user'),
                'judul_download'        => $request->judul_download,
                'jenis_download'        => $request->jenis_download,
                'isi'                   => $request->isi,
                'gambar'                => $input['nama_file'],
                'website'               => $request->website
            ]);
        }else{
            DB::table('download')->where('id_download',$request->id_download)->update([
                'id_kategori_download'  => $request->id_kategori_download,
                'id_user'               => Session()->get('id_user'),
                'judul_download'        => $request->judul_download,
                'jenis_download'        => $request->jenis_download,
                'isi'                   => $request->isi,
                'website'               => $request->website
            ]);
        }
        return redirect('admin/download')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_download)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('download')->where('id_download',$id_download)->delete();
        return redirect('admin/download')->with(['sukses' => 'Data telah dihapus']);
    }
}
