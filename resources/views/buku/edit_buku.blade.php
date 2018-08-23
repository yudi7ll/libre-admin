@extends('layouts.app')

@section('content')

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Buku</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('buku') }}">Daftar Buku</a></li>
                    <li class="active">Edit Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content mt-3">
  <div class="card">
    <div class="card-header">
      Edit Data Buku
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
        </div>
      @endif
      <form class="row" action="{!! route('buku.update', $buku) !!}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $buku->id }}">
        <div class="form-group col-sm-6">
          <label for="judul">Judul</label>
          <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul Buku" value="{{ $buku->judul }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="penulis">Penulis</label>
          <input type="text" name="penulis" class="form-control" id="penulis" placeholder="Masukkan Penulis Buku" value="{{ $buku->penulis }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="penerbit">Penerbit</label>
          <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan Penerbit Buku" value="{{ $buku->penerbit }}">
        </div>
        <div class="form-group col-sm-3">
          <label for="tahun">Tahun Terbit</label>
          <input type="text" name="tahun_terbit" class="form-control" id="tahun" value="{{ $buku->tahun_terbit }}">
        </div>
        <div class="form-group col-sm-3">
          <label for="jumlah">Jumlah Buku</label>
          <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Buku" value="{{ $buku->jumlah }}">
        </div>
        <div class="form-group col-sm-6">
          <label for="genre">Genre</label>
          <select id="genre" name="genre" class="selectpicker custom-select">
              @foreach ($genres as $genre)
                <option {{ $genre->genre == $buku->genre ? 'selected' : '' }} value="{{ $genre->genre }}">{{ $genre->genre }}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="harga">Harga Buku</label>
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Buku" value="{{ $buku->harga }}">
        </div>

        <button type="submit" name="editbuku" class="btn btn-primary mx-3">Submit</button>
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
