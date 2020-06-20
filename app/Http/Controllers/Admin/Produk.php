<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Produk_model;

class Produk extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$produk = DB::table('produk')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('produk.*', 'kategori_produk.nama_kategori_produk', 'kategori_produk.slug_kategori_produk')
                    ->orderBy('produk.id_produk','DESC')
                    ->paginate(20);
		$kategori_produk 	= DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Produk',
						'produk'			=> $produk,
						'kategori_produk'	=> $kategori_produk,
                        'content'			=> 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $keywords           = $request->keywords;
        $produk             = $myproduk->cari($keywords);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->delete();
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['draft'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_produk' => 'Draft'
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diubah menjadi Draft']);
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'       => Session()->get('id_user'),
                        'status_produk' => 'Publish'
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data telah diubah menjadi Publish']);
        }elseif(isset($_POST['update'])) {
            $id_produknya       = $request->id_produk;
            for($i=0; $i < sizeof($id_produknya);$i++) {
                DB::table('produk')->where('id_produk',$id_produknya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_produk'    => $request->id_kategori_produk
                    ]);
            }
            return redirect('admin/produk')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_produk($status_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->status_produk($status_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->all_kategori_produk($id_kategori_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Tambah Produk',
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk           = new Produk_model();
        $produk             = $myproduk->detail($id_produk);
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Produk',
                        'produk'            => $produk,
                        'kategori_produk'   => $kategori_produk,
                        'content'           => 'admin/produk/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_produk'   => 'required|unique:produk',
                            'kode_produk'   => 'required|unique:produk',
                            'isi'           => 'required',
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
        $slug_nama_produk = str_slug($request->nama_produk, '-');
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
        DB::table('produk')->insert([
           'id_user'                => Session()->get('id_user'),
            'id_kategori_produk'    => $request->id_kategori_produk,
            'slug_produk'           => $slug_nama_produk,
            'kode_produk'           => strtoupper(str_replace(' ','',$request->kode_produk)),
            'nama_produk'           => $request->nama_produk,
            'status_produk'         => $request->status_produk,
            'satuan'                => $request->satuan,
            'urutan'                => $request->urutan,
            'deskripsi'             => $request->deskripsi,
            'isi'                   => $request->isi,
            'harga_jual'            => $request->harga_jual,
            'harga_beli'            => $request->harga_beli,
            'harga_terendah'        => $request->harga_terendah,
            'harga_tertinggi'       => $request->harga_tertinggi,
            'gambar'                => $input['nama_file'],
            'keywords'              => $request->keywords,
            'mulai_diskon'          => $mulai_diskon,
            'selesai_diskon'        => $selesai_diskon,
            'besar_diskon'          => $request->besar_diskon,
            'jenis_diskon'          => $request->jenis_diskon,
            'jumlah_order_min'      => $request->jumlah_order_min,
            'jumlah_order_max'      => $request->jumlah_order_max,
            'stok'                  => $request->stok,
            'berat'                 => $request->berat,
            'ukuran'                => $request->ukuran,
            'tanggal_post'          => date('Y-m-d H:i:s') 
        ]);
        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_produk'   => 'required',
                            'kode_produk'   => 'required',
                            'isi'           => 'required',
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
            $slug_nama_produk = str_slug($request->nama_produk, '-');
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
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'                => Session()->get('id_user'),
                'id_kategori_produk'    => $request->id_kategori_produk,
                'slug_produk'           => $slug_nama_produk,
                'kode_produk'           => strtoupper(str_replace(' ','',$request->kode_produk)),
                'nama_produk'           => $request->nama_produk,
                'status_produk'         => $request->status_produk,
                'satuan'                => $request->satuan,
                'urutan'                => $request->urutan,
                'deskripsi'             => $request->deskripsi,
                'isi'                   => $request->isi,
                'harga_jual'            => $request->harga_jual,
                'harga_beli'            => $request->harga_beli,
                'harga_terendah'        => $request->harga_terendah,
                'harga_tertinggi'       => $request->harga_tertinggi,
                'gambar'                => $input['nama_file'],
                'keywords'              => $request->keywords,
                'mulai_diskon'          => $mulai_diskon,
                'selesai_diskon'        => $selesai_diskon,
                'besar_diskon'          => $request->besar_diskon,
                'jenis_diskon'          => $request->jenis_diskon,
                'jumlah_order_min'      => $request->jumlah_order_min,
                'jumlah_order_max'      => $request->jumlah_order_max,
                'stok'                  => $request->stok,
                'berat'                 => $request->berat,
                'ukuran'                => $request->ukuran,
            ]);
        }else{
            $slug_nama_produk = str_slug($request->nama_produk, '-');
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
            DB::table('produk')->where('id_produk',$request->id_produk)->update([
                'id_user'                => Session()->get('id_user'),
                'id_kategori_produk'    => $request->id_kategori_produk,
                'slug_produk'           => $slug_nama_produk,
                'kode_produk'           => strtoupper(str_replace(' ','',$request->kode_produk)),
                'nama_produk'           => $request->nama_produk,
                'status_produk'         => $request->status_produk,
                'satuan'                => $request->satuan,
                'urutan'                => $request->urutan,
                'deskripsi'             => $request->deskripsi,
                'isi'                   => $request->isi,
                'harga_jual'            => $request->harga_jual,
                'harga_beli'            => $request->harga_beli,
                'harga_terendah'        => $request->harga_terendah,
                'harga_tertinggi'       => $request->harga_tertinggi,
                'keywords'              => $request->keywords,
                'mulai_diskon'          => $mulai_diskon,
                'selesai_diskon'        => $selesai_diskon,
                'besar_diskon'          => $request->besar_diskon,
                'jenis_diskon'          => $request->jenis_diskon,
                'jumlah_order_min'      => $request->jumlah_order_min,
                'jumlah_order_max'      => $request->jumlah_order_max,
                'stok'                  => $request->stok,
                'berat'                 => $request->berat,
                'ukuran'                => $request->ukuran,
            ]);
        }
        return redirect('admin/produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_produk)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('produk')->where('id_produk',$id_produk)->delete();
        return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
    }
}
