<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangOut;
use App\Models\BarangRusak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangOut $barangout)
    {
    	$barang_rusak = BarangRusak::get();
    	$barang = Barang::select('nama', 'id')->get();
        $data = BarangOut::latest()->paginate(90);
        return view('admin.barang-out.index', compact('barang_rusak','data', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang_rusak = BarangRusak::get();
        $barang = Barang::get();
        return view('admin.barang-out.create', compact('barang_rusak', 'barang'));
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
            'barang_rusak_id'=>'required',
            'keterangan'=>'required',
            'tanggal'=>'required',
         
        ]);
        if (($request->jumlah) >  $data) {
            Alert::error('Maaf !!', 'Jumlah barang tidak sesuai');
           return redirect()->route('barang-out.index');       
        } else {
            BarangOut::create($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
         return redirect()->route('barang-out.index');   
        }
        

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( BarangOut  $barang_out )
    {
        $barang_rusak = BarangRusak::get();
        $barang = Barang::get();
        return view('admin.barang-out.show', compact('barang_out', 'barang_rusak', 'barang'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangOut $barang_out)
    {
        $barang_rusak = BarangRusak::get();
        $barang = Barang::select('nama', 'id')->get();
        return view('admin.barang-out.edit', compact('barang_rusak', 'barang_out', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangOut $barang_out)
    {


        $request->validate([
            'jumlah'=>'required',
            'barang_rusak_id'=>'required',
            'keterangan'=>'required',
            'tanggal'=>'required',
        ]);


            $barang_out->update($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
         return redirect()->route('barang-out.index');   
 



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangOut $barang_out)
    {
        $barang_out->delete();

        return redirect()->route('barang-out.index')->with('success', 'Barang Keluar berhasil dihapus');
 
    }
}
