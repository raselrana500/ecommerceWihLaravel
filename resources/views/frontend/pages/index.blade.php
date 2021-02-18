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
                        <h3>Featured Products</h3>
                        <div class="row">

                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="widget bg">
                        <h3>New Arrival</h3>
                        <div class="row">

                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-10">
                                <div class="card">
                                    <img class="card-img-top featured-img" src="{{ asset('public/images/products/'. 'samsung.png') }}" alt="Card image">
                                    <div class="card-body">
                                        <h4 class="card-title">Samsung</h4>
                                        <p class="card-text">Taka: 5000</p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </din>
        </div>

{{-- sidebar & content end --}}
@endsection

