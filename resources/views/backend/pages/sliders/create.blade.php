@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Add Division</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.divisions.store') }}" enctype="multipart/form-data">
          @csrf
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>name</strong></label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Division">
          </div>
          <div class="form-group">
            <label></label><strong>Priority</strong></label>
            <input type="text" name="priority" class="form-control"  placeholder="Enter priority">
          </div>

        </div>
          <p><button type="submit" class="btn btn-primary">Add Divisoin</button></p>
        </form>
      </div>
    </div>
    </div> 
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
