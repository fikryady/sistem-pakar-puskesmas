@extends('layouts.main')

@section('container')
<div class="row justify-content-between">
    <div class="col-4">
      <div class="text-center">
        <img src="../img/login.png" class="rounded" alt="...">
      </div>
    </div>
    <div class="col-4">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
                @csrf
              <div class="form-floating pt-2">
                <input style="background-color: rgba(229,243,244,1)" type="text" name='name' class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}" autocomplete="off">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating pt-2">
                <input style="background-color: rgba(229,243,244,1)" type="text" name='username' class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}" autocomplete="off">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating pt-2">
                <input style="background-color: rgba(229,243,244,1)" type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}" autocomplete="off">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-floating pt-2">
                <input style="background-color: rgba(229,243,244,1)" type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
          </main>             
    </div>
</div>
@endsection