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
                        <h3>All Products in <span class="btn btn-primary">{{ $category->name }}</span> Category</h3>
                            @php
                                $products = $category->products()->paginate(9);
                            @endphp
                            @if($products->count() > 0 )
                                 @include('frontend.pages.product.partials.all_products');
                                @else
                                <div class="alert alert-warning">
                                        No product has added yet in this category!!
                                </div>

                            @endif
                        </div>
                        
                        </div>
                </div>
        </div>

{{-- sidebar & content end --}}
@endsection

