@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Update Product</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.product.update',$product->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>Title</strong></label>
            <input type="text" name="title" class="form-control" value="{{ $product->title }}" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label></label><strong>Description</strong></label>
            <textarea name="description"  class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
          </div>
          <div class="form-group">
            <label><strong>Price</strong></label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control"  placeholder="Enter price">
          </div>
          <div class="form-group">
            <label><strong>Quantity</strong></label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control"  placeholder="Enter Quantity">
          </div>
          <div class="form-group">
            <label><strong>Image</strong></label>
            <div class="row">
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control">
              </div>
              <div class="col-md-4">
                <input type="file" name="product_image[]" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
      </div>
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
