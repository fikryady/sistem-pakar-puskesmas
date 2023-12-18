@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Gejala</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    

  <div class="table-responsive col-lg-9">
    <a href="/dashboard/symptoms/create" class="btn btn-primary mb-3">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
      </span> 
      Tambah Data Gejala
    </a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Nama</th>
          <th scope="col">Bobot</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($symptoms as $symptom)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $symptom->kd }}</td>
          <td>{{ Str::of($symptom->nama)->limit(50)}}</td>
          <td>{{ $symptom->bobot }}</td>
          <td>
            
              <a href="/dashboard/symptoms/{{ $symptom->kd }}/edit" class="badge bg-warning">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                  </svg>
                </span>
              </a>
              <form action="/dashboard/symptoms/{{ $symptom->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </span>
                </button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
      {{ $symptoms->links() }}
      </div>
  </div>

@endsection