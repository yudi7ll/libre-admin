@extends('layouts.app')
@section('content')

<!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Semua Staff</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content animated fadeIn mt-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Your Profile</strong>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action"><strong>NIP : </strong>{{ $user->nip }}</li>
                <li class="list-group-item list-group-item-action"><strong>Nama : </strong>{{ $user->nama }}</li>
                <li class="list-group-item list-group-item-action"><strong>Jabatan : </strong>{{ $user->jabatan }}</li>
                <li class="list-group-item list-group-item-action"><strong>Email : </strong>{{ $user->email }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection

