@extends('layouts.app')
@section('css')

@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Bagian</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('bagian.store') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama_bagian">Nama Bagian</label>
                <input type="text" class="form-control @error('nama_bagian') is-invalid @enderror" value="{{ old('nama_bagian') }}" id="nama_bagian" name="nama_bagian" placeholder="Masukan Nama Bagian">
                @error('nama_bagian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection
