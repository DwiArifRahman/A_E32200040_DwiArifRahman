<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data['produk'] = Produk::with('kategori')->get();
        $data['kategori'] = Kategori::get();
        return view('admin/produk/list', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('produk'), $imageName);
        Produk::create([
            'id_kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'gambar' => $imageName,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'terjual' => 0,
        ]);
        return redirect()->route('produk.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('produk'), $imageName);

        $data = Produk::findOrFail($id);
        $data->update([
            'id' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'gambar' => $imageName,
            'stok' => $request->stok,
        ]);
        return redirect()->route('produk.index');
    }

    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return redirect()->route('produk.index');
    }
}
