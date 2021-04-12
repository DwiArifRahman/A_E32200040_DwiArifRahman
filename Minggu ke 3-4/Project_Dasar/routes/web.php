<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/biodata', function() {
    echo'<h1>BIiodata Diri</h1>';
    echo'<p>Nama:Dwi Arif Rahman</p>';
    echo'<p>Nim :E32200040</p>';
    echo'<p>TTL : Probolinggo-31-Januari_2002</p>';
    echo'<p>Alamat : Dusun Krajan RT/03 Rw/03, Des.Sebaung Kec.Gending</p>';
    echo'<p>No HP : 082332152918</p>';
    echo'<p>Jurusan : Teknologi Informasi</p>';
    echo'<p>Prodi : Teknik Komputer (A.20)</p>';
    echo'<p>Golongan : A </p>';
});
Route::get('halaman/{nomor}', function($nomor) {
    return 'ini halaman ke-'. $nomor;
});

//Route::get('user', 'ManagementUserController@index');
Route::resource('user','ManagementUserController');

Route::get("/home", function(){
    return view("home");
});