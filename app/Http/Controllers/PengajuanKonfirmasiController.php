<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PengajuanKonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(pengajuan $pengajuan)
    {

        $pengajuan = pengajuan::latest()->paginate(90);

       
        return view('admin.pengajuan-konfirmasi.index', compact('pengajuan'));
    }

    
    public function pengajuanshow(pengajuan $pengajuan)
    {

        $pengajuan = pengajuan::latest()->paginate(90);

       

       
        return view('admin.pengajuanshow.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan_konfirmasi)
    {
        return view('admin.pengajuan-konfirmasi.show', compact('pengajuan_konfirmasi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan_konfirmasi)
    {
        return view('admin.pengajuan-konfirmasi.edit', compact('pengajuan_konfirmasi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan_konfirmasi)
    {
       

        $pengajuan_konfirmasi->update($request->all());
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


    return redirect()->route('pengajuan-konfirmasi.index')->with('success', 'Pengajuan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
