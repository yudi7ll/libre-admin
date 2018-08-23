@extends('layouts.app')

@section('content')

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Pembelian</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Edit Data Pembelian</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content mt-3">
  <div class="card">
    <div class="card-header">
      Edit Data Pembelian
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
      <form class="row" action="{!! route('pembelian.update', $pembelian) !!}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $pembelian->id }}">
        <div class="form-group col-sm-6">
          <label for="barang">barang</label>
          <input type="text" name="barang" class="form-control" id="barang" placeholder="Masukkan Barang pembelian" value="{{ $pembelian->barang }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="jumlah">jumlah</label>
          <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan jumlah pembelian" value="{{ $pembelian->jumlah }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="harga">Harga Satuan</label>
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga pembelian" value="{{ $pembelian->harga }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="supplier">supplier</label>
          <input type="text" name="supplier" class="form-control" id="supplier" placeholder="Masukkan supplier pembelian" value="{{ $pembelian->supplier }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="status">Status</label>
          <select class="custom-select" name="status" id="status">
              <option value="">Pilih Status...</option>
              <option {{ $pembelian->status == 0 ? 'selected' : '' }} value="0">Hutang</option>
              <option {{ $pembelian->status == 1 ? 'selected' : '' }} value="1">Lunas</option>
          </select>
        </div>
        <div class="col-sm-6"></div>
        <button type="submit" name="editpembelian" class="btn btn-primary mx-3">Submit</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.selectpicker').on('change', function(){
    console.log('ok');
  });
</script>
@endsection
