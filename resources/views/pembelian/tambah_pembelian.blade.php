@extends('layouts.app')

@section('content')
<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Pembelian</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('pembelian') }}">Daftar Pembelian</a></li>
                    <li class="active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content mt-3 animated fadeIn">
    @if (session('messages'))  
        <div class="alert alert-{{ session('messages')[0] }} alert-dismissible fade show" role="alert">
            <span class="badge badge-{{ session('messages')[0] }}">{{ session('messages')[1] }}</span> {{ session('messages')[2] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  <div class="card">
    <div class="card-header">
      <strong class="cart-title">Tambah Data Pembelian Barang</strong>
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
      <form class="row" action="{!! route('pembelian.tambah') !!}" method="post">
        @csrf
        <div class="form-group col-sm-6">
          <label for="barang">Nama Barang</label>
          <input type="text" name="barang" class="form-control" id="barang" placeholder="Masukkan Nama Barang">
        </div>
        <div class="form-group col-sm-6">
            <label for="jumlah">Jumlah Barang</label>
            <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan Jumlah Barang">
        </div>
        <div class="form-group col-sm-6">
            <label for="harga">Harga Barang</label>
            <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Barang">
        </div>
        <div class="form-group col-sm-6">
            <label for="supplier">Nama Supplier</label>
            <input type="text" name="supplier" class="form-control" id="supplier" placeholder="Masukkan Supplier">
        </div>
        <div class="form-group col-sm-6">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="status">
                <option value="">Pilih Status...</option>
                <option value="0">Hutang</option>
                <option value="1">Lunas</option>
            </select>
        </div>
        <div class="col-sm-6"></div>
        
        <button type="submit" name="tambahpembelian" class="btn btn-primary mx-3"><i class="fa fa-save"></i> Save</button>
      </form>
    </div>
  </div>
</div>
@endsection
