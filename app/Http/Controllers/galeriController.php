<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use League\Flysystem\File;

class galeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        //
        $data = Galeri::all();
        return view('Admin.b_galeri',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.form_galeri');
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

        $this->validate($request,[
            'deskripsi' => 'required',
            'foto' => 'required|mimes:png,jpeg',
        ]);
        
        // proses simpan gambar
        $image = $request->file('foto');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$input['imagename']);
        // proses simpan gambar
        $galeri = new Galeri;
        $galeri->user_id = auth()->user()->id;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->foto = $input['imagename'];
        //$postingan->save();
        $informasi = $galeri->save() ? 'Berhasil Publikasi' : 'Gagal Publikasi';
        return redirect('b_galeri')->with(['informasi'=>$informasi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        $galeri = Galeri::find($id);
        $image_path = public_path().'/image/'.$galeri->foto;
        if(file_exists($image_path)) {
            unlink($image_path);
        }
        $informasi = $galeri->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('b_galeri')->with(['informasi'=>$informasi]);
    }
}
