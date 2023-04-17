@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3 justify-content-center">
        <div class="col-lg-4">
            @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="300">
            @else
            <img src="https://source.unsplash.com/300x300?{{ $post->promo->jenis }}" alt="{{ $post->promo->jenis }}">
            @endif
            <p><span class="badge rounded-pill text-bg-secondary">{{ $post->key_one }} </span> <span class="badge rounded-pill text-bg-secondary">{{ $post->key_two }}</span> </p>
            <p><span class="badge rounded-pill text-bg-secondary">{{ $post->key_three }}</span> <span class="badge rounded-pill text-bg-secondary">{{ $post->key_five }}</span> </p>
            <p><span class="badge rounded-pill text-bg-secondary">{{ $post->key_four }}</span> </p>
            {{-- <p><span class="badge rounded-pill text-bg-secondary">#KFCMantaps</span> <span class="badge rounded-pill text-bg-secondary">#KFC</span></p> --}}
            
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                 <span data-feather="x-circle"></span> Delete
                </button>
               </form>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <h5>{{ $post->title }}</h5>
                <p class="text-danger h5">Rp. {{ $post->promo_price }}  <span class="text-decoration-line-through text-muted h6"> Rp. {{ $post->original_price }}</span></p>
                <p><span class="badge rounded-pill text-bg-info"><a href="/offer?promo={{ $post->promo->slug }}" class="text-decoration-none text-dark">{{ $post->promo->jenis }}</a> {{ $post->nilai_promo }}{{ $post->satuan_promo }}</span></p>
                <p class="text-secondary" style="font-size:11px">{{ $post->new_at }} - {{ $post->expired_at }}</p>
            </div>
            
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <p>
                        <img src="/img/toko.png" alt="" width="40">
                        <a href="/offer?author={{ $post->author->id }}" class="text-decoration-none text-dark">{{ $post->author->name }}</a>
                        <span class="text-secondary" style="font-size:11px">{{ $post->author->followers->count() }} Follower </span>
                    </p>
                    
                    </div>
                </div>
            </div>


            <p class="pt-3"><button type="button" class="btn btn-success">Bookmark</button>   <button type="button" class="btn btn-outline-success">Bandingkan</button></p>
            <h5>Deskripsi</h5>
            {!! $post->description !!}
            <div class="row mt-2">
                <h5>Link Terkait dengan Penawaran</h5>
                <h6>
                    <p><a href="{{ $post->url_link1 }}" class="text-decoration-none text-dark">{{ $post->nm_link1 }}</a></p>
                    <p><a href="{{ $post->url_link2 }}" class="text-decoration-none text-dark">{{ $post->nm_link2 }}</a></p>
                    <p><a href="{{ $post->url_link3 }}" class="text-decoration-none text-dark">{{ $post->nm_link3 }}</a></p>
                </h6>
            </div>
            <div class="row">
                <h5>Lokasi Terkait dengan Penawaran Ini</h5>
                <p>{{ $post->lokasi }}</p>
            </div>
            <div class="row">
                <h5>Syarat dan Ketentuan</h5>
                <p>{{ $post->syarat_ketentuan }}</p>
            </div>
        </div>
    </div>
</div>

@endsection