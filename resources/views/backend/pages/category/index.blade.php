@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage Category</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <table class="table table-hover table-striped table-responsive">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Parent_id</th>
                <th>Action</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                  <img src="{!! asset('images/categories/'.$category->image) !!}"alt="img">
                </td>
                
                <td>{{ $category->description }}</td>
                <td>
                  @if ($category->parent_id == NULL)
                    Primary Category
                  @else
                  {{ $category->parentCatName->name }}                      
                  @endif
                </td>
                
                <td>
                  <a class="btn btn-success" href="">Show</a>
                  <a class="btn btn-info" href="{{ route('admin.pages.category.edit',$category->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.pages.category.delete',$category->id) }}">Delete</a>
                </td>
                 
                  
            </tr>
            @endforeach
        </table>
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
