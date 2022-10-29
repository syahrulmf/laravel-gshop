@extends('layouts.success')

@section('title')
  Checkout Success
@endsection

@section('content')
<main>
<div class="section-success d-flex align-items-center">
    <div class="col text-center">
        <img src="{{ url('frontend/images/ic_mail.png') }}">
        <h1>Yeayy Success!</h1>
        <p>
            We've sent you email for your transaction
            <br>
            please read it as well
        </p>
        <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">Home Page</a>
    </div>
</div>
</main>
@endsection