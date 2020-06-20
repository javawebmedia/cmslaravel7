<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User_model;

class Login extends Controller
{
    // Homepage
    public function index()
    {
        $data = array(  'title'     => 'Login - Java Web Media');
        return view('login/index',$data);
    }

    // Cek
    public function cek(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $model      = new User_model();
        $user       = $model->login($username,$password);
        if($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('nama', $user->nama);
            $request->session()->put('username', $user->username);
            $request->session()->put('akses_level', $user->akses_level);
            return redirect('admin/dasbor')->with(['sukses' => 'Anda berhasil login']);
        }else{
            return redirect('login')->with(['warning' => 'Mohon maaf, Username atau password salah']);
        }
    }

    // Homepage
    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('username');
        Session()->forget('akses_level');
        return redirect('login')->with(['sukses' => 'Anda berhasil logout']);
    }

    // Homepage
    public function lupa()
    {
        $data = array(  'title'     => 'Login - Java Web Media');
        return view('login/lupa',$data);
    }
}