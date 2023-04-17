@extends('layouts.main')

@section('container')
    
<div class="container pb-2">
    
<form action="{{ route('compare') }}" method="POST">
    @csrf
    <div class="row pt-5">
        <div class="d-flex justify-content-center">
            <img class="mb-4" src="/img/VilominaLogoIcon2.png" alt="" width="100" height="100">
          </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-6">
            <div class="form-group">
                <label for="post1">Penawaran 1:</label>
                <select name="post1" id="post1" class="form-control">
                    @foreach ($post as $p)
                    <option value="{{ $p->id }}" selected>{{ $p->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="post2">Penawaran 2:</label>
                <select name="post2" id="post2" class="form-control">
                    @foreach ($post as $p)
                        <option value="{{ $p->id }}" selected>{{ $p->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
<br>
    <div class="d-flex justify-content-center pt-2">
    <button type="submit" class="btn btn-primary">Bandingkan</button>
    </div>
</form>

</div>

    {{-- <a href="/penawaran">Back To Posts</a> --}}
@endsection