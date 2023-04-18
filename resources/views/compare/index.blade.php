@extends('layouts.main')

@section('container')


{{-- versi baru --}}
<div class="row pt-4">
    <div class="col-sm-6">
        @if($post1->image)
        <img src="{{ asset('storage/' . $post1->image) }}" alt="{{ $post1->title }}" width="100%" height="auto">
        @else
        <img src="https://source.unsplash.com/300x300?{{ $post1->promo->jenis }}" alt="{{ $post1->promo->jenis }}" width="100%" height="auto">
        @endif
        <p><a href="/offer?post={{ $post1->key_one }}"><span class="badge rounded-pill text-bg-secondary">{{ $post1->key_one }}</span></a> <span class="badge rounded-pill text-bg-secondary">{{ $post1->key_two }}</span> </p>
        <p><span class="badge rounded-pill text-bg-secondary">{{ $post1->key_three }}</span> <span class="badge rounded-pill text-bg-secondary">{{ $post1->key_four }}</span> </p>
        <p><span class="badge rounded-pill text-bg-secondary">{{ $post1->key_five }}</span></p>
        <div class="row">
            <h5>{{ $post1->title }}</h5>
            <p class="text-danger h5">Rp. {{ $post1->promo_price }}  <span class="text-decoration-line-through text-muted h6"> Rp. {{ $post1->original_price }}</span> <span class="badge rounded-pill text-bg-info"><a href="/offer?promo={{ $post1->promo->slug }}" class="text-decoration-none text-dark">{{ $post1->promo->jenis }}</a> {{ $post1->satuan_promo }} {{ $post1->nilai_promo }}</span></p>
            <p class="text-secondary" style="font-size:11px">{{ $post1->new_at }} - {{ $post1->expired_at }}</p>
        </div>
        
        <div class="row border border-dark-subtle ">
            <div class="col-lg-auto pt-2 pb-2">
                <img src="/img/toko.png" alt="" width="40">
                <a href="/offer?author={{ $post1->author->id }}" class="text-decoration-none text-dark">{{ $post1->author->name }}</a>
                <span class="text-secondary" style="font-size:11px">{{ $post1->author->followers->count() }} Follower </span>
            </div>
            <div class="col-lg-auto pt-2 pb-2">
                 @if(Auth::check())
                    @if (Auth::check() && Auth::user()->following->contains($post1->author->id))
                        <form action="{{ route('follower.unfollow') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $post1->author->id }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <button type="submit" class="btn btn-danger btn-sm">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('follower.follow') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $post1->author->id }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <button type="submit" class="btn btn-success btn-sm">Follow</button>
                        </form>
                    @endif
                @else
                    <a href="/login" class="btn btn-success btn-sm">Follow</a>
                @endif
            </div>
        </div>
       
        <div class="row mt-2">
            <div class="col">
                <a href="/bandingkan" class="btn btn-outline-success btn-sm">Bandingkan</a>
            </div>
            <div class="col">
                @if(Auth::check())
                    @if($post1->bookmarkedByUser(Auth::id()))
                        <button type="button" class="btn btn-primary btn-sm" disabled>Bookmark</button>
                    @else
                        <form action="{{ route('products.bookmark', $post1) }}" method="GET">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <input type="hidden" name="post_id" value="{{ $post1->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">Bookmark</button>
                        </form>
                    @endif 
                @else
                    <a href="/login" class="btn btn-primary btn-sm">Bookmark</a>
                @endif
            </div>
        </div>

        <h5>Deskripsi</h5>
        {!! $post1->description !!}
        <div class="row mt-2">
            <h5>Link Terkait dengan Penawaran</h5>
            <h6>
                <p><a href="{{ $post1->url_link1 }}" class="text-decoration-none text-dark">{{ $post1->nm_link1 }}</a></p>
                <p><a href="{{ $post1->url_link2 }}" class="text-decoration-none text-dark">{{ $post1->nm_link2 }}</a></p>
                <p><a href="{{ $post1->url_link3 }}" class="text-decoration-none text-dark">{{ $post1->nm_link3 }}</a></p>
            </h6>
        </div>
        <div class="row">
            <h5>Lokasi Terkait dengan Penawaran Ini</h5>
            <p>{{ $post1->lokasi }}</p>
        </div>
        <div class="row">
            <h5>Syarat dan Ketentuan</h5>
            <p>{{ $post1->syarat_ketentuan }}</p>
        </div>
    </div>
    <div class="col-sm-6">
        @if($post2->image)
        <img src="{{ asset('storage/' . $post2->image) }}" alt="{{ $post2->title }}" width="100%" height="auto">
        @else
        <img src="https://source.unsplash.com/300x300?{{ $post2->promo->jenis }}" alt="{{ $post2->promo->jenis }}" width="100%" height="auto">
        @endif
        <p><a href="/offer?post={{ $post2->key_one }}"><span class="badge rounded-pill text-bg-secondary">{{ $post2->key_one }}</span></a> <span class="badge rounded-pill text-bg-secondary">{{ $post2->key_two }}</span> </p>
        <p><span class="badge rounded-pill text-bg-secondary">{{ $post2->key_three }}</span> <span class="badge rounded-pill text-bg-secondary">{{ $post2->key_four }}</span> </p>
        <p><span class="badge rounded-pill text-bg-secondary">{{ $post2->key_five }}</span></p>
        <div class="row">
            <h5>{{ $post2->title }}</h5>
            <p class="text-danger h5">Rp. {{ $post2->promo_price }}  <span class="text-decoration-line-through text-muted h6"> Rp. {{ $post2->original_price }}</span> <span class="badge rounded-pill text-bg-info"><a href="/offer?promo={{ $post2->promo->slug }}" class="text-decoration-none text-dark">{{ $post2->promo->jenis }}</a> {{ $post2->satuan_promo }} {{ $post2->nilai_promo }}</span></p>
            <p class="text-secondary" style="font-size:11px">{{ $post2->new_at }} - {{ $post2->expired_at }}</p>
        </div>
        
        <div class="row border border-dark-subtle ">
            <div class="col-lg-auto pt-2 pb-2">
                <img src="/img/toko.png" alt="" width="40">
                <a href="/offer?author={{ $post2->author->id }}" class="text-decoration-none text-dark">{{ $post2->author->name }}</a>
                <span class="text-secondary" style="font-size:11px">{{ $post2->author->followers->count() }} Follower </span>
            </div>
            <div class="col-lg-auto pt-2 pb-2">
                @if(Auth::check())
                    @if (Auth::check() && Auth::user()->following->contains($post2->author->id))
                        <form action="{{ route('follower.unfollow') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $post2->author->id }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <button type="submit" class="btn btn-danger btn-sm">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('follower.follow') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $post2->author->id }}">
                            <input type="hidden" name="follower_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <button type="submit" class="btn btn-success btn-sm">Follow</button>
                        </form>
                    @endif
                @else
                    <a href="/login" class="btn btn-success btn-sm">Follow</a>
                @endif
            </div>
        </div>
       
        <div class="row mt-2">
            <div class="col">
                <a href="/bandingkan" class="btn btn-outline-success btn-sm">Bandingkan</a>
            </div>
            <div class="col">
                @if(Auth::check())
                    @if($post2->bookmarkedByUser(Auth::id()))
                        <button type="button" class="btn btn-primary btn-sm" disabled>Bookmark</button>
                    @else
                        <form action="{{ route('products.bookmark', $post2) }}" method="GET">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? "N/A" }}">
                            <input type="hidden" name="post_id" value="{{ $post2->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">Bookmark</button>
                        </form>
                    @endif
                @else
                    <a href="/login" class="btn btn-primary btn-sm">Bookmark</a>
                @endif
            </div>
        </div>

        <h5>Deskripsi</h5>
        {!! $post2->description !!}
        <div class="row mt-2">
            <h5>Link Terkait dengan Penawaran</h5>
            <h6>
                <p><a href="{{ $post2->url_link1 }}" class="text-decoration-none text-dark">{{ $post2->nm_link1 }}</a></p>
                <p><a href="{{ $post2->url_link2 }}" class="text-decoration-none text-dark">{{ $post2->nm_link2 }}</a></p>
                <p><a href="{{ $post2->url_link3 }}" class="text-decoration-none text-dark">{{ $post2->nm_link3 }}</a></p>
            </h6>
        </div>
        <div class="row">
            <h5>Lokasi Terkait dengan Penawaran Ini</h5>
            <p>{{ $post2->lokasi }}</p>
        </div>
        <div class="row">
            <h5>Syarat dan Ketentuan</h5>
            <p>{{ $post2->syarat_ketentuan }}</p>
        </div>
    </div>
</div>

@endsection
