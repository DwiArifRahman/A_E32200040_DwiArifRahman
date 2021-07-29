@extends('admin/layouts/app')
@section('title', 'List Kategori')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">List Kategori</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                  <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#addKategori">Tambah</button>
                <table class="table align-items-center table-flush" id="data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">No.</th>
                      <th scope="col" class="sort" data-sort="budget">Nama Kategori</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($kategori as $k)
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td class="budget"><?= $k->nama_kategori ?></td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#editKategori<?= $k->id ?>">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusKategori<?= $k->id ?>">Hapus</button>
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

{{-- Modal Add Produk --}}
<div class="modal fade" id="addKategori" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('kategori.store') ?>" method="POST">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Nama Kategori</label>
              <input type="text" name="nama_kategori" class="form-control" id="recipient-name">
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
  
  @foreach ($kategori as $k)
  {{-- Modal Edit Produk --}}
  <div class="modal fade" id="editKategori<?= $k->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('kategori.update', $k->id) ?>" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label class="col-form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?= $k->nama_kategori ?>" class="form-control" id="recipient-name">
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

  @foreach ($kategori as $k)
  {{-- Modal Hapus Kategori --}}
  <div class="modal fade" id="hapusKategori<?= $k->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori : <?= $k->nama_kategori ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= route('kategori.destroy', $k->id) ?>" method="POST">
              @method('DELETE')
              @csrf
              <p>Yakin hapus kategori ini ??</p>
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