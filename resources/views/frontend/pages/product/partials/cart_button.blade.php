<form class="form-inline" action="{{ route('carts.store') }}" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}" />
<button type="button" onClick="addToCart({{ $product->id }})" class="btn btn-warning"><i class="fa fa-plus"></i> Add to Cart</button>
</form>