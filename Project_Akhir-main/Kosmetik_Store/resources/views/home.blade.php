@extends('homepage/layouts/app')
    @section('content')
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item"><img src="<?= 'kosmetik/img/main-slider2.jpg' ?>" alt="" class="img-fluid"></div>
                <div class="item"><img src="<?= 'kosmetik/img/main-slider3.jpg' ?>" alt="" class="img-fluid"></div>
                <div class="item"><img src="<?= 'kosmetik/img/main-slider4.jpg' ?>" alt="" class="img-fluid"></div>
              </div>
            </div>
          </div>
        </div>  

        <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-heart"></i></div>
                  <h3><a href="#">We love our customers</a></h3>
                  <p class="mb-0">We are known to provide best possible service ever</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Best prices</a></h3>
                  <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% satisfaction guaranteed</a></h3>
                  <p class="mb-0">Free returns on everything for 3 months.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Hot this week</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
              @foreach ($producs as $p)
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="#"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="#"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="#" class="invisible"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="#"><?= $p->nama_produk ?></a></h3>
                    <p class="price"> 
                      <del></del>Rp. <?= $p->harga ?>
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
    @endsection