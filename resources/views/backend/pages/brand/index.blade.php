@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage brand</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <table class="table table-hover table-striped table-responsive">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach ($brands as $row)
            <tr>
                
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>
                  <img src="{{ asset('public/images/brands/'.$row->image) }}" alt="images" width="100" />
                </td>
                
                <td>{{ $row->description }}</td>
                
                <td>
                  <a class="btn btn-success" href="">Show</a>
                  <a class="btn btn-info" href="{{ route('admin.pages.brand.edit',$row->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.pages.brand.delete',$row->id) }}">Delete</a>
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
