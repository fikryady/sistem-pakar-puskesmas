@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="scrollable-container">
                @foreach ($diseases as $disease)
                    <div class="disease-card">
                        <img src="{{ asset('/img/informasi/' . $disease->nama . '.png') }}" alt="{{ $disease->nama }}">
                        <div class="disease-details">
                            <h2>{{ $disease->nama }}</h2>
                            <p><strong>Keterangan:</strong> {!! $disease->keterangan !!}</p>
                            <h4>Gejala:</h4>
                            <ul>
                                @foreach ($disease->rules as $rule)
                                    <li>{{ $rule->symptom->nama }}</li>
                                @endforeach
                            </ul>
                            <p><strong>Solusi:</strong> {!! $disease->solusi !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection