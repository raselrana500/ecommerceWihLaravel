@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="card">
      <div class="card-header">
        <strong>Manage Sliders</strong> 
      </div>
      <div class="card-body">
        @include('backend.partials.messagess')
        <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-4" style="float:right;" data-toggle="modal" data-target="#sliderModal">
          Add New Slider
          </button>
          <!-- <button type="button" class="btn btn-primary mb-4" style="float:left;" data-toggle="modal" data-target="#editModal">
          Edit Slider
          </button> -->

          <!-- Slider Insert Modal -->
          <div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="sliderModalLabel">Insert Slider</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.slider.store')  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      Slider Title : <small class="text-danger">Required</small>  
                      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Slider Title" required>
                    </div>
                    <div class="form-group">
                      Slider Image : <small class="text-danger">Required</small>
                      <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                      Slider Button Text : 
                      <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Enter Button Text">
                    </div>
                    <div class="form-group">
                      Slider Button Link : 
                      <input type="text" class="form-control" name="button_link" id="button_link" placeholder="Enter Button Link">
                    </div>
                    <div class="form-group">
                      Slider Priority : <small class="text-danger">Required</small> 
                      <input type="number" class="form-control" name="priority" id="priority" placeholder="Enter priority" required>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Add Slider</button>
                  </form>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Slider</button>
                </div> -->
              </div>
            </div>
          </div>

          
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>Slider Title</th>
                <th>Slider image</th>
                <th>Slider priority</th>
                <th>Action</th>
            </tr>
            @foreach ($sliders as $slider)
            <tr>
                
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->title }}</td>
                <td>
                <img src="{{ asset('public/images/sliders/'.$slider->image) }}" alt="images" width="100" />
                </td>
                
                <td>{{ $slider->priority }}</td>
                
                <td>
                  <a class="btn btn-info"data-toggle="modal" data-target="#editModal{{ $slider->id  }}" href="#editModal{{ $slider->id }}">Edit</a>
                  <a class="btn btn-danger" href="{{ route('admin.slider.delete',$slider->id) }}">Delete</a>
                </td>
              <!-- update slider Modal -->
          <div class="modal fade" id="editModal{{ $slider->id  }}" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="sliderModalLabel">Update Slider</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.slider.update',$slider->id)  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      Slider Title : <small class="text-danger">Required</small>  
                      <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title  }}" placeholder="Enter Slider Title">
                    </div>
                    <div class="form-group">
                      Slider Image : 
                      <a href="{{ asset('public/images/sliders/'.$slider->image) }}" target="_blank">
                        Previous Image
                      </a>
                      <small class="text-danger">Required</small>
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group">
                      Slider Button Text : 
                      <input type="text" class="form-control" name="button_text" id="button_text" value="{{ $slider->button_text  }}" placeholder="Enter Button Text">
                    </div>
                    <div class="form-group">
                      Slider Button Link : 
                      <input type="text" class="form-control" name="button_link" id="button_link" value="{{ $slider->button_link  }}" placeholder="Enter Button Link">
                    </div>
                    <div class="form-group">
                      Slider Priority : <small class="text-danger">Required</small> 
                      <input type="number" class="form-control" name="priority" id="priority" value="{{ $slider->priority  }}" placeholder="Enter priority">
                    </div>                    
                    <button type="submit" class="btn btn-primary">Update Slider</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </form>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Slider</button>
                </div> -->
              </div>
            </div>
          </div>   
                  
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
