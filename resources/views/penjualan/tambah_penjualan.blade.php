@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/lib/chosen/chosen.min.css') }}">

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Penjualan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('penjualan') }}">Daftar Penjualan</a></li>
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
      <strong class="cart-title">Tambah Data Penjualan</strong>
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
      <form class="row" action="{!! route('penjualan.tambah') !!}" method="post">
        @csrf
        <div class="form-group col-sm-6">
            <label for="buku">Pilih Buku</label>
            <select name="buku" data-placeholder="Silahkan pilih buku..." class="form-control" tabindex="1" id="buku">
                <option value=""></option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->judul }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-goup col-sm-6">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Barang" value="{{ old('jumlah') }}">
        </div>

        <div class="form-goup col-sm-6">
            <label for="tanggal_jual">Tanggal Jual</label>
            <input type="date" class="form-control" name="tanggal_jual" placeholder="Masukkan Tanggal Jual" value="{{ old('tanggal_jual ') }}">
        </div>
        
        <div class="form-group col-sm-6">
          <label for="harga">Harga Buku</label>
          <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Buku (Rp.)" value="{{ old('harga') }}">
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
        <button type="submit" name="tambahpenjualan" class="btn btn-primary mx-3"><i class="fa fa-plus"></i> Tambah</button>
      </form>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#buku").chosen({
            disable_search_threshold: 10,
            no_results_text: "Buku tidak ditemukan!",
            width: "100%"
        });
    });
</script>
@endsection
