@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">



  <!-- Header-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Semua Penjualan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Daftar Penjualan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /header -->


<div class="content mt-3">
  @if (session('messages'))  
    <div class="alert alert-{{ session('messages')[0] }} alert-dismissible fade show" role="alert">
        <span class="badge badge-{{ session('messages')[0] }}">{{ session('messages')[1] }}</span> {{ session('messages')[2] }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <strong class="card-title">Data Penjualan</strong>
          </div>
          <div class="card-body">
            <div class="m-3">
              <a href="{{ route('penjualan.tambah') }}" class="btn btn-primary my-1"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Buku</th>
                  <th>Tanggal Jual</th>
                  <th>Harga Satuan</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($penjualans as $penjualan)
                  <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ str_limit($penjualan->buku, 20) }}</td>
                    <td>{{ $penjualan->created_at->diffForHumans() }}</td>
                    <td>{{ 'Rp. '.$penjualan->harga }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>{{ 'Rp. '.$penjualan->harga * $penjualan->jumlah }}</td>
                    <td>
                      <form class="form-inline" action="{!! route('penjualan.delete', $penjualan) !!}" method="POST">
                          <a href="{!! route('penjualan.edit', $penjualan) !!}"><i class="fa fa-pencil text-primary mr-1"></i></a>
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
  </div><!-- .animated -->
</div><!-- .content -->


{{-- datatables bootstrap 4 --}}
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

{{-- init datatables --}}
<script type="text/javascript">
(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/

  $('#bootstrap-data-table').DataTable({
    lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
    order: [2, 'desc']
  });



  $('#bootstrap-data-table-export').DataTable({
    dom: 'lBfrtip',
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
  
  $('#row-select').DataTable( {
      initComplete: function () {
        this.api().columns().every( function () {
          var column = this;
          var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
              );
    
              column
                .search( val ? '^'+val+'$' : '', true, false )
                .draw();
            } );
    
          column.data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
        } );
      }
    } );
})(jQuery);
</script>
@endsection
