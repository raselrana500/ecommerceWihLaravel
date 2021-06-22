@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <Div class="card card-body">
      <h3>Welcome to Admin Pannel</h3>
      <br>
      <br>
      <p><a href="{{ route('index') }}" class="btn btn-primary btn-lg" target="_blank">View Frontend</a></p>
    </Div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
