@extends('layouts.app')

@section('content')

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Buku</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('buku') }}">Daftar Buku</a></li>
                    <li class="active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content mt-3 animated fadeIn">
  <div class="card">
    <div class="card-header">
      <strong class="cart-title">Tambah Data Buku</strong>
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
      <form class="row" action="{!! route('tambahbuku') !!}" method="post">
        @csrf
        <div class="form-group col-sm-6">
          <label for="judul">Judul</label>
          <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul Buku">
        </div>
        <div class="form-group col-sm-6">
          <label for="penulis">Penulis</label>
          <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Masukkan Penulis Buku">
        </div>
        <div class="form-group col-sm-6">
          <label for="penerbit">Penerbit</label>
          <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan Penerbit Buku">
        </div>
        <div class="form-group col-sm-3">
          <label for="tahun">Tahun Terbit</label>
          <input type="year" name="tahun_terbit" class="form-control" id="tahun" placeholder="{{ 'Ex. '.date('Y') }}">
        </div>
        <div class="form-group col-sm-3">
          <label for="jumlah">Jumlah Buku</label>
          <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Buku">
        </div>
        <div class="form-group col-sm-6">
          <label for="genre">Genre</label>
          <select id="genre" name="genre" class="selectpicker custom-select">
                <option value="0">Select Genre...</option>
              @foreach ($genres as $genre)
                <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="harga">Harga Buku</label>
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Buku">
        </div>

        <button type="submit" name="tambahbuku" class="btn btn-primary mx-3">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
