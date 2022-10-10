<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangRusak;
use App\Models\Laporan;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert as WidgetAlert;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BarangKeluar $barang_keluar)
    {
        $barang_rusak= BarangRusak::all();
        $bk = $barang_keluar->count('id');
        $barang = Barang::all();
        $barangacc = $barang->where('status', '1');
        $bdk = $barang_keluar->where('status', '0')->sum('jumlah');
        $sdk = $barang_keluar->where('status', '1')->sum('jumlah');
        $datas =   $barangacc->sum('jumlah') - ($barang_rusak->sum('jumlah') + $barang_keluar->where('status', '0')->sum('jumlah'));
        $datajadi = $datas / 1.3;
        $datajadi1 = intval($datajadi) ;
        $data = $barang_keluar
            ->with('barang')
            ->latest()
            ->get();
        return view('admin.barang-keluar.index', compact('data', 'barang', 'datas', 'bk', 'bdk', 'sdk', 'datajadi', 'datajadi1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang_keluar = BarangKeluar::get();
        $barang = Barang::select('nama', 'jumlah', 'id')->get();
        return view('admin.barang-keluar.create', compact('barang', 'barang_keluar'));
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

        $data = $barangacc->sum('jumlah') - ($barang_rusak->sum('jumlah') + $barang_keluar->where('status', '0')->sum('jumlah'));
        $datajadi = $data / 1.3 ;

        $request->validate([
            'peminjam' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);

        if ($request->jumlah > $datajadi) {
            Alert::error('Maaf !!', 'Tidak bisa meminjam dengan jumlah ini');
            return redirect()->route('barang-keluar.index');
        } else {
            BarangKeluar::create($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
            return redirect()->route('barang-keluar.index');
        }

        // Barang::find($request->barang_id)->decrement('jumlah', $request->jumlah);

        // $result = $barang_keluar->create($request->all());

        // // untuk laporan
        // Laporan::create([
        // 	'nama' => $result->barang->nama,
        // 	'orang' => $request->penerima,
        // 	'jumlah' => $request->jumlah,
        // 	'berat' => $request->berat,
        // 	'harga' => $request->harga,
        // 	'jenis' => 'Barang Keluar',
        // 	'root_id' => $result->id
        // ]);

        // return back()->with('success', 'Stok berhasil dikurangi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barang_keluar)
    {
        return view('admin.barang-keluar.show', compact('barang_keluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barang_keluar)
    {
        $barang = Barang::select('nama', 'id')->get();
        return view('admin.barang-keluar.edit', compact('barang_keluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barang_keluar)
    {
       
        $request->validate([
            'peminjam' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);

       
            $barang_keluar->update($request->all());
            Alert::success('Selamat', 'Data Pinjam berhasil di tambah');
            return redirect()->route('barang-keluar.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangKeluar $barang_keluar)
    {
        $barang_keluar->delete();

        Alert::success('Selamat', 'Data Pinjam berhasil di hapus');
        return redirect()->route('barang-keluar.index');
    }
}
