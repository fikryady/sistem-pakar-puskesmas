@extends('layouts.main')

@section('container')
    <div class="container" style="overflow-y: scroll; max-height: 500px;">
        <div class="row justify-content-between">
            <div class="col-6">
                <div style="display: flex; gap: 20px;">
                    <a class="btn btn-warning" href="/" role="button">Kembali</a>
                </div>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penyakit</th>
                    <th scope="col">Tanggal Konsultasi</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $item->disease->nama }}</td>
                        <td>{{ date_format(date_create($item->tgl), 'd-m-Y') }}</td>
                        <td>{{ $item->bayes_value }}%</td>
                        <td><a class="btn btn-primary btn-xs" href="{{ route('cetak', ['kodeKonsultasi' => $item->kd_konsultasi]) }}" target="_blank">Cetak</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
