<?php

namespace App\Http\Controllers;

    use App\Models\Barang;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Carbon;
    use PDF; //library pdf
    use RealRashid\SweetAlert\Facades\Alert;

    

    use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert as WidgetAlert;

    class BarangController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Barang $barang)
        {
            $data = Barang::latest()->paginate(90)->where('status', 1);



            return view('admin.barang.index', compact('data'));


        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $a= 'INV';
            $tgl = Carbon::now()->format('dmYHis');
           $ok = $a.$tgl;

        


            return view('admin.barang.create',compact('ok') );
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
                    'jumlah'=>'required',
                    'jenis'=>'required',
                    'penerima'=>'required',
                    'kondisi'=>'required',
                    'ruang' => 'required',
                    'sumber' => 'required',
                    'tanggal' => 'required',
                    'keterangan' => 'required',
                    'status'=> '',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                    

                ]);

                 $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/brg/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

   
    
        Barang::create($input);
      
            Alert::success('Selamat', 'Data Berhasil Dsimpan');
            return redirect()->route('barang.index');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show(Barang $barang)
        {

            return view('admin.barang.show', compact('barang' ));
            
        }

    

       

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(Barang $barang)
        {

             
                    return view('admin.barang.edit', compact('barang' ));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Barang $barang)
        {
            $request->validate([
                'nama'=>'required',
                'jumlah'=>'required',
                'jenis'=>'required',
                'penerima'=>'required',
                'kondisi'=>'required',
                'ruang' => 'required',
                'sumber' => 'required',
                'tanggal' => 'required',
                'keterangan' => 'required',
                'status' => '',
                
           

                ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/brg/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $barang->update($input);
        // Alert::success('Selamat', 'Data Berhasil Diupdate');

    
        return redirect()->route('barang.index');
    }


        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Barang $barang)
        {
        
        $barang->delete();
        return redirect()->route('barang.index');
        }
    }
