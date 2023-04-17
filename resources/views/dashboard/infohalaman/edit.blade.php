@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Informasi Halaman</h1>
</div>
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
@if(session()->has('alert'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('alert') }}
  </div>
@endif
<div class="col-lg-8">
        <form method="post" action="{{ route('hal.update') }}">
          @method("put")
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
            @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="negara_id" class="form-label">Negara</label>
            <select class="form-select  @error('negara_id') is-invalid @enderror" name="negara_id">
                    <option value="Indonesia" selected>Indonesia</option>
                    <option value="Malaysia">Malaysia</option>
            </select>
            @error('negara_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="negara_id" class="form-label">Provinsi</label>
            <select class="form-select  @error('negara_id') is-invalid @enderror" name="negara_id">
                    <option value="Indonesia" selected>Jawa Barat</option>
                    <option value="Malaysia">DKI Jakarta</option>
            </select>
            @error('negara_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="negara_id" class="form-label">Kota / Kabupaten</label>
            <select class="form-select  @error('negara_id') is-invalid @enderror" name="negara_id">
                    <option value="Indonesia" selected>Garut</option>
                    <option value="Malaysia">Jakarta Selatan</option>
            </select>
            @error('negara_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Alamat Lengkap</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
            @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
{{-- 
<script>
  const name = document.querySelector('#name');
    const id = document.querySelector('#id');

    name.addEventListener('change', function(){
        fetch('/dashboard/profil/checkId?name=' + name.value)
        .then(response => response.json())
        .then(data => id.value = data.id)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });
</script> --}}

@endsection