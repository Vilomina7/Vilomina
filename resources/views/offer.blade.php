@extends('layouts.main')

@section('container')
    <h1 class="mb-3 pt-3 text-center">{{ $title }}</h1>

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


    @if ($post->count())
    {{-- <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400?{{ $post[0]->promo->jenis }}" class="card-img-top" alt="{{ $post[0]->promo->jenis }}">
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/detail/{{ $post[0]->slug }}" class="text-decoration-none">{{ $post[0]->title }}</a></h3>
            <p class="card-text">
                <small class="text-muted">
                By. <a href="/offer?author={{ $post[0]->author->id }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/offer?promo={{ $post[0]->promo->slug }}"  class="text-decoration-none">{{ $post[0]->promo->jenis}}</a> {{ $post[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{!! $post[0]->description !!}</p>
            <a href="/detail/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

        </div>
    </div> --}}


    <div class="container">
        <div class="row">
            {{-- @foreach ($post->skip(1) as $offer) --}}
            @foreach ($post as $offer)
            <div class="col-md-4 mb-3">
                <div class="card">
                    {{-- <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0.7)"><a href="/offer?promo={{ $offer->promo->slug }}" class="text-white text-decoration-none">{{ $offer->promo->jenis }}</a></div> --}}
                    @if($offer->image)
                        <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->title }}">
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $offer->promo->jenis }}" class="card-img-top" alt="{{ $offer->promo->jenis }}">
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

    @else
    <p class="text-center fs-4">No Post Found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $post->links() }}
    </div>
    
@endsection
