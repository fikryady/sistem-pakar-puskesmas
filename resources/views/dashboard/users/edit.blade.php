@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data User</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/users/{{ $user->username }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
              <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" name='name' class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}" autocomplete="off">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name='username' class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username', $user->username) }}" autocomplete="off">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
           
              <div class="mb-3">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control rounded-bottom @error('tgl_lahir')is-invalid @enderror" id="tgl_lahir" placeholder="tgl_lahir" required value="{{ old('tgl_lahir', $user->tgl_lahir) }}" required>
                @error('tgl_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
              <div class="mb-3">
                <label for="no_hp">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control @error('no_hp')is-invalid @enderror" id="no_hp" placeholder="Nomor Telefon" required value="{{ old('no_hp', $user->no_hp) }}" autocomplete="off">
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              
                <div class="mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat')is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat', $user->alamat) }}" autocomplete="off">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
              <div class="mb-3">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan')is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan" required value="{{ old('pekerjaan', $user->pekerjaan) }}" autocomplete="off">
                @error('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email', $user->email) }}" autocomplete="off">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>


        <a href="/dashboard/users" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
  </div>
@endsection