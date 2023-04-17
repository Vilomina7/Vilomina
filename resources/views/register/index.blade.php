@extends('layouts.main')

@section('container')
<div class="row justify-content-center pt-4">
  <div class="col-lg-5">     
    <main class="form-registration">
      <div class="d-flex justify-content-center">
        <img class="mb-2" src="/img/VilominaLogoIcon2.png" alt="" width="170" height="170">
      </div>
      <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
      <form action="/register" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal_Lahir" required value="{{ old('tanggal_lahir') }}">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          @error('tanggal_lahir')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    
        {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Have Account? <a href="/login">Login Now!</a></small>
    </main>

  </div>
</div>
@endsection