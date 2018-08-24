@extends('layouts.auth')

@section('content')

<div class="container mt-3 animated fadeIn justify-content-center col-md-8">
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
      <strong class="cart-title">Register</strong>
    </div>
    <div class="card-body">
      <form class="row" action="{!! route('register') !!}" method="post">
        @csrf
        <div class="form-goup col-lg-6 mt-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}"  autofocus>

            @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" >
            
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" placeholder="Masukkan Jabatan" value="{{ old('jabatan') }}" >

            @if ($errors->has('jabatan'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jabatan') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="nip">NIP</label>
            <input type="text" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}" >

            @if ($errors->has('nip'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nip') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Masukkan Password" >

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-goup col-lg-6 mt-3">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >
        </div>
        <button type="submit" class="btn btn-primary m-3"><i class="fa fa-save"></i> Register</button>
      </form>
    </div>
  </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="admin" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="admin@admin.com" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required value="123123">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="123123">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
