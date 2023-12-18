@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Gejala</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/symptoms" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="kd" class="form-label">Kode</label>
          <input type="text" class="form-control @error('kd') is-invalid @enderror" id="kd" name="kd" required autofocus value="{{ old('kd') }}" autocomplete="off">
          @error('kd')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Gejala</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}" autocomplete="off">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="bobot" class="form-label">Bobot</label>
          <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required value="{{ old('bobot') }}">
          @error('bobot')
          <div class="invalid-feedback"> 
            {{ $message }}
          </div>
          @enderror
        </div>
        <a href="/dashboard/symptoms" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
  </div>

@endsection