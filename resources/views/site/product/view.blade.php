@extends('site.layout')
  @section('content')
   <!-- Breadcrumbs -->
  <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <li class="home"> <a href="{{ route('site.home.index') }}" title="Go to Home Page">{{ __('Trang chủ') }}</a> <span>/</span></li>
              <li><a href="{{ route('site.category.index', ['id' => $product->category->id]) }}" title="">{{ $product->category->name }}</a> <span>/ </span></li>
              <li> <strong>{{ $product->name }} </strong> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
     <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
            <form action="#" method="post" id="product_addtocart_form">
              <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                <div class="product-image">
                  <div class="product-full">
                    @if($product->discount > 0)
                      <div class="sale-label sale-top-right"> sale </div>
                    @else
                      <div class="new-label new-top-left"> New </div>
                    @endif
                    <img id="product-zoom" src="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}" data-zoom-image="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}" alt="product-image"/> </div>
                    <div class="more-views">
                    <div class="slider-items-products">
                        <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                          <div class="slider-items slider-width-col4 block-content">
                            <div class="more-views-items">
                              <a href="#" data-image="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}" data-zoom-image="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}">
                                <img id="product-zoom"  src="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}" alt="product-image" />
                              </a>
                            </div>
                            @foreach($product->images->take(3) as $row)
                            <div class="more-views-items">
                              <a href="#" data-image="{{ url(config('app.imageUrl')) }}/{{ $row->image_link }}" data-zoom-image="{{ url(config('app.imageUrl')) }}/{{ $row->image_link }}">
                                <img id="product-zoom"  src="{{ url(config('app.imageUrl')) }}/{{ $row->image_link }}" alt="product-image" />
                              </a>
                            </div>
                            @endforeach
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- end: more-images --> 
              </div>
              <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                <div class="product-name">
                  <h1>{{ $product->name }}</h1>
                </div>
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <div class="price-block">
                  <div class="price-box">
                    <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> {{ number_format($product->price - $product->discount, null, null, ".") }} VNĐ</span></p>
                    
                    @if($product->discount > 0)
                    <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> {{ number_format($product->price, null, null, ".") }} VNĐ</span></p>
                    @endif
                    <p class="availability in-stock"><span>In Stock</span></p>
                  </div>
                </div>
                <div class="add-to-box" style="width: 99%">
                  <div class="add-to-cart">
                    <div class="pull-left">
                      <div class="custom pull-left">
                        <label>{{ __('Số lượng:') }}</label>
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                        <input type="text" onkeypress="validate(event)" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty" required>
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                      </div>
                    </div>
                    <button data="{{ $product->id }}" link="{{ route('site.cart.add') }}" class="button btn-cart multiple" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                  </div>
                  <div class="email-addto-box">
                    <ul class="add-to-links">
                      <li><a class="link-wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                      <li><a class="link-compare" href="compare.html"><i class="fa fa-signal"></i><span>Add to Compare</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="product-next-prev"> <a class="product-next" href="#"><i class="fa fa-angle-left"></i></a> <a class="product-prev" href="#"><i class="fa fa-angle-right"></i></a> </div>
              </div>
            </form>
          </div>
        </div>
        <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
          <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
            <li class="active"> <a href="#product_tabs_description" data-toggle="tab">{{ __('Mô tả') }}</a></li>
            <li><a href="#product_tabs_tags" data-toggle="tab">{{ __('Thông số') }}</a></li>
            <li><a href="#product_tabs_comment" data-toggle="tab">{{ __('Bình luận') }}</a></li>
          </ul>
          <div id="productTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std">
                    {!! $product->descript !!}  
                </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_tags">
              <div class="box-collateral box-tags">
                <div class="tags">
                  <form id="addTagForm" action="#" method="get">
                    <div class="form-add-tags">
                        @if(count($product->configuration) > 0) 
                        <table class="table table-condensed" style="width: 50%;">
                        <tbody >
                          <tr >
                            <th class="col-lg-1 table-product">{{ __('Màn hình:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->screen }}</td>
                          </tr>
                          <tr>
                            <th class="col-lg-2 table-product">{{ __('Hệ điều hành:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->os }}</td>
                           
                          </tr>
                          <tr>
                            <th class="col-lg-1 table-product">{{ __('Camera sau:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->back_camera }}</td>
                          
                          </tr>
                           <tr>
                            <th class="col-lg-1 table-product">{{ __('Camera trước:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->front_camera }}</td>
                          </tr>
                           <tr>
                            <th class="col-lg-1 table-product">{{ __('Ram:') }}</td>
                            <td class="col-lg-5 table-product">{{ $product->configuration->ram }}</th>
                          </tr>
                          <tr>
                            <th class="col-lg-1 table-product">{{ __('Bộ nhớ trong:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->memory }}</td>
                          </tr>
                          <tr>
                            <th class="col-lg-1 table-product">{{ __('Dung lượng pin:') }}</th>
                            <td class="col-lg-5 table-product">{{ $product->configuration->battery_capacity }}</td>
                          </tr>
                        </tbody>
                        </table>
                        @endif
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade in" id="product_tabs_comment">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                            <br />
                            <h4>Add comment</h4>
                            <div>
                                <div class="form-group">
                                    <textarea type="text" rows="5" name="comment_body" class="form-control"></textarea> 
                                </div>
                                <div class="form-group">
                                    <input id="add-comment" type="submit" post="{{ $product->id }}" class="btn btn-warning" value="Post" />
                                </div>
                            </div>
                            <h4>Display Comments</h4>
                            @include('site.product.reply', ['comments' => $product->comments()->latest()->get(), 'product_id' => $product->id])
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 

  <!-- Related Products Slider -->

  <div class="container">
    <div class="jtv-related-products">
      <div class="slider-items-products">
        <div class="jtv-new-title">
          <h2>{{ __('Sản phẩm cùng loại') }}</h2>
        </div>
        <div class="related-block">
          <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                @foreach($product_relate as $row)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="mask-shop-white"></div>
                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a> <a href="compare.html">
                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                            </a> </div>
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
                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Related Products Slider End --> 

  <!-- Upsell Product Slider -->

  <div class="container">
    <div class="jtv-upsell-products">
      <div class="slider-items-products">
        <div class="jtv-new-title">
          <h2>{{ __('Sản phẩm bán chạy') }}</h2>
        </div>
        <div class="upsell-block">
          <div id="jtv-upsell-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                 @foreach($product_sell as $row)
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="mask-shop-white"></div>
                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a> <a href="compare.html">
                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                            </a> </div>
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
                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- End Upsell  Slider --> 
  </div>
  @endsection
@section('script')
<script type="text/javascript">
    function validate(e) {
    var ev = e || window.event;
    var key = ev.keyCode || ev.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]/;
    if ( !regex.test(key) ) {
        ev.returnValue = false;
        if (ev.preventDefault) 
            ev.preventDefault();
        }
    }
</script>
<script type="text/javascript" src="{{ asset('source/bower_components/library/site/version4/js/add-comment.js') }}"></script>
@endsection
