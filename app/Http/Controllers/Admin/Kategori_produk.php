<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class Kategori_produk extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_produk 	= DB::table('kategori_produk')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Produk',
						'kategori_produk'	=> $kategori_produk,
                        'content'           => 'admin/kategori_produk/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_produk' => 'required|unique:kategori_produk',
					        'urutan' 		       => 'required',
                            'gambar'               => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
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
    	$slug_kategori_produk = str_slug($request->nama_kategori_produk, '-');
        DB::table('kategori_produk')->insert([
            'nama_kategori_produk'  => $request->nama_kategori_produk,
            'slug_kategori_produk'	=> $slug_kategori_produk,
            'urutan'   		        => $request->urutan,
            'keterangan'            => $request->keterangan,
            'gambar'                => $input['nama_file']
        ]);
        return redirect('admin/kategori_produk')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_produk' => 'required',
					        'urutan'               => 'required',
                            'gambar'               => 'file|image|mimes:jpeg,png,jpg|max:2048',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            // UPLOAD START
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
            $slug_kategori_produk = str_slug($request->nama_kategori_produk, '-');
            DB::table('kategori_produk')->where('id_kategori_produk',$request->id_kategori_produk)->update([
                'nama_kategori_produk'  => $request->nama_kategori_produk,
                'slug_kategori_produk'  => $slug_kategori_produk,
                'urutan'                => $request->urutan,
                'keterangan'            => $request->keterangan,
                'gambar'                => $input['nama_file']
            ]);
        }else{
            $slug_kategori_produk = str_slug($request->nama_kategori_produk, '-');
            DB::table('kategori_produk')->where('id_kategori_produk',$request->id_kategori_produk)->update([
                'nama_kategori_produk'  => $request->nama_kategori_produk,
                'slug_kategori_produk'  => $slug_kategori_produk,
                'urutan'                => $request->urutan,
                'keterangan'            => $request->keterangan
            ]);
        }
        return redirect('admin/kategori_produk')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_produk)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_produk')->where('id_kategori_produk',$id_kategori_produk)->delete();
    	return redirect('admin/kategori_produk')->with(['sukses' => 'Data telah dihapus']);
    }
}
