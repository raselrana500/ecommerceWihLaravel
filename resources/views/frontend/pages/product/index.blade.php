@extends('frontend.layouts.master')



@section('content')
{{-- sidebar & content start --}}

<div class="container margin-top-20">
            <div class="row">
                <div class="col-md-4">
                    @include('frontend.partials.product_sidebar')
                </div>
                <div class="col-md-8">
                    <div class="widget bg">
                        <h3>All Products</h3>
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-4 margin-bottom-10">
                                <div class="card">
                                    @php $i=1; @endphp
                                    @foreach ($product->images as $image)
                                    @if ($i>0)
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. $image->image) }}" alt="Card image">  
                                    @endif
                                    @php $i--; @endphp
                                    @endforeach
                                    
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            {{ $product->title }}
                                        </h4>
                                        <p class="card-text"><strong style="color:red;font-size:20px ;">Price:</strong> {{ $product->price }} TK</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- sidebar & content end --}}
@endsection

