@extends('layouts.app')
@section('content')
<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Data Staff</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('staff.profile') }}">Profile</a></li>
                    <li><a href="{{ route('staff.index') }}">Manage Staff</a></li>
                    <li class="active">Edit Data Staff</li>
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
      <strong class="cart-title">Edit Staff</strong>
    </div>
    <div class="card-body">
      <form class="row" action="{!! route('staff.update', $staff) !!}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-goup col-lg-6 mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" placeholder="Masukkan Nama" value="{{ $staff->nama }}"  autofocus>

            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Masukkan Email" value="{{ $staff->email }}" >
            
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" placeholder="Masukkan Jabatan" value="{{ $staff->jabatan }}" >

            @if ($errors->has('jabatan'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jabatan') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="nip">NIP</label>
            <input type="text" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip" placeholder="Masukkan NIP" value="{{ $staff->nip }}" >

            @if ($errors->has('nip'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nip') }}</strong>
                </span>
            @endif
        </div>
       
        <button type="submit" class="btn btn-primary m-3"><i class="fa fa-save"></i> Save</button>
      </form>
    </div>
  </div>
</div>
@endsection