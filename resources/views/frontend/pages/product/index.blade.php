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
                        @include('frontend.pages.product.partials.all_products')
                        </div>
                        
                        </div>
                </div>
        </div>

{{-- sidebar & content end --}}
@endsection

