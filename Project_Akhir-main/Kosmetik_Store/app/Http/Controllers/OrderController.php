<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transactions;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['order'] = Transactions::where('id_user', auth()->user()->id)->get();
        return view('homepage.transaksi.order', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('buktiTF'), $imageName);

        Transactions::create([
            'alamat' => $request->alamat,
            'id_user' => auth()->user()->id,
            'bukti' => $imageName,
            'atas_nama' => $request->atas_nama,
            'total_bayar' => $request->totbay,
            'jasa_pengiriman' => $request->jasa_pengiriman,
            'no_resi' => 0,
            'status' => 0,
        ]);

        $idOrder = Transactions::select('id')->where([
            ['id_user', auth()->user()->id],
            ['status', 0],
        ])->first();

        Transaksi::where([
            ['id_user', auth()->user()->id],
            ['id_transaksi', 0],
        ])->update(['id_transaksi' => $idOrder->id]);

        Cart::where([
            ['id_user', auth()->user()->id],
            ['status', 0],
        ])->delete();
        alert()->success('Pemesanan berhasil di proses', 'Berhasil !!');
        return redirect()->route('order.index');
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
        //
    }

    function listOrder($id)
    {
        $data['recent'] = Transaksi::with('produk')->where([
            ['id_transaksi', $id],
            ['id_user', auth()->user()->id],
        ])->get();


        $subtotal = Transactions::select('total_bayar')->where('id', $id)->first();
        return view('homepage.transaksi.orderList', $data, compact('subtotal'));
    }
}
