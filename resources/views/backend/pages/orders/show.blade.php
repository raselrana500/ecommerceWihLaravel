@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>View Order #LE{{ $order->id }}</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <h3>Order Informations</h3>
        <div class="row">
          <div class="col-md-6 border-right">
            <p><strong>Orderer Name : </strong> {{ $order->name }} </p>
            <p><strong>Orderer Phone: </strong> {{ $order->phone_no }} </p>
            <p><strong>Orderer Email : </strong> {{ $order->email }} </p>
            <p><strong>Orderer Shipping Address : </strong> {{ $order->shipping_address }} </p>
          </div>
          <div class="col-md-6">
            <p><strong>Order Payment Method : </strong> {{ $order->payment->name }} </p>
            <p><strong>Order Payment Transaction Id : </strong> {{ $order->payment->Transaction_id }} </p>
          </div>
          <hr>
          <h3>Order Items: </h3>
          @if($order->carts->count() > 0)
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
              @foreach($order->carts as $cart)
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
                          <button type="submit" class="btn btn-primary btn-sm ml-8 ml-2">Update</button>
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
      @endif
      <hr>
      <form action="{{ route('admin.order.completed',$order->id)  }}" method="post" class="mr-2 mt-2">
        @csrf
        @if($order->is_completed)
        <input type="submit" value="Cancel Order" class="btn btn-danger">
        @else
        <input type="submit" value="Complete Order" class="btn btn-success">
        @endif
      </form>
      <form action="{{ route('admin.order.paid',$order->id)  }}" method="post" class="mr-2 mt-2">
      @csrf
      @if($order->is_paid)
      <input type="submit" value="Cancel Payment" class="btn btn-danger">
        @else
        <input type="submit" value="Paid Order" class="btn btn-primary">
        @endif
        
      </form>
        </div>
      </div>
    </div>
    </div> 
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
