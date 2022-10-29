@extends('layouts.app')

@section('title')
  Detail Product
@endsection

@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Home
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
          <h1>{{ $item->name }}</h1>
            <p>
              SKU {{ $item->sku }}
            </p>

            @if ($item->galleries->count())
                <div class="gallery">
                    <div class="xzoom-container">
                        <img class="xzoom" id="xzoom-default" src="{{ Storage::url($item->galleries->first()->image) }}"
                        xoriginal="{{ Storage::url($item->galleries->first()->image) }}" />

                        <div class="xzoom-thumbs">
                            @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}"><img class="xzoom-gallery" width="128"
                                    src="{{ Storage::url($gallery->image) }}"
                                    xpreview="{{ Storage::url($gallery->image) }}" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <h2>Product Descriptions</h2>
                    <p>
                        {!! $item->description !!}
                    </p>
                </div>
            @endif

          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Product Informations</h2>
            <hr />
            <table class="product-informations">
              <tr>
                <th width="50%">Brand</th>
                <td width="50%" class="text-right">{{ $item->brand }}</td>
              </tr>
              <tr>
                <th width="50%">Weight</th>
                <td width="50%" class="text-right">{{ $item->weight }}</td>
              </tr>
              <tr>
                <th width="50%">Condition</th>
                <td width="50%" class="text-right">{{ $item->condition }}</td>
              </tr>
              <tr>
                <th width="50%">Status</th>
                <td width="50%" class="text-right">{{ $item->status }}</td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">IDR {{ $item->price }}</td>
              </tr>
            </table>
          </div>

          @auth
            <form action="{{ route('checkout_process', $item->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-block btn-buy-now py-2">
                    Buy Now
                </button>
            </form>
          @endauth
          @guest
            <div class="buy-container">
            <a href="{{ url('login') }}" class="btn btn-block btn-buy-now mt-3 py-2">
                Login or Register to Buy
            </a>
            </div>
          @endguest
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('prepend-style')
<!-- Xzoom CSS -->
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 500,
      title: false,
      tint: '#333',
      xoffset: 15
    });
  });
</script>
@endpush
