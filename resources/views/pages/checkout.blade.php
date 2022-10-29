@extends('layouts.checkout')

@section('title')
  Checkout
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
              <li class="breadcrumb-item" aria-current="page">
                Details
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Checkout
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
              @if ($errors->any())
                  <div class="allert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <h1>Checkout</h1>
            <div class="attendee">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                    {{-- <th scope="col">Image</th> --}}
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($item->details as $detail)
                      <tr>
                        {{-- <td class="align-middle">
                            <img src="{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}">
                        </td> --}}
                        <td class="align-middle">{{ $item->product->name }}</td>
                        <td class="align-middle">IDR {{ $item->product->price }}</td>
                        <td class="align-middle">
                            <input type="number" class="bg-transparent border-0 text-center" name="qty" style="width: 40px;" value="1" readonly>
                        </td>
                        <td class="align-middle">
                            <a href="#">
                                <img src="{{ url('frontend/images/ic_remove.png') }}">
                            </a>
                        </td>
                      </tr>
                  @empty
                      <tr>
                        <td colspan="5" class="text-center">No Product</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>


                <hr class="divider">

            <div class="form-checkout mt-5">
              <h2>Buyer Information</h2>
              <form class="mt-3" action="{{ route('checkout-create', $item->id) }}" method="POST">
                  @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="complete_name">Complete Name</label>
                  <input type="text" name="complete_name" class="form-control" placeholder="Receiver Name"
                  value="{{ $item->user->name }}" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Email">E-Mail</label>
                    <input type="email" name="email" class="form-control" value="{{ $item->user->email }}" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input name="contact" class="form-control" type="number" placeholder="089xxxx" value="{{ $item->user->contact }}" readonly>
                </div>
                <div class="form-group">
                  <label for="Address">Complete Address</label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Road Name / Postal Code/ Etc." readonly>{{ $item->user->address }}</textarea>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Checkout Information</h2>
            <hr />
            <table class="product-informations">
              <tr>
                <th width="50%">Sub Total</th>
                <td width="50%" class="text-right">IDR {{ $item->product->price }}</td>
              </tr>

              <tr>
                <th width="50%">Shipping Fee</th>
                <td width="50%" class="text-right">IDR {{ $item->shipping_cost }}</td>
              </tr>

              <tr>
                <th width="50%">Total (+Unique)</th>
                <td width="50%" class="text-right text-total">
                    <span class="text-blue">IDR {{ $item->transaction_total }}</span>
                </td>
              </tr>
            </table>

            <hr />
            <h2>Payment Instructions</h2>
            <p class="payment-instructions">
              Please complete your payment before to continue
            </p>
            <div class="bank">
              <div class="bank-item pb-3">
                <div class="description">
                  <h3>A/N GShop</h3>
                  <p>
                    0881 8829 8800
                    <br />
                    Bank Central Asia
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="bank-item">
                <div class="description">
                  <h3>A/N GShop</h3>
                  <p>
                    0899 8501 7888
                    <br />
                    Bank HSBC
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="buy-container">
            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-buy-now mt-3 py-2">Proces Payment</a>
          </div>
          <div class="text-center mt-3">
            <a href="{{ route('detail', $item->product->slug) }}" class="text-muted">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
