<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pengajuan $pengajuan)
    {

        $pengajuan = pengajuan::latest()->paginate(90);
        $data = $pengajuan->count('id');
        $acc =  pengajuan::where('status', 1)->count();
        $belumacc =  pengajuan::where('status', 0)->count();
        $mendesak =  pengajuan::where('keperluan', 1)->count();
       
        return view('admin.pengajuan.index', compact('pengajuan', 'data', 'acc','belumacc','mendesak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a= 'PJ';
        $tgl = Carbon::now()->format('dmHis');
       $okee = $a.$tgl;

        return view('admin.pengajuan.create', compact('okee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'jenis'=>'required',
            'jumlah'=>'required',
            'nopengajuan'=>'required',
            'penempatan'=>'required',
            'hargatotal'=>'required',
            'pengaju'=>'required',
            'link'=>'',
            'merek'=>'',
            'tipe'=>'',
            'harga'=>'required',
            'kondisi'=>'required',
            'keperluan'=>'required',
            'status'=>'required',
            'keterangan'=>'',
            'tanggal'=> '',
        ]);


        pengajuan::create($request->all());
        DB::table('barangs')->insert([
            'kode' =>$request->nopengajuan,
			'nama' => $request->nama,
			'jenis' => $request->jenis,
			'jumlah' => $request->jumlah,
			'ruang' => $request->penempatan,
			'tanggal' => $request->tanggal,
			'kondisi' => $request->kondisi,
			'tanggal' => $request->tanggal,
			'keterangan' => $request->keterangan,
			'status' => $request->status,
		]);
    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan )
    {
        return view('admin.pengajuan.show', compact('pengajuan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pengajuan $pengajuan)
    {
  
        return view('admin.pengajuan.edit', compact('pengajuan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'nama'=>'required',
            'jenis'=>'required',
            'jumlah'=>'required',
            'nopengajuan'=>'required',
            'penempatan'=>'required',
            'hargatotal'=>'required',
            'pengaju'=>'',
            'link'=>'',
            'merek'=>'',
            'tipe'=>'',
            'harga'=>'required',
            'kondisi'=>'required',
            'keperluan'=>'required',
            'status'=>'required',
            'keterangan'=>'',
            'tanggal'=> '',

        ]);





        $pengajuan->update($request->all());


        DB::table('barangs')->where('kode', $request->nopengajuan)->update([
            'kode' =>$request->nopengajuan,
			'nama' => $request->nama,
			'jenis' => $request->jenis,
			'jumlah' => $request->jumlah,
			'ruang' => $request->penempatan,
			'tanggal' => $request->tanggal,
			'kondisi' => $request->kondisi,
			'tanggal' => $request->tanggal,
			'status' => $request->status,
			'keterangan' => $request->keterangan,
		]);


    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan )
    {
        $pengajuan->delete();
        
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dihapus');
    }
}
