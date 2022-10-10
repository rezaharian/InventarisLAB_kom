<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangOut;
use App\Models\BarangRusak;
use App\Models\pengajuan;
use App\Models\ProfileSekolah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporanbm(){
    $bm = Barang::get()->where('status', 1);

    
    return view('admin.laporan.bm', compact('bm'));
    }

    public function laporanbmpdf(){
        $bm =Barang::get()->where('status', 1);
        $user = Auth::user();
        $jl = 'Inventaris Masuk';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');
    	$pdf = Pdf::loadview('admin.laporan.laporanbmpdf',compact( 'bm', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    public function laporanbkpdf(){
        $bk =BarangOut::get();;
        $user = Auth::user();
        $jl = 'Inventaris keluar';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');
    	$pdf = Pdf::loadview('admin.laporan.laporanbkpdf',compact( 'bk', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    public function laporanbjpdf(){
        $bj =BarangKeluar::get();;
        $user = Auth::user();
        $jl = 'Inventaris Pinjam';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');
    	$pdf = Pdf::loadview('admin.laporan.laporanbjpdf',compact( 'bj', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    public function laporanbrpdf(){
        $br =BarangRusak::get();;
        $user = Auth::user();
        $jl = 'Inventaris Rusak';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');
    	$pdf = Pdf::loadview('admin.laporan.laporanbrpdf',compact( 'br', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    public function laporanbppdf(){
        $bp = pengajuan::get();;
        $user = Auth::user();
        $jl = 'Inventaris Pengajuan';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');
    	$pdf = Pdf::loadview('admin.laporan.laporanbppdf',compact( 'bp', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    public function laporanperruang(){

        $user = Auth::user();
        $jl = 'Inventaris Barang Per Ruang';
        $ps = ProfileSekolah::get();
        $tgl = date(' d M Y');



        $ruang1 = Barang::get()->where('ruang', 'LAB Bahasa 1')->where('status', 1);
        $ruang1j = $ruang1->sum('jumlah');
        $nr1 = 'LAB BAHASA 1';

        $ruang2 = Barang::get()->where('ruang', 'LAB Bahasa 2');
        $ruang2j = $ruang2->sum('jumlah');
        $nr2 = 'LAB BAHASA 2';

        $ruang3 = Barang::get()->where('ruang', 'LAB TKJ 1');
        $ruang3j = $ruang3->sum('jumlah');
        $nr3 = 'LAB TKJ 1';

        $ruang4 = Barang::get()->where('ruang', 'LAB TKJ 2');
        $ruang4j = $ruang4->sum('jumlah');
        $nr4 = 'LAB TKJ 2';
        
        $ruang2 = Barang::get()->where('ruang', 'LAB Bahasa 2')->where('status', 1);
        $ruang3 = Barang::get()->where('ruang', 'LAB TKJ 1')->where('status', 1);
        $ruang4 = Barang::get()->where('ruang', 'LAB TKJ 2')->where('status', 1);

        $pdf = Pdf::loadview('admin.laporan.laporanperruang',compact( 'ruang1','ruang1j','nr1', 'ruang2j','ruang2','nr2','ruang3j', 'ruang3','nr3','ruang4j', 'ruang4','nr4', 'ps', 'tgl', 'jl','user'));
    	// return $pdf->download('laporan-barang-masuk.pdf');
        return $pdf->stream();
    }

    



}
