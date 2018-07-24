<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/','indexController@index');
Route::get('/galeri','indexController@galeri');
Route::get('post/{id}','indexController@lihat_postingan');

Route::get('/penulis', 'penulisController@beranda');
Route::get('/admin', 'adminController@beranda');	



Route::post('fileupload',[
	'as'=>'fileupload',
	'uses'=>'postinganController@fileupload'
]);

Route::get('/artikel/{Kategori}','indexController@kategori');

//crud jenis pengguna
Route::resource('pengguna','penggunaController');
Route::get('/pengguna','penggunaController@index');
Route::get('/buat/pengguna','penggunaController@create');
Route::post('/buat/pengguna','penggunaController@store');
Route::get('/edit/pengguna/{id}','penggunaController@edit');
Route::post('/edit/pengguna/{id}','penggunaController@update');


//crud jenis pengguna
Route::resource('jenis_pengguna','jenis_penggunaController');
Route::get('/jenis_pengguna','jenis_penggunaController@index');
Route::get('/buat/jenis_pengguna','jenis_penggunaController@create');
Route::post('/buat/jenis_pengguna','jenis_penggunaController@store');
Route::get('/edit/jenis_pengguna/{id}','jenis_penggunaController@edit');
Route::post('/edit/jenis_pengguna/{id}','jenis_penggunaController@update');


//crud postingan
Route::get('postingan/hapus/{id}','postinganController@destroy');
Route::get('/postingan','postinganController@index');
Route::get('/buat/postingan','postinganController@create');
Route::post('/buat/postingan','postinganController@store');
Route::get('/edit/postingan/{id}','postinganController@edit');
Route::post('/edit/postingan/{id}','postinganController@update');
Route::post('/Spostingan','postinganController@Supdate');


//crud Galeri
Route::get('/b_galeri','galeriController@index');
Route::get('/buat/b_galeri','galeriController@create');
Route::post('/buat/b_galeri','galeriController@store');
Route::get('/edit/b_galeri/{id}','galeriController@edit');
Route::post('/edit/b_galeri/{id}','galeriController@update');
Route::get('b_galeri/hapus/{id}','galeriController@destroy');



	

Route::get('/tes','penggunaController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/getmsg','indexController@ajax');

Auth::routes();
