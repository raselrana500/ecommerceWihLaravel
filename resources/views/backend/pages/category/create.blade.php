@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Add Category</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
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
            <label><strong>Parent Category</strong></label>
            <select class="form-control" name="parent_id">
              <option value="">Select a Category</option>
              @foreach ($main_categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              <option></option>
            </select>
          </div>
          
          <div class="form-group">
            <label><strong>Image</strong></label>
            <input type="file" name="cat_image" id="image" class="form-control"  >
          </div>

        </div>
          <p class="ml-4"><button type="submit" class="btn btn-primary">Add Category</button></p>
        </form>
      </div>
    </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
