<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Galeri_model;

class Galeri extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mygaleri 			= new Galeri_model();
		$galeri 			= $mygaleri->semua();
		$kategori_galeri 	= DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Galeri',
						'galeri'			=> $galeri,
						'kategori_galeri'	=> $kategori_galeri,
                        'content'			=> 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $keywords           = $request->keywords;
        $galeri             = $mygaleri->cari($keywords);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_galerinya       = $request->id_galeri;
            for($i=0; $i < sizeof($id_galerinya);$i++) {
                DB::table('galeri')->where('id_galeri',$id_galerinya[$i])->delete();
            }
            return redirect('admin/galeri')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_galerinya       = $request->id_galeri;
            for($i=0; $i < sizeof($id_galerinya);$i++) {
                DB::table('galeri')->where('id_galeri',$id_galerinya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_galeri'    => $request->id_kategori_galeri
                    ]);
            }
            return redirect('admin/galeri')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_galeri($status_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->status_galeri($status_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->all_kategori_galeri($id_kategori_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Galeri',
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mygaleri           = new Galeri_model();
        $galeri             = $mygaleri->detail($id_galeri);
        $kategori_galeri    = DB::table('kategori_galeri')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Galeri',
                        'galeri'            => $galeri,
                        'kategori_galeri'   => $kategori_galeri,
                        'content'           => 'admin/galeri/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_galeri'  => 'required|unique:galeri',
                            'gambar'        => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath        = public_path('upload/image/thumbs/');
        $img = Image::make($image->getRealPath(),array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$input['nama_file']);
        $destinationPath = public_path('upload/image/');
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        $slug_nama_galeri = str_slug($request->nama_galeri, '-');
        if($request->mulai_diskon=='') {
            $mulai_diskon = NULL;
        }else{ 
            $mulai_diskon = date('Y-m-d',strtotime($request->mulai_diskon)); 
        }
        if($request->selesai_diskon=='') {
            $selesai_diskon = NULL;
        }else{ 
            $selesai_diskon = date('Y-m-d',strtotime($request->selesai_diskon)); 
        }
        DB::table('galeri')->insert([
            'id_user'               => Session()->get('id_user'),
            'id_kategori_galeri'    => $request->id_kategori_galeri,
            'id_user'               => Session()->get('id_user'),
            'judul_galeri'          => $request->judul_galeri,
            'isi'                   => $request->isi,
            'jenis_galeri'          => $request->jenis_galeri,
            'gambar'                => $input['nama_file'],
            'website'               => $request->website,
            'status_text'           => $request->status_text,
            'urutan'                => $request->urutan
        ]);
        return redirect('admin/galeri')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'judul_galeri'  => 'required',
                            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = public_path('upload/image/thumbs/');
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = public_path('upload/image/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_nama_galeri = str_slug($request->nama_galeri, '-');
            if($request->mulai_diskon=='') {
                $mulai_diskon = NULL;
            }else{ 
                $mulai_diskon = date('Y-m-d',strtotime($request->mulai_diskon)); 
            }
            if($request->selesai_diskon=='') {
                $selesai_diskon = NULL;
            }else{ 
                $selesai_diskon = date('Y-m-d',strtotime($request->selesai_diskon)); 
            }
            DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
                'id_user'               => Session()->get('id_user'),
                'id_kategori_galeri'    => $request->id_kategori_galeri,
                'id_user'               => Session()->get('id_user'),
                'judul_galeri'          => $request->judul_galeri,
                'isi'                   => $request->isi,
                'jenis_galeri'          => $request->jenis_galeri,
                'gambar'                => $input['nama_file'],
                'website'               => $request->website,
                'status_text'           => $request->status_text,
                'urutan'                => $request->urutan
            ]);
        }else{
            $slug_nama_galeri = str_slug($request->nama_galeri, '-');
            if($request->mulai_diskon=='') {
                $mulai_diskon = NULL;
            }else{ 
                $mulai_diskon = date('Y-m-d',strtotime($request->mulai_diskon)); 
            }
            if($request->selesai_diskon=='') {
                $selesai_diskon = NULL;
            }else{ 
                $selesai_diskon = date('Y-m-d',strtotime($request->selesai_diskon)); 
            }
            DB::table('galeri')->where('id_galeri',$request->id_galeri)->update([
                'id_user'               => Session()->get('id_user'),
                'id_kategori_galeri'    => $request->id_kategori_galeri,
                'id_user'               => Session()->get('id_user'),
                'judul_galeri'          => $request->judul_galeri,
                'isi'                   => $request->isi,
                'jenis_galeri'          => $request->jenis_galeri,
                'website'               => $request->website,
                'status_text'           => $request->status_text,
                'urutan'                => $request->urutan
            ]);
        }
        return redirect('admin/galeri')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_galeri)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('galeri')->where('id_galeri',$id_galeri)->delete();
        return redirect('admin/galeri')->with(['sukses' => 'Data telah dihapus']);
    }
}
