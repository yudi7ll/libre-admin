@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">

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
                    <li><a href="{{ route('staff.profile') }}">Profile</a></li>
                    <li class="active">Manage Staff</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->

<div class="content animated fadeIn mt-3">
  @if (session('messages'))  
    <div class="alert alert-{{ session('messages')[0] }} alert-dismissible fade show" role="alert">
        <span class="badge badge-{{ session('messages')[0] }}">{{ session('messages')[1] }}</span> {{ session('messages')[2] }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <strong class="card-title">Data Staff</strong>
          </div>
          <div class="card-body">
            <div class="m-3">
              <a href="{{ route('staff.create') }}" class="btn btn-primary my-1"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($staffs as $staff)
                  <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $staff->nip }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->jabatan }}</td>
                    <td>
                      <form class="form-inline" action="{!! route('staff.destroy', $staff) !!}" method="POST">
                          <a href="{!! route('staff.edit', $staff) !!}"><i class="fa fa-pencil text-primary mr-1"></i></a>
                          @csrf
                          @method('DELETE')
                          <button class="submit fa fa-trash text-danger btn-link btn btn-sm" type="submit"></button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div> <!-- card body -->
        </div>
      </div> <!-- card -->
    </div>
</div>

<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script>
@endsection