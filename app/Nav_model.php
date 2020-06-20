<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nav_model extends Model
{

    // Main page
    public function nav_produk()
    {
    	$query = DB::table('produk')
            ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->select('produk.*', 'kategori_produk.slug_kategori_produk', 'kategori_produk.nama_kategori_produk')
            ->groupBy('kategori_produk.id_kategori_produk')
            ->orderBy('produk.id_produk','DESC')
            ->get();
        return $query;
    }

     // kode_transaksi
    public function status_pemesanan($status_pemesanan)
    {
        $query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->where('pemesanan.status_pemesanan',$status_pemesanan)
            ->orderBy('pemesanan.id_pemesanan','DESC')
            ->get();
        return $query;
    }

    // Main page
    public function nav_profil()
    {
    	$query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(	'berita.status_berita'	=> 'Publish',
                            'berita.jenis_berita'  => 'Profil'))
            ->groupBy('kategori.id_kategori')
            ->orderBy('berita.id_berita','DESC')
            ->get();
        return $query;
    }
}
