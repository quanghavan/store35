@extends('site.layout')
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
      <div class="compare-list">
        <h2>Compare Products</h2>
        <div class="compare-area">
          <div class="container">
            <div class="row">
                <div class="category-products col-lg-offset-3">
                    <ul class="products-grid">
                        @foreach($compare as $row)
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                          <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{ route('product.view', ['id' => $row->id]) }}"> <img alt="Product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->options->avatar }}"> </a>
                                    <div class="new-label new-top-left">new</div>
                                    <div class="sale-label sale-top-right">sale</div>
                                    <div class="mask-shop-white"></div>
                                    <a class="wishlist" value="{{ $row->id }}" href="{{ route('site.cart.add_to_wishlist') }}">
                                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                    </a>
                                    <a class="delete-compare" href="{{ route('site.cart.delete_product_compare', ['id' => $row->id]) }}">
                                        <div class="mask-right-shop"><i class="glyphicon glyphicon-trash"></i></div>
                                    </a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Product tilte is here" href="{{ route('product.view', ['id' => $row->id]) }}">{{ $row->name }}</a> </div>
                                    <div class="item-content">
                                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                      <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">{{ number_format($row->price, null, null, ".") }} VNĐ</span></span>
                                          
                                        </div>
                                      </div>
                                      <div class="actions">
                                        <div class="add_cart">
                                            <button data="{{ $row->id }}" link="{{ route('site.cart.add') }}" class="button btn-cart" title="Add to Cart" type="button">
                                                <i class="fa fa-shopping-cart"></i>Add to Cart
                                            </button>
                                      </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                    </ul>
                    @if($compare_sl < 2)
                        <div class="col-md-3 col-sm-4 col-xs-12"> 
                      <!-- single product start-->
                            <div class="upload-prodcut text-center">
                                <div class="upload-box">
                                    <a href="{{ route('site.home.index')}}"> <img src="{{ asset('source/bower_components/library/site/version4/images/compate.png') }}" alt=""></a>
                                    <p>Add Product</p>
                                </div>
                            </div>
                      <!-- single product end--> 
                        </div>
                    @endif
                </div>
                <br>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div><h3 class="text-center">Thông tin cấu hình</h3></div>
                <div class="table-responsive cart-area">
                  <table class="shop_table cart table text-center">
                    <tbody>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Màn hình:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['screen'] }}</td>
                        @endforeach
                       
                      </tr>
                        <tr class="cart_item">
                        <td class="item-quality">{{ __('Hệ điều hành:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['os'] }}</td>
                        @endforeach
                      </tr>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Camera sau:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['back_camera'] }}</td>
                        @endforeach
                       
                      </tr>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Camera trước:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['front_camera'] }}</td>
                        @endforeach
                       
                      </tr>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Ram:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['ram'] }}</td>
                        @endforeach
                      
                      </tr>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Bộ nhớ trong:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['memory'] }}</td>
                        @endforeach
                        
                      </tr>
                      <tr class="cart_item">
                        <td class="item-quality">{{ __('Dung lượng pin:') }}</td>
                        @foreach($compare as $row)
                            <td class="item-des">{{ $row->options->configuration['battery_capacity'] }}</td>
                        @endforeach
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection