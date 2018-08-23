@extends('layouts.app')

@section('content')

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Penjualan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="">Daftar Penjualan</a></li>
                    <li class="active">Edit Data Penjualan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content mt-3">
  <div class="card">
    <div class="card-header">
      Edit Data Penjualan
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
           <ul class="pl-4 pt-2">
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
        </div>
      @endif
      <form class="row" action="{!! route('penjualan.update', $penjualan) !!}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $penjualan->id }}">
        <div class="form-group col-sm-6">
          <label for="buku">Judul Buku</label>
          <input type="text" name="buku" class="form-control" id="buku" placeholder="Masukkan Nama Buku" value="{{ $penjualan->buku }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="tanggal_jual">Tanggal Jual</label>
          <input type="text" name="tanggal_jual" class="form-control" id="tanggal_jual" placeholder="Masukkan Tanggal Penjualan" value="{{ $penjualan->tanggal_jual }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="harga">Harga Satuan</label>
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga penjualan" value="{{ $penjualan->harga }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="jumlah">Jumlah</label>
          <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan Jumlah Barang" value="{{ $penjualan->jumlah }}">
        </div>
        <button type="submit" name="editpenjualan" class="btn btn-primary mx-3"><i class="fa fa-save"> Save</i></button>
      </form>
    </div>
  </div>
</div>
@endsection
