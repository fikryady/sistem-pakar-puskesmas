@extends('dashboard.layouts.main')

@section('container')
@can('admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif
<a href="/dashboard/users/create" class="btn btn-primary mb-3">
  <span>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
  </span> 
  Tambah Data User</a>
@if ('admin')
<div class="table-responsive col-lg-10">
    <h2>Admin</h2>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th class="border-2 border-dark" scope="col" style="width: 5%">No</th>
                <th class="border-2 border-dark" scope="col" style="width: 30%">Nama</th>
                <th class="border-2 border-dark" scope="col" style="width: 10%">Umur</th>
                <th class="border-2 border-dark" scope="col" style="width: 35%">Alamat</th>
                <th class="border-2 border-dark" scope="col" style="width: 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->is_admin == 1)
            <tr>
                <td class="border-2 border-dark">{{ $loop->iteration }}</td>
                <td class="border-2 border-dark">{{ $user->name }}</td>
                <td class="border-2 border-dark">{{ date_diff(date_create($user->tgl_lahir), date_create('today'))->y }}</td>
                <td class="border-2 border-dark">{{ $user->alamat }}</td>

                <td class="border-2 border-dark">
                  <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                      </svg>
                    </span>
                  </a>
                  <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0"
                          onclick="return confirm('Are you sure?')">
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
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endif

@if ('pasien')
<div class="table-responsive col-lg-10">
    <h2>Pasien</h2>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th class="border-2 border-dark" scope="col" style="width: 5%">No</th>
              <th class="border-2 border-dark" scope="col" style="width: 30%">Nama</th>
              <th class="border-2 border-dark" scope="col" style="width: 10%">Umur</th>
              <th class="border-2 border-dark" scope="col" style="width: 35%">Alamat</th>
              <th class="border-2 border-dark" scope="col" style="width: 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->is_admin == 0)
            <tr>
                <td class="border-2 border-dark">{{ $loop->iteration }}</td>
                <td class="border-2 border-dark">{{ $user->name }}</td>
                <td class="border-2 border-dark">{{ date_diff(date_create($user->tgl_lahir), date_create('today'))->y }}</td>
                <td class="border-2 border-dark">{{ $user->alamat }}</td>

                <td class="border-2 border-dark">
                    <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                      </span>
                    </a>
                    <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0"
                            onclick="return confirm('Are you sure?')">
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
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endcan
@endsection
