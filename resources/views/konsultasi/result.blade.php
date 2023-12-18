@extends('layouts.main')

@section('container')
    <div class="container" style="overflow-y: scroll; max-height: 500px;">
        <div class="row justify-content-between">
            <div class="col-6">
                <div style="display: flex; gap: 20px;">
                    <a class="btn btn-warning" href="/" role="button">Kembali</a>
                    <a class="btn btn-primary btn-xs" href="{{ route('cetak', ['kodeKonsultasi' => $highestDiseaseCode]) }}" target="_blank">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                        </span>
                        Cetak
                    </a>
                </div>
                <p class="mt-2">Kode Konsultasi: {{ $highestDiseaseCode }} Tanggal Konsultasi: {{ $tanggalKonsultasi }}</p>
            </div>
            <div class="col-md-3 offset-md-3">
                <h3>Biodata Diri</h3>
                <p style="font-size: 13px">Nama: {{ $userName }}</p>
                <p style="font-size: 13px">Umur: {{ $userUmur }}</p>
                <p style="font-size: 13px">No HP: {{ $userPhoneNumber }}</p>
                <p style="font-size: 13px">Pekerjaan: {{ $userOccupation }}</p>
                <p style="font-size: 13px">Alamat: {{ $userAddress }}</p>
            </div>
        </div>
        <div class="container">
            <hr>
        </div>
        <div class="container">
            <h4>Hasil Konsultasi</h4>
            <p>Berdasarkan hasil analisa berdasarkan gejala-gejala yang dipilih:</p>
            <ul>
                @foreach ($symptoms as $symptom)
                    <li>{{ $symptom }}</li>
                @endforeach
            </ul>
            <p>Maka didapat hasil sebagai berikut:</p>
            <p>Nama penyakit yang dialami: {{ $highestDiseaseName }}</p>
            <p>Dengan tingkat kepastian: {{ number_format($highestDiseaseBayesPercent, 2) }}%</p>
            <p>Solusi untuk penyakit ini: {!! $highestDiseaseSolution !!}</p>
        </div>
    </div>
@endsection
