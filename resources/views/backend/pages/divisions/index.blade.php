@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage Division</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <table class="table table-hover table-striped table-responsive">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
            @foreach ($division as $division)
            <tr>
                
                <td>{{ $division->id }}</td>
                <td>{{ $division->name }}</td>
                
                <td>{{ $division->priority }}</td>
                
                <td>
                  <a class="btn btn-success" href="">Show</a>
                  <a class="btn btn-info" href="{{ route('admin.pages.divisions.edit',$division->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.pages.divisions.delete',$division->id) }}">Delete</a>
                </td>
                 
                  
            </tr>
            @endforeach
        </table>
      </div>
    </div>
    
    </div> 
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  @include('backend.partials.footer')
  <!-- partial -->
@endsection
