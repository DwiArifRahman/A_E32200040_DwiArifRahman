@extends('homepage/layouts/app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="card sidebar-menu">
              <div class="card-header">
                <h3 class="h4 card-title">Customer section</h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a></ul>
              </div>
            </div>
          </div>
          <div id="customer-order" class="col-lg-9">
            <div class="box">
              <h1>Detail Pemesanan</h1>
              <hr>
              <div class="table-responsive mb-4">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Unit price</th>
                      <th></th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($recent as $r)
                    <tr>
                      <td><a href="#"><img src="<?= url('produk/', $r->produk->gambar) ?>"></a></td>
                      <td><a href="#"><?= $r->produk->nama_produk ?></a></td>
                      <td><?= $r->quantity ?></td>
                      <td>Rp. <?= $r->produk->harga ?></td>
                      <td></td>
                      <td>Rp. <?= $r->total ?></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right">Order subtotal</th>
                      <th>Rp. <?= $subtotal->total_bayar ?></th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right">Shipping and handling</th>
                      <th>Rp. 0</th>
                    </tr>
                   
                    <tr>
                      <th colspan="5" class="text-right">Total</th>
                      <th>Rp. <?= $subtotal->total_bayar ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection