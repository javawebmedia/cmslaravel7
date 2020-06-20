<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_download extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_download 	= DB::table('kategori_download')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori Download',
						'kategori_download'	=> $kategori_download,
                        'content'           => 'admin/kategori_download/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_download' => 'required|unique:kategori_download',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_download = str_slug($request->nama_kategori_download, '-');
        DB::table('kategori_download')->insert([
            'nama_kategori_download'  => $request->nama_kategori_download,
            'slug_kategori_download'	=> $slug_kategori_download,
            'urutan'   		        => $request->urutan
        ]);
        return redirect('admin/kategori_download')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_kategori_download' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_download = str_slug($request->nama_kategori_download, '-');
        DB::table('kategori_download')->where('id_kategori_download',$request->id_kategori_download)->update([
            'nama_kategori_download'  => $request->nama_kategori_download,
            'slug_kategori_download'	=> $slug_kategori_download,
            'urutan'                => $request->urutan
        ]);
        return redirect('admin/kategori_download')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_download)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_download')->where('id_kategori_download',$id_kategori_download)->delete();
    	return redirect('admin/kategori_download')->with(['sukses' => 'Data telah dihapus']);
    }
}
