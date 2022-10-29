@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </div>

    @if ($errors->any())
        <div class="allert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="sku">Product SKU</label>
                    <input type="text" class="form-control" name="sku" placeholder="Product SKU" value="{{ old('sku') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="10" class="d-block w-100 form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" name="brand" placeholder="Brand" value="{{ old('brand') }}">
                </div>

                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" class="form-control" name="weight" placeholder="Weight" value="{{ old('weight') }}">
                </div>

                <div class="form-group">
                    <label for="condition">Condition</label>
                    <input type="text" class="form-control" name="condition" placeholder="Condition" value="{{ old('condition') }}">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" placeholder="Status" value="{{ old('status') }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection