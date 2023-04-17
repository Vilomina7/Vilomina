@extends('layouts.main')

@section('container')
    <h1 class="mb-3 pt-3 text-center"></h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/offer">
                @if(request('promo'))
                    <input type="hidden" name="promo" value="{{ request('promo') }}">
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                @if(request('keyword'))
                    <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>


    <div class="container">
        <div class="row">
            {{-- @foreach ($post->skip(1) as $offer) --}}
            @foreach ($posts as $offer)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><a href="/detail/{{ $offer->slug }}" class="text-decoration-none text-dark">{{ $offer->title }}</a></h5>
                        <p class="card-text">
                            <small class="text-muted">
                                By. <a href="/offer?author={{ $offer->author->id }}" class="text-decoration-none">{{ $offer->author->name }}</a> {{ $offer->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text text-danger h5">Rp. {{ $offer->promo_price }}  <span class="text-decoration-line-through text-muted h6">Rp. {{ $offer->original_price }}</span></p>
                        <p>{{ $offer->lokasi }}  <span class="badge rounded-pill text-bg-info"><a href="/offer?promo={{ $offer->promo->slug }}" class="text-decoration-none text-dark">{{ $offer->promo->jenis }}</a></span></p>
                        <p class="text-secondary" style="font-size:11px">{{ $offer->new_at }} {{ $offer->expired_at }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div> --}}
    
@endsection
