@extends('dashboard.layouts.main')

@section('container')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div> --}}

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

<div class="table-responsive col-lg-10">
  <h2>My Posts</h2>
  <div class="dropdown-divider"></div>
    <a href="/dashboard/posts/create" class="btn btn-primary mb-2">Create New Post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Promo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->promo->jenis }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info">Detail</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">Update</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
             @method('delete')
             @csrf
             <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
              Delete
             </button>
            </form>
          </td>
        </tr>   
        @endforeach
      </tbody>
    </table>
  </div>

@endsection