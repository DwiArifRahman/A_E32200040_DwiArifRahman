@extends('homepage/layouts/app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Shopping cart</li>
              </ol>
            </nav>
          </div>
          <div id="basket" class="col-lg-9">
            <div class="box">
              <form action="<?= route('transaksi.store') ?>" method="post">
                @csrf
                <h1>Shopping cart</h1>
                <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Product</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($cart as $c)
                        <tr>
                            <td><a href="#"><img src="<?= url('produk/', $c->produk->gambar) ?>" alt="" class="img-fluid"></a></td>
                            <td><a href="#"><?= $c->produk->nama_produk ?></a></td>
                            <td>
                                <input type="number" name="quantity[]" value="1" class="form-control quantity">
                                <input type="hidden" name="harga[]" value="<?= $c->produk->harga ?>" class="form-control quantity">
                                <input type="hidden" name="id[]" value="<?= $c->produk->id ?>" class="form-control quantity">
                            </td>
                            <td>Rp. <?= $c->produk->harga ?></td>
                            <td></td>
                            <td>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#hapusProduk<?= $c->id ?>"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                  <div class="left"><a href="<?= route('listProduk') ?>" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                  <div class="right">
                      <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col-lg-9-->
          <div class="col-lg-3">
            <div id="order-summary" class="box">
              <div class="box-header">
                <h3 class="mb-0">Order summary</h3>
              </div>
              <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
            </div>
          </div>
          <!-- /.col-md-3-->
        </div>
      </div>
    </div>
  </div>
@endsection

@foreach ($cart as $c)

<div class="modal fade" id="hapusProduk<?= $c->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hapus produk <?= $c->produk->nama_produk ?> di cart??
        <form action="<?= route('cart.destroy', $c->id) ?>" method="post">
          @csrf
          @method('DELETE')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
