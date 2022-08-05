@extends('layouts.app')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
          <form action="{{ route('pegawai.update',$pegawai->id_pegawai) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="alamat_pegawai">Nama Pegawai</label>
                <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ $pegawai->nama_pegawai }}" id="nama_pegawai" name="nama_pegawai" placeholder="Masukan Nama Bagian">
                @error('nama_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="hp_pegawai">No Hp Pegawai</label>
                <input type="text" class="form-control @error('hp_pegawai') is-invalid @enderror" value="{{ $pegawai->hp_pegawai }}" id="hp_pegawai" name="hp_pegawai" placeholder="Masukan Nama Bagian">
                @error('hp_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="jabatan_pegawai">Jabatan</label>
                <input type="text" class="form-control @error('jabatan_pegawai') is-invalid @enderror" value="{{ $pegawai->jabatan_pegawai }}" id="jabatan_pegawai" name="jabatan_pegawai" placeholder="Masukan Nama Bagian">
                @error('jabatan_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Bagian</label>
                <select class="form-control select2bs4 @error('id_bagian') is-invalid @enderror" id="id_bagian" name="id_bagian" style="width: 100%;">
                  <option selected value="{{ $pegawai->id_bagian }}">{{ $pegawai->id_bagian }}</option>
                  @foreach($bagian as $bagian)
                  <option value="{{ $bagian->id_bagian }}">{{ $bagian->id_bagian }} - {{ $bagian->nama_bagian }}</option>
                  @endforeach
                </select>
                @error('id_bagian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="alamat_pegawai">Alamat</label>
                <textarea name="alamat_pegawai" id="alamat_pegawai" class="form-control @error('alamat_pegawai') is-invalid @enderror" placeholder="Masukan Alamat" rows="8" cols="80">{{ $pegawai->alamat_pegawai }}</textarea>
                @error('alamat_pegawai')
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
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
  // DropzoneJS Demo Code End
</script>
@endsection
