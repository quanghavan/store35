@extends('site.layout')
	@section('content')
		<div class="main-container col1-layout">
	        <div class="container">
	        <div class="row">
	        <section class="col-sm-12 col-xs-12">
	          <div class="cart-page-area">
	            <h2>My Wishlist</h2>
	            <form method="post" action="#">
	              	<div class="table-responsive">
	                <table class="shop-cart-table">
	                  <thead>
	                    <tr>
							<th class="product-thumbnail ">Image</th>
							<th class="product-name ">Product Name</th>
							<th class="product-price ">Unit Price</th>
							<th class="product-subtotal ">Stock</th>
							<th class="product-quantity">Add Item</th>
							<th class="product-remove">Remove</th>
	                    </tr>
	                  	</thead>
	                  	<tbody>
	                  		@foreach($wishList as $row)
		                    <tr class="cart_item">
								<td class="item-img">
									<a href="#">
										<img src="{{ url(config('app.imageUrl')) }}/{{ $row->options->avatar }}">
									</a>
								</td>
								<td class="item-title"><a href="#">{{ $row->name }}</a></td>
								<td class="item-price"> {{ number_format($row->price, null, null, ",") }} đ</td>
								<td class="item-qty"> In Stock </td>
								<td class="total-price">
									<button data="{{ $row->id }}" link="{{ route('site.cart.add') }}" class="button btn-cart" type="button">
										<span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
									</button>
								</td>
								<td class="remove-item">
									<a class="wishlist-remove" value="{{ $row->rowId }}" href="" link="{{ route('site.cart.delete_product_wishlist') }}">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
		                    </tr>
		                    @endforeach
	                  </tbody>
	                </table>
	              	</div>
	            	</form>
	          	</div>
	        </section>
	      	</div>
	    </div>
    </div>
    <br>
	@endsection