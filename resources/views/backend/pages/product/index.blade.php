@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage Product</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <table class="table table-hover table-striped " id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th style="text-align:center;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                  
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->quantity }}</td>
                  
                  <td style="text-align:center;">
                    <a class="btn btn-success" href="">Show</a>
                    <a class="btn btn-info" href="{{ route('admin.pages.product.edit',$product->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('admin.pages.product.delete',$product->id) }}">Delete</a>
                  </td>
                  
                    
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
    </div>
    
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
 @include('backend.partials.footer')
  <!-- partial -->
@endsection
