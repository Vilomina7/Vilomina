@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Password</h1>
</div>
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
@if(session()->has('alert'))
  <div class="alert alert-danger col-lg-8" role="alert">
    {{ session('alert') }}
  </div>
@endif
<div class="col-lg-8">
        <form method="post" action="{{ route('pass.edit') }}">
          @csrf
          @method("PATCH")
          <div class="mb-3">
            <label for="old_password" class="form-label">Password Lama</label>
            {{-- <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" required autofocus value="{{ old('old_password', Auth::user()->password) }}"> --}}
            <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" required autofocus>
            @error('old_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>


@endsection