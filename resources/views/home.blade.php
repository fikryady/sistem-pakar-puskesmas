@extends('layouts.main')

@section('container')
     
  <body >
    <div class="panel-body">
        <img src="/img/home/home.png" class="home" alt="Image">
            <h3 class="home" style="font-size: 25px;" >
                Selamat Datang Di Sistem Pakar Diagnosa Penyakit Tuberculosis
            </h3>
            @if(auth()->check() && auth()->user()->is_admin == 0)
                <p class="home">
                    Website sistem pakar ini bertujuan untuk memberikan kemudahan bagi masyarakat dalam mendiagnosa Penyakit Tuberculosis. Sistem pakar ini menggunakan metode Teorema Bayes dalam mencari nilai kepastiannya.
                </p> 
                @else
                <p class="home">
                    Website sistem pakar ini bertujuan untuk memberikan kemudahan bagi masyarakat dalam mendiagnosa Penyakit Tuberculosis. Sistem pakar ini menggunakan metode Teorema Bayes dalam mencari nilai kepastiannya.
                    <br>
                    Untuk melakukan proses pendiagnosaan penyakit caranya cukup mudah, yaitu user cukup <a href="{{ route('registrasi') }}">registrasi</a>, lalu setelah melakukan registrasi user melakukan login dan memilih gejala-gejala yang dirasakan pada halaman konsultasi. Setelah itu sistem akan menampilkan hasil diagnosa Penyakit Tuberculosis.
                </p>
            @endif
    </div>
@endsection
    
