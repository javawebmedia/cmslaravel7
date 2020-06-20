<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berita_model extends Model
{

	protected $table 		= "berita";
	protected $primaryKey 	= 'id_berita';

     // listing
    public function semua()
    {
        $query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('berita.id_user',$id_user)
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('berita.judul_berita', 'LIKE', "%{$keywords}%") 
            ->orWhere('berita.isi', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'berita.id_kategori'    => $id_kategori))
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_berita($status_berita)
    {
        $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'berita.status_berita'         => $status_berita))
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function jenis_berita($jenis_berita)
    {
        $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'berita.jenis_berita'         => $jenis_berita))
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('berita.status_berita','Publish')
            ->orderBy('id_berita','DESC')
            ->paginate(10);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->orderBy('id_berita','DESC')
            ->limit(3)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_berita)
    {
        $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('berita.slug_berita',$slug_berita)
            ->orderBy('id_berita','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_berita)
    {
        $query = DB::table('berita')
             ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'berita.id_user','LEFT')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where('berita.id_berita',$id_berita)
            ->orderBy('id_berita','DESC')
            ->first();
        return $query;
    }
}
