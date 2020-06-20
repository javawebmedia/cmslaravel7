<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class User extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$user 	= DB::table('users')->orderBy('id_user','DESC')->get();

		$data = array(  'title'     => 'Pengguna Website',
						'user'      => $user,
                        'content'   => 'admin/user/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Index
    public function edit($id_user)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $user   = DB::table('users')->where('id_user',$id_user)->orderBy('id_user','DESC')->first();

        $data = array(  'title'     => 'Edit Pengguna Website',
                        'user'      => $user,
                        'content'   => 'admin/user/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_usernya       = $request->id_user;
            for($i=0; $i < sizeof($id_usernya);$i++) {
                DB::table('users')->where('id_user',$id_usernya[$i])->delete();
            }
            return redirect('admin/user')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
                            'nama'     => 'required',
					        'username' => 'required|unique:users',
					        'password' => 'required',
                            'email'    => 'required',
                            'gambar'   => 'file|image|mimes:jpeg,png,jpg|max:2048',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = public_path('upload/user/thumbs/');
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = public_path('upload/user/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            DB::table('users')->insert([
                'nama'          => $request->nama,
                'email'	        => $request->email,
                'username'   	=> $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level,
                'gambar'        => $input['nama_file']
            ]);
        }else{
             DB::table('users')->insert([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level
            ]);
        }
        return redirect('admin/user')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'nama'     => 'required',
                            'username' => 'required',
                            'password' => 'required',
                            'email'    => 'required',
                            'gambar'   => 'file|image|mimes:jpeg,png,jpg|max:2048',
					        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            // UPLOAD START
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = str_slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath        = public_path('upload/user/thumbs/');
            $img = Image::make($image->getRealPath(),array(
                'width'     => 150,
                'height'    => 150,
                'grayscale' => false
            ));
            $img->save($destinationPath.'/'.$input['nama_file']);
            $destinationPath = public_path('upload/user/');
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD
            $slug_user = str_slug($request->nama, '-');
            DB::table('users')->where('id_user',$request->id_user)->update([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level,
                'gambar'        => $input['nama_file']
            ]);
        }else{
            $slug_user = str_slug($request->nama, '-');
            DB::table('users')->where('id_user',$request->id_user)->update([
                'nama'          => $request->nama,
                'email'         => $request->email,
                'username'      => $request->username,
                'password'      => sha1($request->password),
                'akses_level'   => $request->akses_level
            ]);
        }
        return redirect('admin/user')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_user)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('users')->where('id_user',$id_user)->delete();
    	return redirect('admin/user')->with(['sukses' => 'Data telah dihapus']);
    }
}
