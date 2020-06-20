<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class Rekening extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$rekening 	= DB::table('rekening')->orderBy('urutan','ASC')->get();

		$data = array(  'title'     => 'Data Rekening',
						'rekening'	=> $rekening,
                        'content'           => 'admin/rekening/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id_rekening)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $rekening   = DB::table('rekening')->where('id_rekening',$id_rekening)->orderBy('urutan','ASC')->first();

        $data = array(  'title'     => 'Edit Data Rekening',
                        'rekening'  => $rekening,
                        'content'   => 'admin/rekening/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_rekeningnya       = $request->id_rekening;
            for($i=0; $i < sizeof($id_rekeningnya);$i++) {
                DB::table('rekening')->where('id_rekening',$id_rekeningnya[$i])->delete();
            }
            return redirect('admin/rekening')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama_bank' => 'required|unique:rekening',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:2048',
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
            DB::table('rekening')->insert([
                'nama_bank'         => $request->nama_bank,
                'nomor_rekening'    => $request->nomor_rekening,
                'atas_nama'         => $request->atas_nama,
                'urutan'            => $request->urutan,
                'gambar'            => $input['nama_file']
            ]);
        }else{
            DB::table('rekening')->insert([
                'nama_bank'         => $request->nama_bank,
                'nomor_rekening'    => $request->nomor_rekening,
                'atas_nama'         => $request->atas_nama,
                'urutan'            => $request->urutan
            ]);
        }
        return redirect('admin/rekening')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					       'nama_bank' => 'required',
                            'gambar'    => 'file|image|mimes:jpeg,png,jpg|max:2048',
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
            DB::table('rekening')->where('id_rekening',$request->id_rekening)->update([
                'nama_bank'         => $request->nama_bank,
                'nomor_rekening'    => $request->nomor_rekening,
                'atas_nama'         => $request->atas_nama,
                'urutan'            => $request->urutan,
                'gambar'            => $input['nama_file']
            ]);
        }else{
            DB::table('rekening')->where('id_rekening',$request->id_rekening)->update([
                'nama_bank'         => $request->nama_bank,
                'nomor_rekening'    => $request->nomor_rekening,
                'atas_nama'         => $request->atas_nama,
                'urutan'            => $request->urutan,
            ]);
        }
        return redirect('admin/rekening')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_rekening)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('rekening')->where('id_rekening',$id_rekening)->delete();
    	return redirect('admin/rekening')->with(['sukses' => 'Data telah dihapus']);
    }
}
