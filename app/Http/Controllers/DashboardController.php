<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\BarangOut;
use App\Models\BarangRusak;
use App\Models\pengajuan;
use App\Models\ProfileSekolah;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Ruang;
use App\Models\Sumber;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DashboardController extends Controller
{
       public function dashboard(Barang $barang )
    {

        $barang_keluar = BarangKeluar::all();
        $barang_rusak = BarangRusak::all();
        $barang_out = BarangOut::all();
        $pengajuan = pengajuan::all();
        $profile_sekolah = ProfileSekolah::get()->first();
        $barangacc = $barang->where('status', '1');
        $data = $barangacc->sum('jumlah') ;
        
// pengajuan
        $datapengajuan = $pengajuan->count('id');
        $acc =  pengajuan::where('status', 1)->count();
        $belumacc =  pengajuan::where('status', 0)->count();
        $totalbiaya = $pengajuan->where('status', 0)->sum('hargatotal' );


// peminjaman
        $datapeminjaman = $barang_keluar->where('status', '0')->count('id');
        $barangdipinjam = $barang_keluar->where('status', '0')->sum('jumlah');


        $akhir =   $barangacc->sum('jumlah') - ($barang_rusak->sum('jumlah') + $barang_keluar->where('status', '0')->sum('jumlah'));
    
    	return view('admin.dashboard', compact( 'totalbiaya', 'datapeminjaman','barangdipinjam','acc','belumacc','datapengajuan','pengajuan','barang', 'akhir',  'barang_keluar', 'data', 'profile_sekolah', 'barang_rusak', 'barang_out'));
    }
}
