@extends('dashboard.layouts.main')

@section('container')

{{-- versi 1 --}}
    {{-- <div class="row">
        <div class="col-md-12">
            <h2>Daftar Pengguna</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (Auth::user()->id != $user->id)
                                @if (Auth::user()->following->contains($user))
                                    <form action="{{ route('unfollow') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-danger">Berhenti Mengikuti</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-primary">Ikuti</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

{{-- versi 2 --}}

            <div class="table-responsive col-lg-10">
                <h2>Daftar Following</h2>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Following</th>
                            <th>Follower</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if(auth()->user()->id == $user->id)

                            @else
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->following->count() }}</td>
                                <td>{{ $user->followers->count() }}</td>
                                <td>
                                    @if (Auth::check() && Auth::user()->id == $user->id)
                                        <!-- User sedang melihat halaman profilnya sendiri -->
                                    
                                    @elseif (Auth::check() && Auth::user()->following->contains($user))
                                        <form action="{{ route('follower.unfollow') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Unfollow</button>
                                        </form>
                                    @else
                                        <form action="{{ route('follower.follow') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm">Follow</button>
                                        </form>

                                        {{-- <a href="{{ route('follower.follow', ['user_id' => $user->id, 'follower_id' => Auth::user()->id]) }}" class="btn btn-primary btn-sm">Follow</a> --}}
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>


@endsection