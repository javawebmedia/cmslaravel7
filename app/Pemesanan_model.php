<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan_model extends Model
{

    // kode_transaksi
    public function semua($token_transaksi)
    {
        $query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->orderBy('id_produk','DESC')
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
            ->orderBy('id_produk','DESC')
            ->get();
        return $query;
    }

    // nomor_akhir
    public function nomor_akhir()
    {
    	$query = DB::table('pemesanan')
            ->select('*')
            ->orderBy('id_pemesanan','DESC')
            ->first();
        return $query;
    }

    // nomor_akhir
    public function nomor_akhir_tanggal($tanggal_order)
    {
        $query = DB::table('pemesanan')
            ->select('*')
            ->where('tanggal_order',$tanggal_order)
            ->orderBy('id_pemesanan','DESC')
            ->first();
        return $query;
    }

    // kode_transaksi
    public function token_transaksi($token_transaksi)
    {
    	$query = DB::table('pemesanan')
            ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk')
            ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
            ->where('pemesanan.token_transaksi',$token_transaksi)
            ->orderBy('id_produk','DESC')
            ->first();
        return $query;
    }
}
