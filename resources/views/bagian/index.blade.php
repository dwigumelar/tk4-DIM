@extends('layouts.app')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $message }}
            </div>
        @endif
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" href="{{ route('bagian.create') }}"> Buat Bagian</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="bagian" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="width:5%">Id</th>
                <th>Nama Bagian</th>
                <th style="width:20%">Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($bagian as $bagian)
              <tr>
                <td>{{ $bagian->id_bagian }}</td>
                <td>{{ $bagian->nama_bagian }}</td>
                <td>
                  <form action="{{ route('bagian.destroy',$bagian->id_bagian) }}" method="Post">
                      <a class="btn btn-primary" href="{{ route('bagian.edit',$bagian->id_bagian) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin mau menghapus ini?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
@section('javascript')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#bagian").DataTable({
      "responsive": true,
      "autoWidth": false,
      "lengthMenu":  [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "dom": "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#bagian_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
