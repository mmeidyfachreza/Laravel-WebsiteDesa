<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class jenis_penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return view('Admin.jenis_pengguna',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.form_jenis_pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'nama' => 'required',
        ]);
        
        $jenis_pengguna = new Role;
        $jenis_pengguna->nama = $request->nama;
        $jenis_pengguna->keterangan = $request->keterangan;
        $informasi = $jenis_pengguna->save() ? 'Berhasil tambah Data' : 'Gagal Tambah Data';
        return redirect('jenis_pengguna')->with(['informasi'=>$informasi]);
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
        $data = Postingan::find($id);
        return view('lihat_postingan',compact('data'));
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
        $postingan = Postingan::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('penulis.edit_postingan',compact('postingan','id'));
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
        $postingan = Postingan::findOrFail($id);
        $postingan->judul = $request->judul;
        $postingan->divisi = $request->divisi;
        // proses simpan gambar
        $image = $request->file('gambar');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        // proses simpan gambar
        $postingan->gambar = $input['imagename'];
        $postingan->isi = $request->konten;
        
        $informasi = $postingan->save() ? 'Berhasil Edit Potingan' : 'Gagal Edit';
        $image->move($destinationPath,$input['imagename']);
        return redirect('postingan')->with(['informasi'=>$informasi]);
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
        $postingan = Postingan::find($id);
        $image_path = public_path().'/image/'.$postingan->gambar;
        if(file_exists($image_path)) {
            unlink($image_path);
        }
        $informasi = $postingan->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('postingan')->with(['informasi'=>$informasi]);
    }
}
