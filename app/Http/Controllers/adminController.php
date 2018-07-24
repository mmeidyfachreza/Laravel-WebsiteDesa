<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postingan;
use App\User;

class adminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
        
    }

    public function beranda(Request $request)
    {
        
    	$data = Postingan::all();
        $dataA = Postingan::where('user_id', auth()->user()->id)->get();
    	return view('Admin.beranda',compact('data','dataA'));
    }

 	public function postingan()
    {
    	return view('penulis.postingan');
    }

    public function pengguna()
    {
    	return view('admin.pengguna');
    }

    public function jenis_pengguna()
    {
    	return view('admin.jenis_pengguna');
    }
}
