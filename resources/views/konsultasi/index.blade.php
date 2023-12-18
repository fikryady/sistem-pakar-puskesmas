@extends('layouts.main')

@section('container')
<div class="row justify-content-left"  style="overflow-y: scroll; max-height: 500px; overflow-x: hidden">
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-body">
                <form method="post" action="{{ route('process') }}">
                    @csrf

                    <div class="panel-body">
                        <h2>Pilih Gejala yang Anda Alami:</h2>
                        <div class="form-group {{ $errors->has('symptom') ? 'has-error' : '' }}">
        
                            @foreach($symptoms as $symptom)
                                <div class="checkbox p-1">
                                    <label>
                                        <input type="checkbox" name="symptom[]" value="{{ $symptom->id }}">
                                        {{ $symptom->nama }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="hidden" name="tanggal" value="{{ now() }}">
                    <div class="panel-footer mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
        
                @if($errors->all())
                    @include('layouts._formError')
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3 mr-4">
      <div class="text-center">
        <img src="../img/konsultasi/konsul.png" class="rounded" alt="...">
      </div>
    </div>
</div>

@endsection