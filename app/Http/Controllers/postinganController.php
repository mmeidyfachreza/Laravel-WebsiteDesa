<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Postingan;
use App\Kategori;
use League\Flysystem\File;
class postinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Penulis,Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Postingan::where('user_id', auth()->user()->id)->get();
        if (Auth::user()->roles->first()->nama == 'Admin') {
            # code...
            return view('admin.postingan',compact('data'));
        }else
            return view('penulis.postingan',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Kategori::all();
        return view('penulis.form_postingan',compact('data'));
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
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
            'gambar' => 'required|mimes:png,jpeg',
        ]);
        
        // proses simpan gambar
        $image = $request->file('gambar');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$input['imagename']);
        // proses simpan gambar
        $postingan = new Postingan;
        $postingan->user_id = auth()->user()->id;
        $postingan->judul = $request->judul;
        
        $postingan->kategori_id = $request->kategori;
        $postingan->gambar = $input['imagename'];
        $postingan->isi = $request->konten;
        //$postingan->save();
        $informasi = $postingan->save() ? 'Berhasil Publikasi Potingan' : 'Gagal Publikasi';
        return redirect('postingan')->with(['informasi'=>$informasi]);
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

    public function Supdate(Request $request)
    {
        $data = Postingan::find($request->id);
        
        if ($data->publikasi == 0){
            $data->publikasi = 1; 
        }elseif ($data->publikasi == 1){
            $data->publikasi = 0;
        }
        $data->update();
      // return response()->json(array('msg'=> $msg,), 200);
        return ['success'=>true];
    }

    public function ajax(Request $request)
    {
        $msg = $request->value;
        return response()->json(array('msg'=> $msg), 200);
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
