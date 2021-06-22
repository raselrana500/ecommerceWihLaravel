@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <h2>My Cart Items</h2>
    @if(App\Models\Cart::totalItems() > 0)
    <div class="table-responsive">
    <table class="table table-bordered table-stripe" #="dataTable">
        <thead>
            <tr class="table-primary">
                <th>No.</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Unit Price</th>
                <th>Sub total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_price=0;
            @endphp
            @foreach(App\Models\Cart::totalCarts() as $cart)
            <tr>
                <td>
                    {{ $loop->index + 1 }}
                </td>
                <td>
                    <a href="{{ route('products.show',$cart->product->slug) }}">{{ $cart->product->title }}</a>
                </td>
                <td>
                    @if($cart->product->images->count() > 0 )
                        <img src="{{ asset('public/images/products/'. $cart->product->images->first()->image) }}" width="40px">
                    @endif
                </td>
                <td>
                    <form class="form-inline" action="{{ route('carts.update',$cart->id) }}" method="post">
                        @csrf
                        <input type="number" name="product_quantity" value="{{ $cart->product_quantity }}" class="form-controll"/>
                        <button type="submit" class="btn btn-primary btn-sm ml-8"><i class="fa fa-arrow-up"></i><i class=" fa fa-arrow-down"></i></button>
                    </form>
                </td>
                <td>
                    {{ $cart->product->price }} Taka
                </td>
                <td>
                
                    @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                    @endphp
                    {{ $cart->product->price * $cart->product_quantity }} Taka
                </td>
                <td>
                    <form class="form-inline" action="{{ route('carts.delete',$cart->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="cart_id"/>                        
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">

                </td>
                <td style="color:#FF0000;">
                    <h4>Total Amount:</h4>
                </td>
                <td style="color:#FF0000;" colspan="2">
                    <h4>{{ $total_price }} Taka</h4>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="float:right;">
        <a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
        <a href="{{ route('checkouts') }}" class="btn btn-warning btn-lg">Checkout</a>
    </div>
    @else
        <div class="alert alert-warning">
            <strong>Your cart is Empty.Please Add product to your cart first --></strong>
            <a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
        </div>
    @endif
</div>
@endsection