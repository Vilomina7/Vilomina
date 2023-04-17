@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label visually-hidden">Slug</label>
          <input type="text" class="form-control visually-hidden" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gambar</label>
          @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <input id="description" type="hidden" name="description" value="{{ old('description', $post->description) }}">
            <trix-editor input="description"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="original_price" class="form-label">Harga Asli</label>
            <input type="text" class="form-control" id="original_price" name="original_price" value="{{ old('original_price', $post->original_price) }}">
        </div>
        <div class="mb-3">
            <label for="promo_price" class="form-label">Harga Promo</label>
            <input type="text" class="form-control" id="promo_price" name="promo_price" value="{{ old('promo_price', $post->promo_price) }}">
        </div>
        <div class="mb-3">
            <label for="promos" class="form-label">Jenis Promo</label>
            <select class="form-select" name="promo_id">
                @foreach ($promos as $promo)
                    @if(old('promo_id', $post->promo_id) == $promo->id)
                    <option value="{{ $promo->id }}" selected>{{ $promo->jenis }}</option>
                    @else
                    <option value="{{ $promo->id }}">{{ $promo->jenis }}</option>
                    @endif
                @endforeach  
            </select>
        </div>
        <div class="mb-3">
            <label for="satuan_promo" class="form-label">Satuan Promo</label>
            <select class="form-select" name="satuan_promo" value="{{ old('satuan_promo', $post->satuan_promo) }}">
                    <option value="Rp." selected>Rupiah</option>
                    <option value="%">Persentase</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nilai_promo" class="form-label">Nilai Promo</label>
            <input type="text" class="form-control" id="nilai_promo" name="nilai_promo" value="{{ old('nilai_promo', $post->nilai_promo) }}">
        </div>
        <div class="mb-3">
            <label for="new_at">Tanggal Baru</label>
            <input type="date" name="new_at" class="form-control" id="new_at" placeholder="Tanggal_Baru" value="{{ old('new_at', $post->new_at ) }}">
            
        </div>
        <div class="mb-3">
            <label for="expired_at">Tanggal Kadaluarsa</label>
            <input type="date" name="expired_at" class="form-control" id="expired_at" placeholder="Tanggal_Kadaluarsa" value="{{ old('expired_at', $post->expired_at) }}">
            
        </div>
        {{-- <div class="mb-3">
            <label for="keyword" class="form-label">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Terkait Penawaran ini</label>
            <input type="text" class="form-control" id="link" name="link">
        </div> --}}
        <div class="mb-3">
            <label for="link_id" class="form-label">Link Terkait Penawaran Ini</label>
            {{-- <select class="form-select" name="link_id">
                @foreach ($links as $link)
                    @if(old('link_id', $post->link_id) == $link->id)
                    <option value="{{ $link->id }}" selected>{{ $link->name_link }}</option>
                    @else
                    <option value="{{ $link->id }}">{{ $link->name_link }}</option>
                    @endif
                @endforeach  
            </select> --}}
            <div class="form-floating">
                <input type="text" name="nm_link1" class="form-control rounded-top @error('nm_link1') is-invalid @enderror" id="nm_link1" placeholder="nm_link1" value="{{ old('nm_link1', $post->nm_link1) }}">
                <label for="nm_link1">Nama Link 1</label>
                @error('nm_link1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="url_link1" class="form-control rounded-top @error('url_link1') is-invalid @enderror" id="url_link1" placeholder="URL Link 1" value="{{ old('url_link1', $post->url_link1) }}">
                <label for="url_link1">URL Link 1</label>
                @error('url_link1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="nm_link2" class="form-control rounded-top @error('nm_link2') is-invalid @enderror" id="nm_link2" placeholder="nm_link2" value="{{ old('nm_link2', $post->nm_link2) }}">
                <label for="nm_link2">Nama Link 2</label>
                @error('nm_link2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="url_link2" class="form-control rounded-top @error('url_link2') is-invalid @enderror" id="url_link2" placeholder="URL Link 2" value="{{ old('url_link2', $post->url_link2) }}">
                <label for="url_link2">URL Link 2</label>
                @error('url_link2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="nm_link3" class="form-control rounded-top @error('nm_link3') is-invalid @enderror" id="nm_link3" placeholder="nm_link3" value="{{ old('nm_link3', $post->nm_link3) }}">
                <label for="nm_link3">Nama Link 3</label>
                @error('nm_link3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="url_link3" class="form-control rounded-top @error('url_link3') is-invalid @enderror" id="url_link3" placeholder="URL Link 3" value="{{ old('url_link3', $post->url_link3) }}">
                <label for="url_link3">URL Link 3</label>
                @error('url_link3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
        </div>
        <div class="mb-3">
            <label for="keyword_id" class="form-label">Keywords Terkait Penawaran Ini</label>
            {{-- <select class="form-select" name="keyword_id">
                @foreach ($keywords as $key)
                    @if(old('link_id', $post->keyword_id) == $key->id)
                    <option value="{{ $key->id }}" selected>{{ $key->name_key }}</option>
                    @else
                    <option value="{{ $key->id }}">{{ $key->name_key }}</option>
                    @endif
                @endforeach  
            </select> --}}
            <div class="form-floating">
                <input type="text" name="key_one" class="form-control rounded-top @error('key_one') is-invalid @enderror" id="key_one" placeholder="key_one" value="{{ old('key_one', $post->key_one) }}">
                <label for="key_one">Keyword 1</label>
                @error('key_one')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="key_two" class="form-control @error('key_two') is-invalid @enderror" id="key_two" placeholder="key_two" value="{{ old('key_two', $post->key_two) }}">
                <label for="key_two">Keyword 2</label>
                @error('key_two')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="key_three" class="form-control @error('key_three') is-invalid @enderror" id="key_three" placeholder="key_three" value="{{ old('key_three', $post->key_three) }}">
                <label for="key_three">Keyword 3</label>
                @error('key_three')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="key_four" class="form-control @error('key_four') is-invalid @enderror" id="key_four" placeholder="key_four" value="{{ old('key_four', $post->key_four) }}">
                <label for="key_four">Keyword 4</label>
                @error('key_four')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="key_five" class="form-control rounded-buttom @error('key_five') is-invalid @enderror" id="key_five" placeholder="key_five" value="{{ old('key_five', $post->key_five) }}">
                <label for="key_five">Keyword 5</label>
                @error('key_five')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi Terkait Penawaran ini</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $post->lokasi) }}">
        </div>
        <div class="mb-3">
            <label for="syarat_ketentuan" class="form-label">Syarat dan Ketentuan</label>
            <textarea type="text" class="form-control" id="syarat_ketentuan" name="syarat_ketentuan" value="{{ old('title', $post->syarat_ketentuan) }}" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault()
    });

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>

@endsection