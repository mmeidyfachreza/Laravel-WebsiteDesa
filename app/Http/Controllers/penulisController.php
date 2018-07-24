<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postingan;
class penulisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Penulis');
    }
    public function beranda(Request $request)
    {
    	$data = Postingan::where('user_id', auth()->user()->id)->get();
    	return view('penulis.home',compact('data'));
    }

 	public function postingan()
    {
    	return view('penulis.postingan');
    }
   
}
