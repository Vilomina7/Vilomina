
@extends('layouts.main')

@section('container')
    <h1 class="mb-3 pt-3">Halaman Jenis Promo</h1>

    @foreach ($promos as $promo)
        <ul>
            <li>
                <h2><a href="/promo/{{ $promo->slug }}">{{ $promo->jenis }}</a></h2>
            </li>
        </ul>
    @endforeach
@endsection
