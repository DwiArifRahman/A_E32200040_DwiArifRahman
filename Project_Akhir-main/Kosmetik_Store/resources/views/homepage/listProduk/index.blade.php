@extends('homepage/layouts/app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">                       
          <div class="col-lg-12">
            <div class="box">
              <h1>List Produk</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus, ipsam! Exercitationem nam iste magnam facere voluptas quod natus voluptatem dolorem.</p>
            </div>
            <div class="row products">
            @foreach ($producs as $p)
            <div class="col-lg-3 col-md-4">
              <div class="product">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="#"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="#"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="detail.html" class="invisible"><img src="<?= url('produk/', $p->gambar) ?>" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3><a href="detail.html"><?= $p->nama_produk ?></a></h3>
                  <p class="price"> 
                    <del></del>Rp. <?= $p->harga ?>
                  </p>
                  <p class="buttons"><a href="<?= route('detail', $p->id) ?>" class="btn btn-outline-secondary">View detail</a></p>
                </div>
              </div>
            </div>
            @endforeach
            </div>
            <div class="pages">
              {{-- <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p> --}}
              <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                  <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                  <li class="page-item active"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /.col-lg-9-->
        </div>
      </div>
    </div>
  </div>
@endsection