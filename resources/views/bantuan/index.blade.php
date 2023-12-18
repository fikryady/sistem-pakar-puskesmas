@extends('layouts.main')

@section('container')
<div class="row justify-content-between">
    <div class="col-md-7 pt-5">
        <div class="alert alert-dark" style="background-color: rgba(153,219,245,1)">
            Apabila belum memiliki Username dan Password, silahkan mengisi form Registrasi terlebih dahulu
        </div>
        <div class="alert alert-dark" style="background-color: rgba(153,219,245,1)">
            Untuk menjaga keamanan informasi data pengguna, diharuskan melakukan login terlebih dahulu
        </div>
        <div class="alert alert-dark" style="background-color: rgba(153,219,245,1)">
            Untuk melakukan konsultasi, silahkan melengkapi data anda terlebih dahulu
        </div>
        <div class="alert alert-dark" style="background-color: rgba(153,219,245,1)">
            Setelah data anda lengkap silahkan lanjutkan konsultasi
        </div>
        <div class="alert alert-dark" style="background-color: rgba(153,219,245,1)">
            Untuk melihat hasil konsultasi, diharuskan  klik “Submit” data gejala sesuai yang dirasakan pengguna
        </div>
    </div>
    <div class="col-md-4">
      <div class="text-center">
        <img src="../img/bantuan/bantu.png" class="rounded" alt="...">
      </div>
    </div>
</div>
@endsection