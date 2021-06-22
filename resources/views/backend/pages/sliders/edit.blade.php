@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Update Division</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.divisions.update',$division->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>name</strong></label>
            <input type="text" name="name" class="form-control"  value="{{ $division->name }}">
          </div>
          <div class="form-group">
            <label></label><strong>Priority</strong></label>
            <input type="text" name="priority" class="form-control"  value="{{ $division->priority }}">
          </div>
          <button type="submit" class="btn btn-primary btn btn-small">Update Division</button>
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
