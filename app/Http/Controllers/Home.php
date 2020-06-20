<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Produk_model;
use App\Rekening_model;
use App\Berita_model;
use App\Pemesanan_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('galeri')->where('jenis_galeri','Homepage')->limit(5)->orderBy('id_galeri', 'DESC')->get();
    	$model 	= new Produk_model();
		$produks = $model->listing();
        $news   = new Berita_model();
        $berita = $news->home();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'produks'	=> $produks,
                        'berita'    => $berita,
                        'content'   => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site   = DB::table('konfigurasi')->first();
        $model  = new Produk_model();
        $produk = $model->listing();

        $data = array(  'title'     => 'Kontak Kami: '.$site->namaweb.' - '.$site->tagline,
                        'deskripsi' => 'Kontak '.$site->namaweb,
                        'keywords'  => 'Kontak '.$site->namaweb,
                        'site'      => $site,
                        'produk'    => $produk,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

    // pemesanan
    public function pemesanan()
    {
        $site   = DB::table('konfigurasi')->first();
        $model  = new Produk_model();
        $produk = $model->listing();
        
        $data = array(  'title'     => 'Formulir Pemesanan',
                        'deskripsi' => 'Formulir Pemesanan',
                        'keywords'  => 'Formulir Pemesanan',
                        'site'      => $site,
                        'produk'    => $produk,
                        'content'   => 'home/pemesanan'
                    );
        return view('layout/wrapper',$data);
    }

    // Proses
    public function proses_pemesanan(Request $request)
    {
        $model  = new Produk_model();
        // insert data ke table pegawai
        $produk = $model->detail($request->id_produk);
        $pesan  = new Pemesanan_model();
        $check  = $pesan->nomor_akhir();
        if($check) {
            $nomor_transaksi    = $check->nomor_transaksi+1;
        }else{
            $nomor_transaksi    = 1;
        }

        if($nomor_transaksi < 10) {
            $kode_transaksi = date('Ymd').'000'.$nomor_transaksi;
        }elseif($nomor_transaksi < 100) {
            $kode_transaksi = date('Ymd').'00'.$nomor_transaksi;
        }elseif($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd').'0'.$nomor_transaksi;
        }elseif($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd').$nomor_transaksi;
        }
        $kd_tansaksi        = 'JWM'.$kode_transaksi;
        $token_transaksi    = Str::random(32);

        DB::table('pemesanan')->insert([
            'id_produk'         => $request->id_produk,
            'kode_transaksi'    => $kd_tansaksi,
            'token_transaksi'   => $token_transaksi,
            'tanggal_order'     => date('Y-m-d'),
            'status_pemesanan'  => 'Menunggu',
            'nomor_transaksi'   => $nomor_transaksi,
            'nama_pemesan'      => $request->nama_pemesan,
            'telepon_pemesan'   => $request->telepon_pemesan,
            'email_pemesan'     => $request->email_pemesan,
            'alamat'            => $request->alamat,
            'jumlah_produk'     => $request->jumlah_produk,
            'harga_produk'      => $produk->harga_jual,
            'total_harga'       => $request->jumlah_produk*$produk->harga_jual,
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'tanggal_post'      => date('Y-m-d H:i:s')
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('berhasil/'.$token_transaksi); 
        // End proses
    }

    // konfirmasi
    public function berhasil($token_transaksi)
    {
        $site       = DB::table('konfigurasi')->first();
        $model      = new Pemesanan_model();
        $pemesanan  = $model->token_transaksi($token_transaksi);

        $data = array(  'title'     => 'Pemesanan Berhasil',
                        'deskripsi' => 'Pemesanan Berhasil',
                        'keywords'  => 'Pemesanan Berhasil',
                        'site'      => $site,
                        'pemesanan' => $pemesanan,
                        'content'   => 'home/berhasil'
                    );
        return view('layout/wrapper',$data);
    }

    // cetak
    public function cetak($token_transaksi)
    {
        $site       = DB::table('konfigurasi')->first();
        $model      = new Pemesanan_model();
        $pemesanan  = $model->token_transaksi($token_transaksi);

        $data = array(  'title'     => 'Cetak Pemesanan',
                        'deskripsi' => 'Cetak Pemesanan Berhasil',
                        'keywords'  => 'Cetak Pemesanan Berhasil',
                        'site'      => $site,
                        'pemesanan' => $pemesanan
                    );
        $config = [ 'format' => 'A4-P', // Landscape
                    // 'margin_top' => 0
                  ];
        $pdf = PDF::loadview('home/cetak',$data,[],$config);
        // OR :: $pdf = PDF::loadview('pdf_data_member',$data,[],['format' => 'A4-L']);
        $nama_file = $pemesanan->kode_transaksi.'.pdf';
        return $pdf->stream($nama_file, 'I');
    }

    // Testimoni
    public function testimoni()
    {
        
    }

    // konfirmasi
    public function konfirmasi()
    {
        $site       = DB::table('konfigurasi')->first();
        $model      = new Rekening_model();
        $rekening   = $model->listing();

        if(isset($_GET['token_transaksi'])) {
            $token_transaksi= $_GET['token_transaksi'];
            $model          = new Pemesanan_model();
            $pemesanan      = $model->token_transaksi($token_transaksi);
        }else{
            $pemesanan = '';
        }

        $data = array(  'title'     => 'Konfirmasi Pembayaran',
                        'deskripsi' => 'Konfirmasi Pembayaran',
                        'keywords'  => 'Konfirmasi Pembayaran',
                        'site'      => $site,
                        'rekening'  => $rekening,
                        'pemesanan' => $pemesanan,
                        'content'   => 'home/konfirmasi'
                    );
        return view('layout/wrapper',$data);
    }

    // pembayaran
    public function pembayaran()
    {
        $site       = DB::table('konfigurasi')->first();
        $model      = new Rekening_model();
        $rekening   = $model->listing();

        $data = array(  'title'     => 'Metode Pembayaran',
                        'deskripsi' => 'Metode Pembayaran',
                        'keywords'  => 'Metode Pembayaran',
                        'site'      => $site,
                        'rekening'  => $rekening,
                        'content'   => 'home/pembayaran'
                    );
        return view('layout/wrapper',$data);
    }
}