<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postingan;
use App\Kategori;
use App\Galeri;

class indexController extends Controller
{
    //
    public function index()
    {
    	$data = Postingan::all();
        $data2 = Kategori::all();
    	return view('Beranda',compact('data','data2'));
    }

    public function kategori($kategori)
    {
        $kat = Kategori::where('nama',$kategori)->first()->id;
        $data = Postingan::all();
        //$data = Postingan::find(5);
        $data2 = Kategori::all();
        return view('Beranda',compact('data','data2'));
    }

    public function lihat_postingan($id)
    {
        $data = Postingan::find($id);
        $data2 = Kategori::all();
        return view('lihat_postingan',compact('data','data2'));
    }

    public function galeri()
    {
        $data = Galeri::all();
        $data2 = Kategori::all();
        return view('galeri',compact('data','data2'));
    }

    public function ajax(Request $request)
    {
        $msg = $request->value;
      return response()->json(array('msg'=> $msg), 200);
    }


}
