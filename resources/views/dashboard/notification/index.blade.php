@extends('dashboard.layouts.main')

@section('container')
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
  <h2>Daftar Notification</h2>
  <table class="table table-striped table-sm">
      <thead>
          <tr>
              <th>ID</th>
              <th>Message</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach (auth()->user()->notifications as $notification)
          <div>
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $notification->message }}</td>
              <td>
                <a href="/dashboard/posts/{{ $notification->post->slug }}" class="btn btn-sm btn-info">Detail</a>
                
                <form action="{{ route('notification.destroy', $notification->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          </div>
        @endforeach
      </tbody>
  </table>
  <br>
</div>



@endsection
