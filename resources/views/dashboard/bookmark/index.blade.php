@extends('dashboard.layouts.main')

@section('container')
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

    @if($bookmarkedProducts->count() > 0)
    <div class="table-responsive col-lg-10">
        <h2>My Bookmark</h2>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Harga Promo</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookmarkedProducts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->satuan_promo }} {{ $post->promo_price }}</td>
                    <td>{{ $post->new_at }}</td>
                    <td>{{ $post->expired_at }}</td>
                    <td>
                        
                        @if($post->bookmarkedByUser(Auth::id()))
                            <form action="{{ route('products.unbookmark', $post->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Unbookmark</button>
                            </form>
                        @else
                            <form action="{{ route('products.bookmark', $post) }}" method="GET">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">Bookmark</button>
                            </form>
                        @endif
                    </td>
                    <td><a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-l">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
    </div>
    @else
        <h4>there are no products in your bookmark.</h4>
    @endif


<script>
       function unbookmarkProduct(id) {
        if (confirm('Are you sure you want to unbookmark this product?')) {
            var form = document.getElementById('unbookmark-form-' + id);
            form.submit();
        }
    }
</script>
@endsection