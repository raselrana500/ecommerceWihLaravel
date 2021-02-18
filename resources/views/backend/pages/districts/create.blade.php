@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Add Districts</strong> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.districts.store') }}" enctype="multipart/form-data">
          @csrf
          @include('backend.partials.messagess')
          <div class="form-group">
            <label><strong>name</strong></label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Division">
          </div>
          <div class="form-group">
            <label for="division_id">Select a division for this district</label>
            <select class="form-control" name="division_id">
              <option value="">Select a division for this district</option>
              @foreach ($divisions as $division)
                <option value="{{ $division->id}}">{{ $division->name }}</option>
                  
              @endforeach

            </select>
          </div>

        </div>
          <p><button type="submit" class="btn btn-primary">Add Divisoin</button></p>
        </form>
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
