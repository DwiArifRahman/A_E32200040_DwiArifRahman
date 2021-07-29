@extends('admin/layouts/app')
@section('title', 'List Data Transaksi')
@section('content')
 <!-- Page content -->
 <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">List Data Transaksi</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#addTransaksi">Tambah</button>
            <table class="table align-items-center table-flush" id="data">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">No.</th>
                  <th scope="col" class="sort" data-sort="budget">Atas Nama</th>
                  <th scope="col" class="sort" data-sort="status">Alamat</th>
                  <th scope="col">Total Bayar</th>
                  <th scope="col" class="sort" data-sort="completion">Bukti</th>
                  {{-- <th scope="col">Atas Nama</th> --}}
                  <th scope="col">Status</th>
                  <th scope="col">Konfirmasi</th>
                  <th scope="col">Jasa Pengiriman</th>
                  <th scope="col">No Resi</th>
                  <th scope="col">Tambah Data Pengiriman</th>
                </tr>
              </thead>
              <tbody class="list">
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($transaksi as $t)
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td class="budget"><?= $t->atas_nama ?></td>
                    <td><?= $t->alamat ?></td>
                    <td>Rp. <?= $t->total_bayar ?></td>
                    <td>
                        {{-- <?= $t->bukti ?> --}}
                        <a class="btn btn-primary" href="<?= url('buktiTF', $t->bukti) ?>">Lihat</a>
                    </td>
                    {{-- <td class="text-right"><?= $t->atas_nama ?></td> --}}
                    <td class="text-right">
                        @if ($t->status == 0)
                            <span class="badge badge-warning">Belum Dikonfirmasi</span>
                            @elseif ($t->status == 1)
                            <span class="badge badge-success">Dikonfirmasi</span>
                        @endif
                    </td>
                    <td>
                        @if ($t->status == 0)
                            <button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi<?= $t->id ?>">Konfirmasi</button>
                            @else
                            -
                        @endif
                    </td>
                    @if ($t->status == 1)
                      <td>
                        @if ($t->jasa_pengiriman == '-')
                            Jasa Pengiriman Belum ditambahkan
                            @else
                            <?= $t->jasa_pengiriman ?>
                        @endif
                      </td>
                      <td>
                        @if ($t->no_resi == '-')
                            Belum ada no resi
                            @else
                            <?= $t->no_resi ?>
                        @endif
                      </td>
                      @else
                      <td>-</td>
                      <td>-</td>
                    @endif
                    <td>
                        @if ($t->status == 1)
                                              <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $t->id ?>">Update Transaksi</button>
                                              <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $t->id ?>">Hapus</button>
                            @else
                            -
                        @endif
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- Card footer -->
        </div>
      </div>
    </div>
@endsection

<div class="modal fade" id="addTransaksi" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('admin.transaksi.store') ?>" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Atas Nama</label>
              <input type="text" name="atas_nama" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Total Bayar</label>
              <input type="text" name="total_bayar" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Bukti</label>
            <select name="bukti" class="form-control" required>
                <option>Belum Ada</option>
            </select>
              {{-- <input type="text" name="bukti" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label class="col-form-label">Status</label>
              <select name="status" class="form-control" required>
                <option>-</option>
              </select>
              {{-- <input type="text" name="status" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label class="col-form-label">Konfirmasi</label>
              <select name="konfirmasi" class="form-control" required>
                <option>Belum Dikonfirmasi</option>
              </select>
              {{-- <input type="text" name="konfirmasi" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label class="col-form-label">Jasa Pengiriman</label>
              <select name="jasa_pengiriman" class="form-control" required>
                <option>JNE</option>
                <option>J&T</option>
                <option>POS INDONESIA</option>
                <option>SI CEPAT</option>
            </select>
              {{-- <input type="text" name="jasa_pengiriman" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label class="col-form-label">No Resi</label>
              <input type="text" name="no_resi" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Tambah Data Pengiriman</label>
              <input type="text" name="tambah_data_pengiriman" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @foreach ($transaksi as $r)
  {{-- Modal Edit Produk --}}
  <div class="modal fade" id="edit<?= $r->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('admin.transaksi.update', $r->id) ?>" method="POST">
              @method('PUT')
              @csrf
              {{-- <div class="form-group">
                <label class="col-form-label">Atas Nama</label>
                <input type="text" name="atas_nama" value="<?= $r->atas_nama ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Alamat</label>
                <input type="text" name="alamat" value="<?= $r->alamat ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Total_bayar</label>
                <input type="text" name="total_bayar" value="<?= $r->total_bayar ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Bukti</label>
                <select name="bukti" class="form-control" required>
                    <option>Ada</option>
                </select>
                <input type="file" name="bukti" value="<?= $r->bukti ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Status</label>
                <input type="text" name="status" value="<?= $r->status ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Konfirmasi</label>
                <input type="text" name="konfirmasi" value="<?= $r->konfirmasi ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Jasa Pengiriman</label>
                <select name="jasa_pengiriman" class="form-control" required>
                    <option>JNE</option>
                    <option>J&T</option>
                    <option>POS INDONESIA</option>
                    <option>SI CEPAT</option>
                </select>
              </div> --}}
              <div class="form-group">
                <label class="col-form-label">No Resi</label>
                <input type="text" name="no_resi" value="<?= $r->no_resi ?>" class="form-control" id="recipient-name">
              </div>
              {{-- <div class="form-group">
                <label class="col-form-label">Tambah Data Pengiriman</label>
                <input type="text" name="tambah_data_pengiriman" value="<?= $r->tambah_data_pengiriman ?>" class="form-control" id="recipient-name">
              </div> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Resi</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endforeach

{{-- Modal Konfirmasi --}}
@foreach ($transaksi as $t)
<div class="modal fade" id="konfirmasi<?= $t->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= route('admin.transaksi.update', $t->id) ?>" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
              Konfirmasi transaksi ini ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

{{-- Modal Pengiriman --}}
@foreach ($transaksi as $t)
<div class="modal fade" id="addKurir<?= $t->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah/Edit data pengiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= route('admin.transaksi.pengiriman', $t->id) ?>" method="post">
          @method('PUT')
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Jasa Pengiriman</label>
                <input type="text" name="kurir" class="form-control" value="<?= $t->jasa_pengiriman ?>">
              </div>
              <div class="form-group">
                <label>Nomor Resi</label>
                <input type="text" name="no_resi" class="form-control" value="<?= $t->no_resi ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($transaksi as $r)
  {{-- Modal Hapus Kategori --}}
  <div class="modal fade" id="hapus<?= $r->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus data transaksi : <?= $r->id?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('admin.transaksi.destroy', $r->id) ?>" method="POST">
              @method('DELETE')
              @csrf
              <p>Yakin hapus data ini ??</p>
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
