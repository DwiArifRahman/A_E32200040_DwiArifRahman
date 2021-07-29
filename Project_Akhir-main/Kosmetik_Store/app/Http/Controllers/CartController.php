<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use SweetAlert;

class CartController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['cart'] = Cart::with('produk')->where('id_user', auth()->user()->id)->get();
        return view('homepage.cart.index', $data);
    }

    function totalCart()
    {
        $id = auth()->user()->id;
        $data = Cart::with('id_user')->findOrFail($id);
    }

    public function create(Request $request)
    {
    }


    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        Cart::create([
            'id_produk' => $request->id_produk,
            'id_user' => $userId,
            'status' => $request->status,
        ]);

        alert()->success('Produk berhasil ditambahkan', 'Berhasil !!');
        return redirect()->route('detail', $request->id_produk);
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
        //
    }

    public function destroy($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->route('cart.index');
    }
}

