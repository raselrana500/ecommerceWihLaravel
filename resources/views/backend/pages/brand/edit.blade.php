@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Update brand</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.brand.update',$cat->id) }}" enctype="multipart/form-data">
          @csrf
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>name</strong></label>
            <input type="text" name="name" class="form-control"  value="{{ $cat->name }}">
          </div>
          <div class="form-group">
            <label></label><strong>Description</strong></label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ $cat->description }}</textarea>
          </div>
          
          <div class="form-group">
            <label><strong>Old image</strong></label>
            <br>
            <img src="{{ asset('public/images/brands/'.$cat->image) }}" alt="images" width="150" />
            <br>
            <br>
            <label><strong>New image</strong></label>
            <input type="file" name="cat_image" id="image" class="form-control"  >
          </div>

        </div>
          <p><button type="submit" class="btn btn-primary ml-4">Update brand</button></p>
        </form>
      </div>
    </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
