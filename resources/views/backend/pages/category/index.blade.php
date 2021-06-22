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
            @foreach ($categories as $row)
            <tr>
                
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>
                  <img src="{{ asset('public/images/categories/'.$row->image) }}" alt="images" width="100" />
                </td>
                
                <td>{{ $row->description }}</td>
                <td>
                  @if ($row->parent_id == NULL)
                    Primary Category
                  @else
                  {{ $row->parentCatName->name }}                      
                  @endif
                </td>
                
                <td>
                  <a class="btn btn-success" href="">Show</a>
                  <a class="btn btn-info" href="{{ route('admin.pages.category.edit',$row->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.pages.category.delete',$row->id) }}">Delete</a>
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
