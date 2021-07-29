<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Transactions;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use SweetAlert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rekening'] = Rekening::get();

        $data['detail'] = Transaksi::with('produk')->where([
            ['id_user', auth()->user()->id],
            ['id_transaksi', 0]
        ])->get();

        $subtotal = Transaksi::where([
            ['id_user', auth()->user()->id],
            ['id_transaksi', 0],
        ])->sum('total');
        return view('homepage.transaksi.index', $data, compact('subtotal'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $idUser = auth()->user()->id;
        // $idTransaksi = auth()->user()->id;

        foreach ($request->harga as $key => $i) {
            $total = $request->harga[$key] * $request->quantity[$key];
            $data = new Transaksi;
            $data->id_produk = $request->id[$key];
            $data->id_user = $idUser;
            $data->id_transaksi = 0;
            $data->quantity = $request->quantity[$key];
            $data->total = $total;
            $data->no_resi = 0;
            $data->save();
        }
        return redirect()->route('transaksi.index');
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
}
