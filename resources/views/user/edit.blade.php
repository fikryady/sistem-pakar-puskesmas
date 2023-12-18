@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h2">Edit Profile</h1>
                    </div>
                    <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                        <form method="POST" action="{{ route('profile.update', ['username' => $user->username]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}" autocomplete="off">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name='username' class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username', $user->username) }}" autocomplete="off">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir" required value="{{ old('tgl_lahir', $user->tgl_lahir) }}" required>
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor Telefon" required value="{{ old('no_hp', $user->no_hp) }}" autocomplete="off">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat', $user->alamat) }}" autocomplete="off">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan" required value="{{ old('pekerjaan', $user->pekerjaan) }}" autocomplete="off">
                                @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email', $user->email) }}" autocomplete="off">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="/" class="btn btn-secondary me-2"><span class="bi bi-arrow-left"></span> Kembali</a>
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
