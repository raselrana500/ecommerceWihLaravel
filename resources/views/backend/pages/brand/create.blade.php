@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Add brand</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
          @csrf
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>name</strong></label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label></label><strong>Description</strong></label>
            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
          </div>
          
          <div class="form-group">
            <label><strong>Image</strong></label>
            <input type="file" name="cat_image" id="image" class="form-control"  >
          </div>

        </div>
          <p class="ml-4"><button type="submit" class="btn btn-primary">Add brand</button></p>
        </form>
      </div>
    </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
