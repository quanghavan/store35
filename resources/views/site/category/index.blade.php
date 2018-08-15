@extends('site.layout')
	@section('content')
		  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li><a href="{{ route('site.home.index') }}" title="Go to Home Page">{{ __('Trang chủ') }}</a><span>/</span></li>
            <li><strong>{{ $cate->name }}</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <article class="col-main">
            <div class="page-title">
              <h2>{{ $cate->name }}</h2>
            </div>
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode"> <a class="button-grid" title="Grid" href="">&nbsp;</a><span class="button-active button-list" title="List">&nbsp;</span></div>
              </div>
            </div>
            <div class="category-products list">
              <ol class="products-list" id="products-list">
              	@foreach($product as $row)
                <li class="item">
                  <div class="product-image"> <a href="product-detail.html" title="Product tilte is here"> <img class="small-image" src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}" alt="Product tilte is here"> </a>
                    <div class="new-label new-top-left">{{ __('New') }}</div>
                  </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="product-detail.html" title="Product tilte is here">{{ $row->name }}</a></h2>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                    <div class="desc std" style="height: 7em; overflow: hidden;">
                    	<p>{!! $row->descript !!}<p>
                    </div>
                    <a class="link-read" href="{{ route('product.view', ['id' => $row->id]) }}">{{ __('Read More') }}</a>
                    <div class="price-box">
                    	@if($row->discount > 0)
                      <p class="old-price"> <span class="price-label"></span><span class="price">{{ number_format($row->price, null, null, ".") }} VNĐ</span></p>
                      @endif
                      <p class="special-price"> <span class="price-label"></span><span class="price">{{ number_format($row->price - $row->discount, null, null, ".") }} VNĐ</span></p>
                    </div>
                    <div class="actions">
                        <button data="{{ $row->id }}" link="{{ route('site.cart.add') }}" class="button btn-cart" title="Add to Cart" type="button">
                            <i class="fa fa-shopping-cart"></i>Add to Cart
                        </button>
                        <span class="add-to-links">
                            <a title="Add to Wishlist" class="button link-wishlist wishlist" value="{{ $row->id }}" href="{{ route('site.cart.add_to_wishlist') }}">
                                <i class="fa fa-heart"></i>Add to Wishlist
                            </a>
                            <a title="Add to Compare" class="button link-compare compare" value="{{ $row->id }}" href="{{ route('site.cart.add_to_compare') }}"><i class="fa fa-signal"></i>Add to Compare
                            </a>
                        </span>
                    </div>
                  </div>
                </li>
                @endforeach
              </ol>
            </div>
            <div class="category-products grid">
              <ul class="products-grid">
              	@foreach($product as $row)
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}"> </a>
                            <div class="sale-label sale-top-right">sale</div>
                            <div class="mask-shop-white"></div>
                            <a class="wishlist" value="{{ $row->id }}" href="{{ route('site.cart.add_to_wishlist') }}">
                              <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a>
                            <a class="compare" value="{{ $row->id }}" href="{{ route('site.cart.add_to_compare') }}">
                              <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product tilte is here" href="{{ route('product.view', ['id' => $row->id]) }}">{{ $row->name }}</a> </div>
                            <div class="item-content">
                              <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">{{ number_format($row->price - $row->discount, null, null, ".") }} VNĐ</span></span>
                                    @if($row->discount > 0)
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{ number_format($row->price, null, null, ".") }} VNĐ</span> </p>
                                    @endif
                                </div>
                              </div>
                              <div class="actions">
                                <div class="add_cart">
                                  <button data="{{ $row->id }}" link="{{ route('site.cart.add') }}" class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            	<div class="toolbar bottom">
              
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
	@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.grid').hide();
			$(document).on('click', '.button-grid', function(e){
				e.preventDefault();
				$('.grid').show();
				$(this).parent().html('<span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="" title="List" class="button-list">&nbsp;</a>');
				$('.list').hide();
			});
			$(document).on('click', '.button-list', function(e){
				e.preventDefault();
				$('.list').show();
				$(this).parent().html('<a class="button-grid" title="Grid" href="">&nbsp;</a><span class="button-list button-active" title="List">&nbsp;</span>');
				$('.grid').hide();
			});
			
		});
	</script>
@endsection