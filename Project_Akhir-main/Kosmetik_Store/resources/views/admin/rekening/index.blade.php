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
            <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#addRekening">Tambah</button>
            <table class="table align-items-center table-flush" id="data">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">No.</th>
                  <th scope="col" class="sort" data-sort="budget">No. Rekening</th>
                  <th scope="col" class="sort" data-sort="status">Nama Bank</th>
                  <th scope="col">Atas Nama</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($rekening as $r)
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td class="budget"><?= $r->no_rek ?></td>
                    <td><?= $r->nama_bank ?></td>
                    <td><?= $r->atas_nama ?></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $r->id ?>">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $r->id ?>">Hapus</button>
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

<div class="modal fade" id="addRekening" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('rekening.store') ?>" method="POST">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Nama Bank</label>
              <input type="text" name="bank" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">No Rekening</label>
              <input type="number" name="norek" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Atas Nama</label>
              <input type="text" name="atas_nama" class="form-control" id="recipient-name">
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
  
  @foreach ($rekening as $r)
  {{-- Modal Edit Produk --}}
  <div class="modal fade" id="edit<?= $r->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Rekening</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('rekening.update', $r->id) ?>" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label class="col-form-label">Nama Bank</label>
                <input type="text" name="bank" value="<?= $r->nama_bank ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">No Rekening</label>
                <input type="number" name="norek" value="<?= $r->no_rek ?>" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label class="col-form-label">Atas Nama</label>
                <input type="text" name="atas_nama" value="<?= $r->atas_nama ?>" class="form-control" id="recipient-name">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endforeach

  @foreach ($rekening as $r)
  {{-- Modal Hapus Kategori --}}
  <div class="modal fade" id="hapus<?= $r->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus No. Rekening : <?= $r->no_rek ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('rekening.destroy', $r->id) ?>" method="POST">
              @method('DELETE')
              @csrf
              <p>Yakin hapus nomor ini ??</p>
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