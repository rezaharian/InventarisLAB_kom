<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangRusak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BarangRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangRusak $barangrusak)
    {
        $barang = Barang::get();
        $data = BarangRusak::latest()->paginate(90);
        return view('admin.barang-rusak.index', compact('barang','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::select('nama', 'id')->get();
        return view('admin.barang-rusak.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $barang = Barang::all();
        $barang_keluar = BarangKeluar::all();
        $barang_rusak = BarangRusak::all();
        $barangacc = $barang->where('status', '1');
        

        $data =   $barangacc->sum('jumlah') - ($barang_rusak->sum('jumlah') + $barang_keluar->where('status', '0')->sum('jumlah'));
       
    
        $request->validate([
            'jumlah'=>'required',
            'barang_id'=>'required',
            'keterangan'=>'required',
         
        ]);


        if (($request->jumlah) >  $data) {
            Alert::error('Maaf !!', 'Jumlah barang tidak sesuai');
           return redirect()->route('barang-rusak.index');       
        } else {
            BarangRusak::create($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
         return redirect()->route('barang-rusak.index');   
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BarangRusak $barang_rusak )
    {
        
        return view('admin.barang-rusak.show', compact('barang_rusak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangRusak $barang_rusak )
    {
        $barang = Barang::select('nama', 'id')->get();
        return view('admin.barang-rusak.edit', compact('barang_rusak', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangRusak $barang_rusak)
    {
        
        $barang = Barang::all();
        $barang_keluar = BarangKeluar::all();
        $barang_rusak = BarangRusak::all();
        $barangacc = $barang->where('status', '1');
        

        $data =   $barangacc->sum('jumlah') - ($barang_rusak->sum('jumlah') + $barang_keluar->where('status', '0')->sum('jumlah'));
        

        $request->validate([
            'jumlah'=>'required',
            'barang_id'=>'required',
            'keterangan'=>'required',
        ]);

        
        if (($request->jumlah) >  $data) {
            Alert::error('Maaf !!', 'Jumlah barang tidak sesuai');
           return redirect()->route('barang-rusak.index');       
        } else {
            $barang_rusak->update($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
         return redirect()->route('barang-rusak.index');   
        }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangRusak $barang_rusak)
    {
        $barang_rusak->delete();

        return redirect()->route('barang-rusak.index')->with('success', 'Barang Rusak berhasil dihapus');
 
    }
}
