<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Pemesanan_model;
use App\Produk_model;
use PDF;

class Pemesanan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(20);

		$data = array(  'title'       => 'Data Pemesanan',
						'pemesanan'   => $pemesanan,
                        'content'     => 'admin/pemesanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

      //Status
    public function status_pemesanan($status_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
       $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->where('pemesanan.status_pemesanan',$status_pemesanan)
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(20);
        $kategori    = DB::table('kategori')->orderBy('urutan','ASC')->get();

        $data = array(  'title'     => 'Status Pemesanan: '.$status_pemesanan,
                        'pemesanan' => $pemesanan,
                        'kategori'  => $kategori,
                        'content'   => 'admin/pemesanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // detail page
    public function detail($id_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->where('pemesanan.id_pemesanan',$id_pemesanan)
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->first();
        $site      = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Order No. '.$pemesanan->kode_transaksi.' a.n: '.$pemesanan->nama_pemesan,
                        'pemesanan' => $pemesanan,
                        'site'      => $site,
                        'content'   => 'admin/pemesanan/detail'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // cetak page
    public function cetak($id_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->where('pemesanan.id_pemesanan',$id_pemesanan)
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->first();
        $site      = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Order Nomor '.$pemesanan->kode_transaksi.' atas nama '.$pemesanan->nama_pemesan,
                        'pemesanan' => $pemesanan,
                        'site'      => $site
                    );
        $config = [ 'format' => 'A4-P', // Landscape
                    // 'margin_top' => 0
                  ];
        $pdf = PDF::loadview('admin/pemesanan/cetak',$data,[],$config);
        // OR :: $pdf = PDF::loadview('pdf_data_member',$data,[],['format' => 'A4-L']);
        $nama_file = 'Order Nomor '.$pemesanan->kode_transaksi.' atas nama '.$pemesanan->nama_pemesan.'.pdf';
        return $pdf->stream($nama_file, 'I');
    }

    // Main page
    public function filter($mulai,$selesai,$status_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $tgl_mulai          = date('Y-m-d',strtotime($mulai));
        $tgl_selesai        = date('Y-m-d',strtotime($selesai));
        $status_pemesanan   = $status_pemesanan;
        if($status_pemesanan=="Semua") {
            $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->whereBetween('pemesanan.tanggal_order', [$tgl_mulai, $tgl_selesai])
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(20);
        }else{
            $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->whereBetween('pemesanan.tanggal_order', [$tgl_mulai, $tgl_selesai])
                    ->where('pemesanan.status_pemesanan',$status_pemesanan)
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(20);
        }
        
        $data = array(  'title'       => 'Data Order dg Status: '.$status_pemesanan.' pada Periode: '.date('d-m-Y',strtotime($mulai)).' s/d '.date('d-m-Y',strtotime($selesai)),
                        'pemesanan'   => $pemesanan,
                        'content'     => 'admin/pemesanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mypemesanan           = new Pemesanan_model();
        $keywords           = $request->keywords;
        $kategori   = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $pemesanan  = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->where('pemesanan.nama_pemesan', 'LIKE', "%{$keywords}%") 
                    ->orWhere('pemesanan.email_pemesan', 'LIKE', "%{$keywords}%") 
                    ->orWhere('pemesanan.kode_transaksi', 'LIKE', "%{$keywords}%") 
                    ->orWhere('pemesanan.telepon_pemesan', 'LIKE', "%{$keywords}%") 
                    ->orWhere('pemesanan.email_pemesan', 'LIKE', "%{$keywords}%") 
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->paginate(1);

        $data = array(  'title'             => 'Data Pemesanan',
                        'pemesanan'            => $pemesanan,
                        'kategori'   => $kategori,
                        'content'           => 'admin/pemesanan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site           = DB::table('konfigurasi')->first();
        $pengalihan     = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_pemesanannya       = $request->id_pemesanan;
            for($i=0; $i < sizeof($id_pemesanannya);$i++) {
                DB::table('pemesanan')->where('id_pemesanan',$id_pemesanannya[$i])->delete();
            }
            return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['filter'])) {
            if($request->mulai=='' || $request->selesai==''){
                return redirect($pengalihan)->with(['warning' => 'Anda belum memilih tanggal periode']);
            }else{
                return redirect('admin/pemesanan/filter/'.$request->mulai.'/'.$request->selesai.'/'.$request->status_pemesanan_filter)->with(['sukses' => 'Silakan lihat data hasil filter']);
            }
        }elseif(isset($_POST['status'])) {
            $id_pemesanannya       = $request->id_pemesanan;
            for($i=0; $i < sizeof($id_pemesanannya);$i++) {
                DB::table('pemesanan')->where('id_pemesanan',$id_pemesanannya[$i])->update([
                        'id_user'           => Session()->get('id_user'),
                        'status_pemesanan'  => $request->status_pemesanan
                    ]);
            }
            return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $myproduk          = new Produk_model();
        $produk             = $myproduk->semua();
        $kategori_produk    = DB::table('kategori_produk')->orderBy('urutan','ASC')->get();
        $rekening    = DB::table('rekening')->orderBy('urutan','ASC')->get();

        $data = array(  'title'     => 'Tambah Pemesanan',
                        'produk'    => $produk,
                        'rekening'  => $rekening,
                        'content'   => 'admin/pemesanan/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $pemesanan = DB::table('pemesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
                    ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk','LEFT')
                    ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual','produk.gambar','kategori_produk.nama_kategori_produk')
                    ->where('pemesanan.id_pemesanan',$id_pemesanan)
                    ->orderBy('pemesanan.id_pemesanan','DESC')
                    ->first();
        $myproduk   = new Produk_model();
        $produk     = $myproduk->semua();
        $kategori   = DB::table('kategori')->orderBy('urutan','ASC')->get();
        $rekening   = DB::table('rekening')->orderBy('urutan','ASC')->get();

        $data = array(  'title'     => 'Edit Pemesanan',
                        'pemesanan' => $pemesanan,
                        'produk'    => $produk,
                        'kategori'  => $kategori,
                        'rekening'  => $rekening,
                        'content'   => 'admin/pemesanan/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_pemesan'  => 'required|unique:pemesanan',
                            'bukti'         => 'file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        $model          = new Produk_model();
        $produk         = $model->detail($request->id_produk);
        $pesan          = new Pemesanan_model();
        $tanggal_order  = date('Y-m-d',strtotime($request->tanggal_order));
        $check          = $pesan->nomor_akhir_tanggal($tanggal_order);
        // NOMOR
        if($check) {
            $nomor_transaksi    = $check->nomor_transaksi+1;
        }else{
            $nomor_transaksi    = 1;
        }

        if($nomor_transaksi < 10) {
            $kode_transaksi = date('Ymd',strtotime($tanggal_order)).'000'.$nomor_transaksi;
        }elseif($nomor_transaksi < 100) {
            $kode_transaksi = date('Ymd',strtotime($tanggal_order)).'00'.$nomor_transaksi;
        }elseif($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd',strtotime($tanggal_order)).'0'.$nomor_transaksi;
        }elseif($nomor_transaksi < 1000) {
            $kode_transaksi = date('Ymd',strtotime($tanggal_order)).$nomor_transaksi;
        }
        $kd_tansaksi        = 'JWM'.$kode_transaksi;
        $token_transaksi    = Str::random(32);
        // UPLOAD START
        $image                  = $request->file('bukti');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('bukti')->getClientOriginalName();
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
            DB::table('pemesanan')->insert([
                'id_user'           => Session()->get('id_user'),
                'id_produk'         => $request->id_produk,
                'id_rekening'       => $request->id_rekening,
                'kode_transaksi'    => $kd_tansaksi,
                'token_transaksi'   => $token_transaksi,
                'tanggal_order'     => date('Y-m-d',strtotime($request->telepon_pemesan)),
                'nomor_transaksi'   => $nomor_transaksi,
                'status_pemesanan'  => $request->status_pemesanan,
                'nama_pemesan'      => $request->nama_pemesan,
                'telepon_pemesan'   => $request->telepon_pemesan,
                'email_pemesan'     => $request->email_pemesan,
                'alamat'            => $request->alamat,
                'jumlah_produk'     => $request->jumlah_produk,
                'harga_produk'      => $produk->harga_jual,
                'total_harga'       => $request->jumlah_produk*$produk->harga_jual,
                'ongkir'            => $request->ongkir,
                'total_biaya'       => ($request->jumlah_produk*$produk->harga_jual)+$request->ongkir,
                'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                'cara_bayar'        => $request->cara_bayar,
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar)),
                'bukti'             => $input['nama_file'],
                'jumlah'            => $request->jumlah,
                'pengirim'          => $request->pengirim,
                'nama_bank_pengirim'=> $request->nama_bank_pengirim,
                'nomor_rekening_pengirim'=> $request->nomor_rekening_pengirim,
                'keterangan'        => $request->keterangan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }else{
            DB::table('pemesanan')->insert([
                'id_user'           => Session()->get('id_user'),
                'id_produk'         => $request->id_produk,
                'id_rekening'       => $request->id_rekening,
                'kode_transaksi'    => $kd_tansaksi,
                'token_transaksi'   => $token_transaksi,
                'tanggal_order'     => date('Y-m-d',strtotime($request->telepon_pemesan)),
                'nomor_transaksi'   => $nomor_transaksi,
                'status_pemesanan'  => $request->status_pemesanan,
                'nama_pemesan'      => $request->nama_pemesan,
                'telepon_pemesan'   => $request->telepon_pemesan,
                'email_pemesan'     => $request->email_pemesan,
                'alamat'            => $request->alamat,
                'jumlah_produk'     => $request->jumlah_produk,
                'harga_produk'      => $produk->harga_jual,
                'total_harga'       => $request->jumlah_produk*$produk->harga_jual,
                'ongkir'            => $request->ongkir,
                'total_biaya'       => ($request->jumlah_produk*$produk->harga_jual)+$request->ongkir,
                'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                'cara_bayar'        => $request->cara_bayar,
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar)),
                // 'bukti'             => $input['nama_file'],
                'jumlah'            => $request->jumlah,
                'pengirim'          => $request->pengirim,
                'nama_bank_pengirim'=> $request->nama_bank_pengirim,
                'nomor_rekening_pengirim'=> $request->nomor_rekening_pengirim,
                'keterangan'        => $request->keterangan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('admin/pemesanan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_pemesan'  => 'required',
                            'bukti'        => 'file|image|mimes:jpeg,png,jpg|max:2048',
                            ]);
        $model          = new Produk_model();
        $produk         = $model->detail($request->id_produk);
        // UPLOAD START
        $image                  = $request->file('bukti');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('bukti')->getClientOriginalName();
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
            DB::table('pemesanan')->where('id_pemesanan',$request->id_pemesanan)->update([
                'id_user'           => Session()->get('id_user'),
                'id_produk'         => $request->id_produk,
                'id_rekening'       => $request->id_rekening,
                'tanggal_order'     => date('Y-m-d',strtotime($request->telepon_pemesan)),
                'status_pemesanan'  => $request->status_pemesanan,
                'nama_pemesan'      => $request->nama_pemesan,
                'telepon_pemesan'   => $request->telepon_pemesan,
                'email_pemesan'     => $request->email_pemesan,
                'alamat'            => $request->alamat,
                'jumlah_produk'     => $request->jumlah_produk,
                'harga_produk'      => $produk->harga_jual,
                'total_harga'       => $request->jumlah_produk*$produk->harga_jual,
                'ongkir'            => $request->ongkir,
                'total_biaya'       => ($request->jumlah_produk*$produk->harga_jual)+$request->ongkir,
                'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                'cara_bayar'        => $request->cara_bayar,
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar)),
                'bukti'             => $input['nama_file'],
                'jumlah'            => $request->jumlah,
                'pengirim'          => $request->pengirim,
                'nama_bank_pengirim'=> $request->nama_bank_pengirim,
                'nomor_rekening_pengirim'=> $request->nomor_rekening_pengirim,
                'keterangan'        => $request->keterangan
            ]);
        }else{
            DB::table('pemesanan')->where('id_pemesanan',$request->id_pemesanan)->update([
                'id_user'           => Session()->get('id_user'),
                'id_produk'         => $request->id_produk,
                'id_rekening'       => $request->id_rekening,
                'tanggal_order'     => date('Y-m-d',strtotime($request->telepon_pemesan)),
                'status_pemesanan'  => $request->status_pemesanan,
                'nama_pemesan'      => $request->nama_pemesan,
                'telepon_pemesan'   => $request->telepon_pemesan,
                'email_pemesan'     => $request->email_pemesan,
                'alamat'            => $request->alamat,
                'jumlah_produk'     => $request->jumlah_produk,
                'harga_produk'      => $produk->harga_jual,
                'total_harga'       => $request->jumlah_produk*$produk->harga_jual,
                'ongkir'            => $request->ongkir,
                'total_biaya'       => ($request->jumlah_produk*$produk->harga_jual)+$request->ongkir,
                'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                'cara_bayar'        => $request->cara_bayar,
                'tanggal_bayar'     => date('Y-m-d',strtotime($request->tanggal_bayar)),
                // 'bukti'             => $input['nama_file'],
                'jumlah'            => $request->jumlah,
                'pengirim'          => $request->pengirim,
                'nama_bank_pengirim'=> $request->nama_bank_pengirim,
                'nomor_rekening_pengirim'=> $request->nomor_rekening_pengirim,
                'keterangan'        => $request->keterangan
            ]);
        }
        return redirect('admin/pemesanan')->with(['sukses' => 'Data telah diedit']);
    }

    // Delete
    public function delete($id_pemesanan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('pemesanan')->where('id_pemesanan',$id_pemesanan)->delete();
        return redirect('admin/pemesanan')->with(['sukses' => 'Data telah dihapus']);
    }
}
