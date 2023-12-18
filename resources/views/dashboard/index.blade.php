@extends('dashboard.layouts.main')

@section('container')
<div class="row mt-3">
    <div class="col-lg-12 m-2">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
<hr>
<div class="row m-3 mt-4">
    <div class="col-lg-3 col-md-6">
        <div class="card text-center" style="background-color: rgba(205,252,246,1); border:none">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <div class="row">
                    <div class="col-xs-12 mt-2">
                      <i class="fa-solid fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="huge mt-2" style="font-size: 24px;">{{ $users }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center" style="background-color: rgba(205,252,246,1); border:none">
            <div class="card-body">
                <h5 class="card-title">Penyakit</h5>
                <div class="row">
                    <div class="col-xs-12 mt-2">
                      <i class="fa-solid fa-viruses fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="huge mt-2" style="font-size: 24px;">{{ $diseases }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center" style="background-color: rgba(205,252,246,1); border:none">
            <div class="card-body">
                <h5 class="card-title">Gejala</h5>
                <div class="row">
                    <div class="col-xs-12 mt-2">
                      <i class="fa-solid fa-disease fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="huge mt-2" style="font-size: 24px;">{{ $symptoms }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center" style="background-color: rgba(205,252,246,1); border:none">
            <div class="card-body">
                <h5 class="card-title">Riwayat</h5>
                <div class="row">
                    <div class="col-xs-12 mt-2">
                      <i class="fa-solid fa-file-lines fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-center">
                        <div class="huge mt-2" style="font-size: 24px;">{{ $histories }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
