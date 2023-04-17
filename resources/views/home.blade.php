@extends('layouts.main')

@section('container')
@if(session()->has('success'))
  <div class="alert alert-success justify-content-center pt-3" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row justify-content-center mb-3 pt-4">
  <div class="col-md-6">
      <form action="/offer">
          @if(request('promo'))
              <input type="hidden" name="promo" value="{{ request('promo') }}">
          @endif
          @if(request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
      </form>
  </div>
</div>

<div class="row justify-content-center mb-3 pt-4">
  <div class="col-md-12 mb-3">
    @foreach ($post as $tag)
    <a href="/offer?post={{ $tag->key_one }}"><span class="badge rounded-pill text-bg-secondary">{{ $tag->key_one }}</span></a> 
    @endforeach
  </div>
  <div class="">
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Filter
    </button> --}}

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('filter') }}">
            <div class="modal-body">
                <div class="card" style="width: auto;">
                  <div class="card-body">
                    <h6 class="card-title">Sort Deals</h6>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="convenient">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Convenient
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="highestTo">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Highest to Lowest Price
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="lowestTo">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Lowest to Highest Price
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="newestTo">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Newest to Oldest
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="oldestTo">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Oldest to Newest
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card" style="width: auto;">
                  <div class="card-body">
                    <h6 class="card-title">Price</h6>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Lowest Price</label>
                      <input type="text" class="form-control" name="lowestPrice" placeholder="Enter Lowest Price Here...">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Highest Price</label>
                      <input type="text" class="form-control" name="highestPrice" placeholder="Enter Highest Price Here...">
                    </div>
                  </div>
                </div>
                <div class="card" style="width: auto;">
                  <div class="card-body">
                    <h6 class="card-title">Promo</h6>
                    <div class="mb-3">
                      <label for="promo_id" class="form-label">Type of Promo</label>
                      <select class="form-select  @error('promo_id') is-invalid @enderror" name="promo_id">
                        @foreach ($promos as $promo)
                            <option value="{{ $promo->id }}">{{ $promo->jenis }}</option>
                        @endforeach    
                      </select>
                      @error('promo_id')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3 visually-hidden">
                      <label for="unit_promo" class="form-label">Unit of Promo</label>
                      <select class="form-select" name="unit_promo">
                              <option value="Rupiah" selected>Rp.</option>
                              <option value="Persentase">%</option>
                      </select>
                    </div>
                    <div class="mb-3 visually-hidden">
                      <label for="nilai_promo_rendah" class="form-label">Lowest Value of Promo</label>
                      <input type="text" class="form-control" name="nilai_promo_rendah">
                    </div>
                    <div class="mb-3 visually-hidden">
                      <label for="nilai_promo_tinggi" class="form-label">Highest Value of Promo</label>
                      <input type="text" class="form-control" name="nilai_promo_tinggi">
                    </div>
                  </div>
                </div>
                <div class="card" style="width: auto;">
                  <div class="card-body">
                    <h6 class="card-title">Time of Deal</h6>
                    <div class="mb-3">
                      <label for="new_at">Start From</label>
                      <input type="date" name="new_at" class="form-control" placeholder="Start From" value="{{ old('tanggal_baru') }}">
                    </div>
                    <div class="mb-3">
                      <label for="expired_at">End On</label>
                      <input type="date" name="expired_at" class="form-control" placeholder="End On" value="{{ old('tanggal_kadaluarsa') }}">
                    </div>
                  </div>
                </div>
                <div class="card" style="width: auto;">
                  <div class="card-body">
                    <h6 class="card-title">Keywords</h6>
                    <div class="mb-3">
                      <label for="key" class="form-label">Keywords of Deals</label>
                      <select class="form-select  @error('key') is-invalid @enderror" name="key">
                           @foreach($post as $p)
                           <option value="{{ $p->key_one }}">{{ $p->key_one }}</option>
                           @endforeach
                      </select>
                      @error('key')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Done</button>
            </div>
          </form>
        </div>
      </div>
    </div> --}}

    {{-- <form action="{{ route('produk.filter') }}" method="get">
      <div class="form-group">
          <label for="jenis_promo">Jenis Promo:</label>
          <select name="promo" class="form-control">
              <option value="">-- Pilih Jenis Promo --</option>
              @foreach ($promos as $promo)
                <option value="{{ request('promo') }}">{{ $promo->jenis }}</option>
              @endforeach
          </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Filter</button>
  </form> --}}
  
  </div>
  {{-- <div class="col-md mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@filter">Filter</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="card" style="width: auto;">
                <div class="card-body">
                  <h6 class="card-title">Sort Deals</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Convenient
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Highest to Lowest Price
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Lowest to Highest Price
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                      Newest to Oldest
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Oldest to Newest
                    </label>
                  </div>
                </div>
              </div>
              <div class="card" style="width: auto;">
                <div class="card-body">
                  <h6 class="card-title">Price</h6>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Lowest Price</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Lowest Price Here...">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Highest Price</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Highest Price Here...">
                  </div>
                </div>
              </div>
              <div class="card" style="width: auto;">
                <div class="card-body">
                  <h6 class="card-title">Promo</h6>
                  <div class="mb-3">
                    <label for="promo_id" class="form-label">Type of Promo</label>
                    <select class="form-select  @error('promo_id') is-invalid @enderror" name="promo_id">
                      @foreach ($post as $p)
                          @if(old('promo_id') == $p->promo->id)
                          <option value="{{ $p->promo->id }}" selected>{{ $p->promo->jenis }}</option>
                          @else
                          <option value="{{ $p->promo->id }}">{{ $p->promo->jenis }}</option>
                          @endif
                      @endforeach    
                    </select>
                    @error('promo_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="satuan_promo" class="form-label">Unit of Promo</label>
                    <select class="form-select" name="satuan_promo">
                            <option value="Rupiah" selected>Rp.</option>
                            <option value="Persentase">%</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="nilai_promo" class="form-label">Lowest Value of Promo</label>
                    <input type="text" class="form-control" id="nilai_promo" name="nilai_promo">
                  </div>
                  <div class="mb-3">
                    <label for="nilai_promo" class="form-label">Highest Value of Promo</label>
                    <input type="text" class="form-control" id="nilai_promo" name="nilai_promo">
                  </div>
                </div>
              </div>
              <div class="card" style="width: auto;">
                <div class="card-body">
                  <h6 class="card-title">Time of Deal</h6>
                  <div class="mb-3">
                    <label for="new_at">Start From</label>
                    <input type="date" name="new_at" class="form-control" id="new_at" placeholder="Tanggal_Baru" value="{{ old('tanggal_baru') }}">
                  </div>
                  <div class="mb-3">
                    <label for="expired_at">End On</label>
                    <input type="date" name="expired_at" class="form-control" id="expired_at" placeholder="Tanggal_Kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}">
                  </div>
                </div>
              </div>
              <div class="card" style="width: auto;">
                <div class="card-body">
                  <h6 class="card-title">Keywords of Deals</h6>
                  <div class="mb-3">
                    <label for="key" class="form-label">Keywords of Deals</label>
                    <select class="form-select  @error('key') is-invalid @enderror" name="key">
                        
                          <option value="{{ $post->id }}">{{ $post->key_one }}</option>
                      
                          <option value="{{ $post->id }}">{{ $post->key_two }}</option>
                      
                          <option value="{{ $post->id }}">{{ $post->key_three }}</option>
                    
                          <option value="{{ $post->id }}">{{ $post->key_four }}</option>
                        
                          <option value="{{ $key->id }}">{{ $key->key_five }}</option>
                        
                      @endforeach    
                    </select>
                    @error('key')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
              </div>
              
              
              
             
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Done</button>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>

<h3 class="mb-3 pt-3">Kamu Mungkin Tertarik</h3>

    @if ($post->count())
    <div class="container">
      <div class="row">
        <div class="col-md mb-3">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if($post[0]->image)
                <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->title }}" width="300" class="img-fluid rounded-start">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post[0]->promo->jenis }}" class="img-fluid rounded-start" alt="{{ $post[0]->promo->jenis }}">
                @endif
                
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title"><a href="/detail/{{ $post[0]->slug }}" class="text-decoration-none">{{ $post[0]->title }}</a></h3>
                  <p class="card-text">
                    <small class="text-muted">
                    By. <a href="/offer?author={{ $post[0]->author->id }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/offer?promo={{ $post[0]->promo->slug }}"  class="text-decoration-none">{{ $post[0]->promo->jenis}}</a> {{ $post[0]->created_at->diffForHumans() }}
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md">

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if($post[1]->image)
                <img src="{{ asset('storage/' . $post[1]->image) }}" alt="{{ $post[1]->title }}" width="300" class="img-fluid rounded-start">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post[1]->promo->jenis }}" class="img-fluid rounded-start" alt="{{ $post[1]->promo->jenis }}">
                @endif
                
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title"><a href="/detail/{{ $post[1]->slug }}" class="text-decoration-none">{{ $post[1]->title }}</a></h3>
                  <p class="card-text">
                    <small class="text-muted">
                    By. <a href="/offer?author={{ $post[1]->author->id }}" class="text-decoration-none">{{ $post[1]->author->name }}</a> in <a href="/offer?promo={{ $post[1]->promo->slug }}"  class="text-decoration-none">{{ $post[1]->promo->jenis}}</a> {{ $post[1]->created_at->diffForHumans() }}
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    @else
    <p class="text-center fs-4">No Post Found</p>
    @endif

    <h3 class="mb-3 pt-3">Penawaran Terbaru</h3>
    <div class="container">
        <div class="row">
            @foreach ($post->skip(2) as $offer)
            <div class="col-md-4 mb-3">
                <div class="card">
                    {{-- <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0.7)"><a href="/promos/{{ $offer->promo->slug }}" class="text-white text-decoration-none">{{ $offer->promo->jenis }}</a></div> --}}
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

    <div class="d-flex justify-content-center">
      {{ $post->links() }}
    </div>
@endsection
{{-- 
@section('script')
<script>
  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  });
</script>
@endsection --}}