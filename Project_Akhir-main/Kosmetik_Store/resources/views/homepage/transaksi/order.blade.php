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
          <div id="customer-orders" class="col-lg-9">
            <div class="box">
              <h1>My orders</h1>
              <p class="lead">Your orders on one place.</p>
              <p class="text-muted">Jika telah dikonfirmasi, admin akan kirim kan no resi pada halaman ini, terimakasih</p>
              <hr>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Order</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Kurir</th>
                      <th>No. Resi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order as $o)
                    <tr>
                      <th>#<?= $o->id ?></th>
                      <td><?= $o->created_at ?></td>
                      <td>Rp. <?= $o->total_bayar ?></td>
                      <td>
                        @if ($o->status == 0)
                          <span class="badge badge-warning">Proses Konfirmasi</span>
                          @elseif ($o->status == 1)
                          <span class="badge badge-info">Dikonfirmasi</span>
                        @endif
                      </td>
                      <td>
                        @if ($o->jasa_pengiriman == '-')
                            Jasa Pengiriman Belum ditambahkan
                            @else
                            <?= $o->jasa_pengiriman ?>
                        @endif
                      </td>
                      <td>
                        <?= $o->no_resi ?>
                      </td>
                      <td><a href="<?= route('order.view', $o->id) ?>" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
