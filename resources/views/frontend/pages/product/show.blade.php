@extends('frontend.layouts.master')

@section('title')
    {{ $product->title}} | Laravel Ecommerce Site
@endsection


@section('content')
{{-- sidebar & content start --}}

<div class="container margin-top-20">
        <div class="row">
                <div class="col-md-4">
                        
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="product-item carousel-inner">
                            @php $i=1; @endphp
                                @foreach($product->images as $image)
                                <div class="carousel-item {{ $i == 1 ? 'active':'' }}">
                                <img class="d-block w-100" src="{{ asset('public/images/products/'.$image->image) }}" alt="First slide">
                                </div>
                            @php $i++; @endphp
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                            <div class="mt-4">
                           <p> Category <span class="btn btn-primary">{{ $product->category->name }}</span></p>
                           <p>Brand <span class="btn btn-primary">{{ $product->brand->name }}</span></p>
                            </div>
                        </div>
                <div class="col-md-8">
                        <div class="widget bg">
                            <h3>{{ $product->title }}</h3>           
                        </div>
                        <h3><b>{{ $product->price }} Taka</b>
                            <span class="btn btn-primary">                                           
                            {{ $product->quantity < 1 ? 'No item Available' : $product->quantity.' Item in stock' }}
                            </span>
                        </h3>
                        <!-- <h2 class="btn btn-primary"> {{ $product->quantity < 1 ? 'No item Available' : $product->quantity.' Item in stock' }}</h2> -->
                        <hr>
                        <p>{{ $product->description }}</p>
                        
                        </div>
                </div>
        </div>

{{-- sidebar & content end --}}
@endsection



