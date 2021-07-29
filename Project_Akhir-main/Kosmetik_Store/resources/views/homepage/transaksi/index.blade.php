@extends('homepage/layouts/app')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">z
          <div class="col-lg-12 mb-4">
            <div id="order-summary" class="card">
              <div class="card-header">
                <h3 class="mt-4 mb-4">Detail Pemesanan</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                        @foreach ($detail as $d)
                        <tr>
                          <td>Nama Produk</td>
                          <th><?= $d->produk->nama_produk ?></th>
                          <td>Harga</td>
                          <th>Rp. <?= $d->produk->harga ?></th>
                          <td>Quantity</td>
                          <th><?= $d->quantity ?></th>
                          <td>Total</td>
                          <th>Rp. <?= $d->total ?></th>
                        </tr>
                        @endforeach
                      <tr class="total">
                        <td>Subtotal</td>
                        <th>Rp. <?= $subtotal ?></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-3-->
          <div id="checkout" class="col-lg-12">
            <div class="box">
              <form method="post" action="<?= route('order.store') ?>" enctype="multipart/form-data">
                @csrf
                <h1>Proses Pemesanan</h1>
                <p>Silahkan Transfer dengan jumlah transfer berdasarkan subtotal diatas ke nomor rekening dibawah (pilih salah satu) lalu upload bukti transfer pada form dibawah</p>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Bank</th>
                        <th scope="col">No Rekening</th>
                        <th scope="col">Atas Nama</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($rekening as $r)
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $r->nama_bank ?></td>
                        <td><?= $r->no_rek ?></td>
                        <td><?= $r->atas_nama ?></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                <div class="content py-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Jenis Pengiriman</label>
                        <select name="jasa_pengiriman" class="form-control" required>
                            <option>JNE</option>
                            <option>J&T</option>
                            <option>POS INDONESIA</option>
                            <option>SI CEPAT</option>
                        </select>
                        {{-- <input id="lastname" type="text" value="standard (Free)" class="form-control" readonly> --}}
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company">Upload Bukti</label>
                        <input type="file" name="bukti" class="form-control">
                        <input type="hidden" name="totbay" value="<?= $subtotal ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company">Atas Nama</label>
                        <input type="text" name="atas_nama" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer d-flex justify-content-between"><a href="basket.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                  <button type="submit" class="btn btn-primary">Order</button>
                </div>
              </form>
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
        </div>
      </div>
    </div>
  </div>
@endsection
