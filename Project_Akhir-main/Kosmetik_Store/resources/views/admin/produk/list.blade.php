@extends('admin/layouts/app')
@section('title', 'List Data Produk')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">List Data Produk</h3>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                  <button type="button" class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#addProduk">Tambah</button>
                <table class="table align-items-center table-flush" id="data">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">No.</th>
                      <th scope="col" class="sort" data-sort="budget">Nama Produk</th>
                      <th scope="col" class="sort" data-sort="status">Gambar</th>
                      <th scope="col">Kategori</th>
                      {{-- <th scope="col" class="sort" data-sort="completion">Terjual</th> --}}
                      <th scope="col">Stok</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($produk as $p)
                      {{-- @php
                          dd($p)
                      @endphp --}}
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td class="budget"><?= $p->nama_produk ?></td>
                        <td>
                            <a href="#" class="avatar avatar-md rounded-circle" data-toggle="tooltip">
                              <img src="<?= url('produk/', $p->gambar) ?>">
                            </a>
                        </td>
                        <td><?= $p->kategori->nama_kategori ?></td>
                        {{-- <td><?= $p->terjual ?> Terjual</td> --}}
                        <td><?= $p->stok ?> pcs</td>
                        <td>Rp <?= $p->harga ?></td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#editProduk<?= $p->id ?>">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#hapusProduk<?= $p->id ?>">Hapus</button>
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
<div class="modal fade" id="addProduk" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('produk.store') ?>" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-form-label">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Kategori</label>
              <select name="kategori" class="form-control" required>
                  <option>Pilih Kategori</option>
                  @foreach ($kategori as $k)
                  <option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="col-form-label">Gambar Produk</label>
              <input type="file" name="gambar" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Stok</label>
              <input type="number" name="stok" class="form-control" id="recipient-name" required>
            </div>
            <div class="form-group">
                <label class="col-form-label">Harga Produk</label>
                <input type="number" name="harga" class="form-control" id="recipient-name" required>
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

{{-- Modal Edit Produk --}}
@foreach ($produk as $p)
<div class="modal fade" id="editProduk<?= $p->id ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('produk.update', $p->id) ?>" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label class="col-form-label">Nama Produk</label>
              <input type="text" name="nama_produk" value="<?= $p->nama_produk ?>" class="form-control" id="recipient-name" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Kategori</label>
              <select name="kategori" class="form-control" required>
                  <option value="<?= $p->kategori->id ?>"><?= $p->kategori->nama_kategori ?></option>
                  <option>-------------------</option>
                  @foreach ($kategori as $k)
                  <option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="col-form-label">Gambar Produk</label>
              <input type="file" name="gambar" value="<?= $p->gambar ?>" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label class="col-form-label">Stok</label>
              <input type="number" name="stok" value="<?= $p->stok ?>" class="form-control" id="recipient-name" required>
            </div>
            <div class="form-group">
                <label class="col-form-label">Harga Produk</label>
                <input type="number" name="harga" value="<?= $p->harga ?>" class="form-control" id="recipient-name" required>
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

  @foreach ($produk as $p)
  <!-- Modal Hapus -->
<div class="modal fade" id="hapusProduk<?= $p->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk : <?= $p->nama_produk ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= route('produk.destroy', $p->id) ?>" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          Yakin hapus produk ini ??
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
