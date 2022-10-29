@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction {{ $item->user->name }} </h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Transaction Date</th>
                    <td>{{ $item->created_at }}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $item->product->name }}</td>
                </tr>
                <tr>
                    <th>Customer</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Shipping Cost</th>
                    <td>IDR {{ $item->shipping_cost }}</td>
                </tr>
                <tr>
                    <th>Transaction Total</th>
                    <td>IDR {{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Transaction Status</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Buyer Information</th>
                    <td>
                        <table class="table-bordered">
                            <tr>
                                <th>Complete Name</th>
                                <th>E-Mail</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </tr>

                            @foreach ($item->details as $detail)
                                <tr>
                                <td>{{ $detail->complete_name }}</td>
                                <td>{{ $detail->email }}</td>
                                <td>{{ $detail->contact }}</td>
                                <td>{{ $detail->address }}</td>
                                </tr>
                            @endforeach

                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
