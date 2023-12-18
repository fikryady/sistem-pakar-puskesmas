@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Konsultasi</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-10">
  <a class="btn btn-primary mb-3" href="{{ route('cetak_laporan') }}" target="_blank">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                <rect x="6" y="14" width="12" height="8"></rect>
            </svg>
        </span>
        Cetak Laporan
    </a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th class="border-2 border-dark text-center" scope="col ">No</th>
                <th class="border-2 border-dark text-center" scope="col ">Kode Konsultasi</th>
                <th class="border-2 border-dark text-center" scope="col">Nama Pasien</th>
                <th class="border-2 border-dark text-center" scope="col">Tanggal Konsultasi</th>
                <th class="border-2 border-dark text-center" scope="col">Nama penyakit</th>
                <th class="border-2 border-dark text-center" scope="col">Hasil</th>
                <th class="border-2 border-dark text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $index => $item)
            <tr>
                <td class="border-2 border-dark">{{ $loop->iteration }}</td>
                <td class="border-2 border-dark">{{ $item->kd_konsultasi }}</td>
                <td class="border-2 border-dark">{{ $item->user->name }}</td>
                <td class="border-2 border-dark">{{ date_format(date_create($item->tgl), 'd-m-Y') }}</td>
                <td class="border-2 border-dark">{{ $item->disease->nama }}</td>
                <td class="border-2 border-dark">{{ $item->bayes_value }}%</td>
                <td class="border-2 border-dark text-center">
                    <a class="btn btn-primary btn-xs" href="{{ route('cetak', ['kodeKonsultasi' => $item->kd_konsultasi]) }}" target="_blank">Cetak</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $riwayat->links() }}
    </div>
</div>

@endsection
