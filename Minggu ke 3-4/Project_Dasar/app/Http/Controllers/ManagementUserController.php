<?php

namespace App\Http\COntrollers;

use Illuminate\Http\Request;

class ManagementUserController extends COntroller
{
public function index() {
        ///return "Halo ini adalah method index, dalam controller ManagementUser.";
        //return "Method ini nantinya akan digunakan untuk mengambil semua data user";
        $nama = "Dwi Arif Rahman";
        $pelajaran = ["Fisika Teknik & Pemograman", "Elektronika", "Komputer Dasar"];
        return view('home', compact('nama', 'pelajaran'));
}
public function create()
{
    return "Method ini nantinya akan digunakan untuk menambahkan data user";
}
public function store(Request $request)
{
    return "Method ini nantinya akan digunakan untuk menciptakan data user yang baru";
}
public function show($id)
{
    return "Method ini nantinya akan digunakan untuk mengambil";
}
public function edit($id)
{
    return "Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id=" . $id;
}
public function updatete(Request $request, $id)
{
    return "Method ini nantinya akan digunakan untuk mengubah data user dengan id=" . $id;
}
public function destroy($id)
{
    return "Method ini nantinya digunakan untuk menghapus data user dengan id=" . $id;
}
}
