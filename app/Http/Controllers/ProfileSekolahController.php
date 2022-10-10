<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class ProfileSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile_sekolah = ProfileSekolah::get();
        return view('admin.profile-sekolah.index', compact('profile_sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.profile-sekolah.create');
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
            'nama'     => 'required',
            'alamat'   => 'required',
            'telpon'   => 'required',
            'website'   => 'required',
            'kepsek'   => 'required',
            'profile'   => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        ProfileSekolah::create($input);
     
        return redirect()->route('profile-sekolah.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileSekolah $profile_sekolah)
    {
         return view('admin.profile-sekolah.show',compact('profile_sekolah'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileSekolah $profile_sekolah )
    {
            return view('admin.profile-sekolah.edit', compact('profile_sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileSekolah $profile_sekolah)
    {
        $request->validate([
            'nama'     => 'required',
            'alamat'   => 'required',
            'telpon'   => 'required',
            'website'   => 'required',
            'kepsek'   => 'required',
            'profile'   => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $profile_sekolah->update($input);

    
        return redirect()->route('profile-sekolah.index')
                        ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileSekolah $profile_sekolah)
    {
         $profile_sekolah->delete();

    
        return redirect()->route('profile-sekolah.index')
                        ->with('success','Product deleted successfully');
    }
}
