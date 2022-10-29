@extends('layouts.app')

@section('title')
  G-SHOP
@endsection

@section('content')
  <header class="header">
      <div class="container" id="header">
          <div class="row text-center">
              <div class="col-12 col-lg-5">
                  <h1>
                  The Best Place to Buy
                  <br />
                  Your Gaming Gear
                  </h1>
                  <p class="mt-3">
                  Lorem ipsum dolor sit amet. consectetur adipisicing
                  </p>
                  <a href="#section-products" class="btn btn-shopping-now px-4 mt-4">
                  Shopping Now
                  </a>
              </div>
          </div>

      </div>
  </header>

  <main>
  <!-- partner -->
  <section class="section-part-of">
      <div class="container">
        <div class="row pt-5 text-center">
            <div class="col">
              <h1>
                  Authorized Distributor
                  <br>
                  of
              </h1>
            </div>
        </div>
        <div class="row p-5 justify-content-center">
            <div class="col-md-8 text-center">
              <img src="{{ url('frontend/images/partner.png') }}" class="img-patner" />
            </div>
        </div>
      </div>
  </section>
  <!-- /partner -->

  <!-- products -->
  <section class="products bg-light p-5" id="section-products">
      <div class="container">
        <div class="row mb-3">
            <div class="col">
            <h3>Our Product</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}" class="figure-img img-fluid">
                            <a href="{{ route('detail', $item->slug) }}" class="d-flex justify-content-center">
                                <img src="{{ url('frontend/images/figure/plus.png') }}" class="align-self-center">
                            </a>
                        </div>
                        <figcaption class="figure-caption text-center">
                            <h5>{{ $item->name }}</h5>
                            <p>IDR {{ $item->price }}</p>
                        </figcaption>
                    </figure>
                </div>
            @endforeach

        </div>
      </div>
  </section>
  <!-- /products -->
  </main>
@endsection
