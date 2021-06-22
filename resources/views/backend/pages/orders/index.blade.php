@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage Orders</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <table class="table table-bordered table-hover table-striped table-responsive" id="dataTable">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Orderer Id</th>
                  <th>Orderer Name</th>
                  <th>Orderer Phone No</th>
                  <th>Order Status</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
            <tr>
                
                <td>{{ $loop->index + 1 }}</td>
                <td>#LE{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone_no }}</td>
                <td>
                <!-- seen status -->
                  <p>
                    @if($order->is_seen_by_admin)
                      <button class="button btn btn-success btn-sm mt-3">Seen</button>
                    @else
                      <button class="button btn btn-danger btn-sm mt-3">Unseen</button>
                    @endif
                  
                  <!-- complete status  -->
                  
                    @if($order->is_completed)
                      <button class="button btn btn-success btn-sm mt-3">Completed</button>
                    @else
                      <button class="button btn btn-danger btn-sm mt-3">Not Completed</button>
                    @endif
                  
                  <!-- paid status  -->
                  
                    @if($order->is_paid)
                      <button class="button btn btn-success btn-sm mt-3">Paid</button>
                    @else
                      <button class="button btn btn-danger btn-sm mt-3">UnPaid</button>
                    @endif
                  </p>
                </td>
                
                <td>
                  <a class="btn btn-success" href="{{ route('admin.order.show',$order->id) }}">View Order</a>
                  <a class="btn btn-primary" href="{{ route('admin.pages.category.edit',$order->id) }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.order.delete',$order->id) }}">Delete</a>
                </td>
                 
                  
            </tr>
            </tbody>
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
