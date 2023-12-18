@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data Penyakit</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/diseases/{{ $disease->kd }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="kd" class="form-label">Kode Penyakit</label>
          <input type="text" class="form-control @error('kd') is-invalid @enderror" id="kd" name="kd" required autofocus value="{{ old('kd', $disease->kd) }}" autocomplete="off">
          @error('kd')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Penyakit</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $disease->nama) }}" autocomplete="off">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          @error('keterangan')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan', $disease->keterangan) }}" autocomplete="off">
          <trix-editor input="keterangan"></trix-editor>
        </div>

        <div class="mb-3">
          <label for="solusi" class="form-label">solusi</label>
          @error('solusi')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="solusi" type="hidden" name="solusi" value="{{ old('solusi', $disease->solusi) }}" autocomplete="off">
          <trix-editor input="solusi"></trix-editor>
        </div>
        
        <a href="/dashboard/diseases" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali </a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
  </div>
@endsection