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
                    <li class="active">{{ $buku->judul }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content animated fadeIn mt-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">{{ $buku->judul }}</strong>
        </div>
        <div class="card-body">
            <table class="table d-table-cell">
                <tr>
                    <th>Judul</th>
                    <th>:</th>
                    <td>{{ $buku->judul }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <th>:</th>
                    <td>{{ $buku->penulis }}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <th>:</th>
                    <td>{{ $buku->penerbit }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <th>:</th>
                    <td>{{ $buku->tahun_terbit }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <th>:</th>
                    <td>{{ $buku->jumlah }}</td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <th>:</th>
                    <td>{{ $buku->genre }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td>{{ $buku->harga }}</td>
                </tr>
            </table>
            <form class="form-inline my-3" action="{!! route('buku.delete', $buku) !!}" method="POST">
                <a href="{!! route('buku.edit', $buku) !!}"><i class="btn btn-primary fa fa-edit mr-1"> Edit</i></a>
                @csrf
                @method('DELETE')
                <button class="fa fa-trash btn btn-danger ml-auto" type="submit"> Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection