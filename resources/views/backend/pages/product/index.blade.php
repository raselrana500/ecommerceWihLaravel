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
        <table class="table table-hover table-striped table-responsive">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                
                <td>
                  <a class="btn btn-success" href="">Show</a>
                  <a class="btn btn-info" href="{{ route('admin.pages.product.edit',$product->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.pages.product.delete',$product->id) }}">Delete</a>
                </td>
                 
                  
            </tr>
            @endforeach
        </table>
      </div>
    </div>
    
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
    <div class="container-fluid clearfix">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
    </div>
  </footer>
  <!-- partial -->
</div>
@endsection
