@extends('homepage/layouts/app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 order-1 order-lg-2">
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div class="item"> <img src="<?= url('produk/', $produk->gambar) ?>" alt="" class="img-fluid"></div>
                </div>
                <div class="ribbon sale">
                  <div class="theribbon">SALE</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">NEW</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center"><?= $produk->nama_produk ?></h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details</a></p>
                  <p class="price">Rp. <?= $produk->harga ?></p>
                  @if (auth()->user())
                    <form action="<?= route('cart.store') ?>" method="post">
                      <input type="hidden" name="id_produk" value="<?= $produk->id ?>">
                        <p class="text-center buttons">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </p>
                    </form>
                    @else
                    <p class="text-center">Silahkan Login Terlebih Dahulu untuk melakukan transaksi.</p>  
                  @endif
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="<?= url('produk/', $produk->gambar) ?>" alt="" class="img-fluid"></button>
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4>Product details</h4>
              <p><?= $produk->deskripsi ?></p>
              <hr>
              <div class="social">
                <h4>Show it to your friends</h4>
                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
              </div>
            </div>
          </div>
          <!-- /.col-md-9-->
        </div>
      </div>
    </div>
  </div>
@endsection