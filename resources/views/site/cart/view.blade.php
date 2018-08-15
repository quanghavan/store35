@extends('site.layout') 
    @section('content')
    <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('site.home.index') }}" title="Go to Home Page">{{ __('Trang chủ') }}</a> <span>/</span></li>
            <li> <strong>{{ __('Giỏ hàng') }}</strong> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- main-container -->
  <div class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-area">
            <div class="title-tab-product-category">
              <div class="text-center">
                <ul class="nav jtv-heading-style" role="tablist">
                  <li role="presentation" class="active"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">{{ __('1 Shopping cart') }}</a></li>
                  <li role="presentation"><a href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab">{{ __('2 Check Imfomation') }}</a></li>
                  <li role="presentation" class=""><a href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab">{{ __('3 Checkout') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="content-tab-product-category"> 
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="cart"> 
                  <!-- cart are start-->
                  <div class="cart-page-area">
                    <form method="post" action="{{ route('site.cart.update') }}">
                        {{ csrf_field() }}
                      <div class="table-responsive">
                        <table class="shop-cart-table">
                          <thead>
                            <tr>
                              <th class="product-thumbnail ">Image</th>
                              <th class="product-name ">Product Name</th>
                              <th class="product-unitprice ">Unit Price</th>
                              <th class="product-quantity">Quantity</th>
                              <th class="product-subtotal ">Total</th>
                              <th class="product-remove">Remove</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($cart as $row)
                            <tr class="cart_item row-{{ $row->id }}">
                              <td class="item-img"><a href="#"><img src="{{ url(config('app.imageUrl')) }}/{{ $row->options->avatar }}" alt="Product tilte is here "> </a></td>
                              <td class="item-title"><a href="#">{{ $row->name }}</a></td>
                              <td class="item-price">{{ number_format($row->price, null, null, ".") }} đ</td>
                              <td class="item-qty"><div class="cart-quantity">
                                  <div class="product-qty">
                                    <div class="cart-quantity">
                                      <div class="cart-plus-minus">
                                        <input onkeypress="validate(event)" min="1" value="{{ $row->qty }}" name="qty[]" class="cart-plus-minus-box" type="number" required>
                                      </div>
                                    </div>
                                  </div>
                                </div></td>
                              <td class="total-price"><strong>{{ number_format($row->qty * $row->price, null, null, ".") }} đ</strong></td>
                                <td class="remove-item">
                                    <a data="{{ $row->rowId }}" value="{{ $row->id }}" class="delete" href="" link="{{ route('site.cart.delete') }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="cart-bottom-area">
                        <div class="row">
                          <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="update-coupne-area">
                              <div class="update-continue-btn text-right">
                                <button class="button btn-continue" title="Continue Shopping" type="button"><span>{{ __('Continue Shopping') }}</span></button>
                                <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span>{{ __('Update Cart') }}</span></button>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-5 col-xs-12">
                            <div class="cart-total-area">
                              <div class="catagory-title cat-tit-5 text-right">
                                <h3>Cart Totals</h3>
                              </div>
                              <div class="sub-shipping">
                                <p>Subtotal <span>{{ $total }} đ</span></p>
                              </div>
                              <div class="shipping-method text-right">
                                <p><a href="#">Calculate Shipping</a></p>
                              </div>
                              <div class="process-cart-total">
                                <p>Total <span>{{ $total }} đ</span></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- cart are end--> 
                </div>
                <div role="tabpanel" class="tab-pane  fade in" id="checkout"> 
                  <!-- Checkout are start-->
                  <div class="checkout-area">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="coupne-customer-area mb50">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-xs-12">
                              <div class="billing-details">
                                <div class="contact-text right-side">
                                  <h2>{{ __('Thông tin cơ bản') }}</h2>
                                  <form action="#">
                                    <div class="row">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-box">
                                          <label>{{ __('Tên khách hàng') }}</label>
                                           {!! Form::text('name', Auth::user()->name, ['disabled', 'required', 'class' => 'info']) !!}
                                        </div>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-box">
                                          <label>Email Address<em>*</em></label>
                                           {!! Form::email('email', Auth::user()->email, ['disabled', 'required', 'class' => 'info']) !!}
                                        </div>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-box">
                                          <label>Phone Number<em>*</em></label>
                                           {!! Form::text('phone', Auth::user()->phone, ['disabled', 'required', 'autocomplete' => 'off', 'class' => 'info']) !!}
                                        </div>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="input-box">
                                            <label>{{ __('Địa chỉ') }}<em>*</em></label>
                                            {!! Form::text('address_id',Auth::user()->address->address, ['disabled', 'class' => 'selectpicker select-custom']) !!}
                                        </div>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>
                                        <a style="color: red" href="{{ route('site.customer.edit', ['id' => Auth::user()->id]) }}">{{ __('Chỉnh sửa thông tin') }}</a>
                                        </p>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Checkout are end--> 
                </div>
                
                <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                {!! Form::open(['route' => 'site.order.add', 'method' => 'post', 'class' => 'form']) !!} 
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="checkout-payment-area">
                        <div class="checkout-total">
                          <h3>Your order</h3>
                          <form action="#" method="post">
                            <div class="table-responsive">
                              <table class="checkout-area table">
                                <thead>
                                  <tr class="cart_item check-heading">
                                    <td class="ctg-type"> Product</td>
                                    <td class="cgt-des"> Total</td>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $row)
                                    <tr class="cart_item check-item prd-name">
                                        <td class="ctg-type"> {{ $row->name }} × <span>{{ $row->qty }}</span></td>
                                        <td class="cgt-des"> {{ number_format($row->subtotal) }} đ</td>
                                    </tr>
                                    @endforeach
                                    <tr class="cart_item">
                                        <td class="ctg-type"> Subtotal</td>
                                        <td class="cgt-des">{{ $total }} đ</td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="ctg-type crt-total"> Total</td>
                                        <td class="cgt-des prc-total">{{ $total }} đ</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <p>{{ __('Địa chỉ giao hàng') }}<em>*</em></p>
                                            {!! Form::select('address_id', $addresses, null, ['class' => 'address', 'placeholder' => 'Chọn một địa chỉ', 'style' => 'width: 160px']) !!}
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>{{ __('Ghi chú') }}</p>
                                            {!! Form::textarea('note', old('note'), ['autocomplete' => 'off', 'id' => 'content']) !!}
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                              </table>
                            </div>
                          </form>
                        </div>
                        <div class="payment-section">
                            <div class="pay-toggle">  
                                <p>{{ __('Phương thức thanh toán') }}</p>
                                <div class="pay-type">
                                    {!! Form::radio('payment', 0) !!}
                                    <label for="pay-toggle01">{{ __('Direct Bank Transfer') }}</label>
                                </div>
                                <div class="pay-type">
                                    {!! Form::radio('payment', 1, true) !!}
                                    <label for="pay-toggle03">{{ __('Cash on Delivery') }}</label>
                                </div>
                                <div class="input-box">
                                    {{ Form::submit(__('Place order'), ['class' => 'button login']) }}
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {!! Form::close() !!}
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="jtv-crosssel-pro">
        <div class="jtv-new-title">
          <h2>you may be interested</h2>
        </div>
        <div class="category-products">
            <ul class="products-grid">
                @foreach($product_segest as $row)
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="{{ route('product.view', ['id' => $row->id]) }}"> <img alt="Product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="mask-shop-white"></div>
                            <a class="wishlist" value="{{ $row->id }}" href="{{ route('site.cart.add_to_wishlist') }}">
                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a>
                            <a class="compare" value="{{ $row->id }}" href="{{ route('site.cart.add_to_compare') }}">
                                <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                            </a> 
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
                                  <button link="{{ route('site.cart.add_to_cart', ['id' => $row->id])}}" class="button btn-cart add-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
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
      </div>
    </div>
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
    
    @endsection