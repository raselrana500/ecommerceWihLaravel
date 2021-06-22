            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 margin-bottom-10">
                    <div class="card">
                        @php $i=1; @endphp
                            @foreach ($product->images as $image)
                                @if ($i > 0)
                                <a href="{{ route('products.show',$product->slug) }}"><img class="card-img-top featured-img" src="{{ asset('public/images/products/'. $image->image) }}" alt="{{ $product->title }}"></a>  
                                @endif
                            @php $i--; @endphp
                        @endforeach
                        
                        <div class="card-body">
                            <h4 class="card-title">
                                <a style="text-decoration:none;color:#000000;" href="{{ route('products.show',$product->slug) }}">{{ $product->title }}</a>
                            </h4>
                            <p class="card-text"><strong style="color:red;font-size:20px ;">Price:</strong> {{ $product->price }} TK</p>
                            @include('frontend.pages.product.partials.cart_button')
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="paginate mt-4">
                {{ $products->links() }}
            </div>