<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['producs'] = Produk::limit(5)->get();
        return view('home', $data);
    }

    function listProduk()
    {
        $data['producs'] = Produk::get();
        return view('homepage.listProduk.index', $data);
    }

    function detailProduk($id)
    {
        $data['produk'] = Produk::with('kategori')->findOrFail($id);
        return view('homepage.listProduk.detail', $data);
    }
}