<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlfabulous.justthemevalley.com/version4/product-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 May 2018 19:34:55 GMT -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="Fabulous is a creative, clean, fully responsive, powerful and multipurpose HTML Template with latest website trends. Perfect to all type of fashion stores.">
  <meta name="keywords" content="HTML,CSS,womens clothes,fashion,mens fashion,fashion show,fashion week">
  <meta name="author" content="JTV">
<title>{{ __('Fabulous') }}</title>

<!-- Favicons Icon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/site/version4/css/styles.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/select2.css') }}" />
</head>
<link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/jquery-confirm.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/crown/css/jquery.dataTables.min.css') }}" />
<body class="product-page">
<!-- Mobile Menu -->
<div id="jtv-mobile-menu">
  <ul>
    <li>
      <div class="mm-search">
        <form id="mob-search" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    @foreach($category as $row)
        @if($row->parent_id == 0 && count($row->subCategory) > 0)
        <li>
            <a href="#">{{ $row->name }}</a>
            <ul>
                @foreach($row->subCategory as $value)
                    <li>
                        <a href="{{ route('site.category.index', ['id' => $value->id]) }}">{{ $value->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        @elseif($row->parent_id == 0)
        <li>
            <a href="{{ route('site.category.index', ['id' => $row->id]) }}">{{ $row->name }}</a>
        </li>
        @endif
    @endforeach
    <li class="nosub">
        <a href="{{ route('site.news.index') }}">{{ __('tin tức') }}</a>
    </li>
    <li class="nosub">
        <a href="{{ route('site.contact.index') }}">{{ __('liên hệ') }}</a>
    </li>
  </ul>
  <div class="top-links">
    <ul class="links">
      <li>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
            </ul>
        </div>
      </li>
      <li><a title="Wishlist" href="wishlist.html">Wishlist</a></li>
      <li><a title="Checkout" href="checkout.html">Checkout</a></li>
      <li><a title="Blog" href="blog.html"><span>Blog</span></a></li>
      <li class="last"><a title="Login" href="login.html"><span>Login</span></a></li>
    </ul>
  </div>
</div>
<div id="page"> 
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-3 col-xs-12"> 
            
            <!-- Header Logo -->
            <div class="logo"><a title="ecommerce Template" href="{{ route('site.home.index') }}"><img alt="ecommerce Template" src="{{ asset('source/bower_components/library/site/version4/images/logo.png') }}"></a></div>
            <!-- End Header Logo -->
            <div class="nav-icon">
              <div class="mega-container visible-lg visible-md visible-sm">
                <div class="navleft-container">
                  <div class="mega-menu-title">
                    <h3><i class="fa fa-navicon"></i>{{ __('Danh mục') }}</h3>
                  </div>
                  <div class="mega-menu-category">
                    <ul class="nav">
                      @foreach($category as $row)
                            @if($row->parent_id == 0 && count($row->subCategory) > 0)
                            <li>
                                <a href="#">{{ $row->name }}</a>
                                <div class="wrap-popup column1">
                                  <div class="popup">
                                    <ul class="nav">
                                        @foreach($row->subCategory as $value)
                                            <li>
                                                <a href="{{ route('site.category.index', ['id' => $value->id]) }}">{{ $value->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                  </div>
                                </div>
                            </li>
                            @elseif($row->parent_id == 0)
                            <li class="nosub">
                                <a href="{{ route('site.category.index', ['id' => $row->id]) }}">{{ $row->name }}</a>
                            </li>
                            @endif
                        @endforeach
                        <li class="nosub">
                            <a href="{{ route('site.news.index') }}">{{ __('tin tức') }}</a>
                        </li>
                        <li class="nosub">
                            <a href="{{ route('site.contact.index') }}">{{ __('liên hệ') }}</a>
                        </li>
                    </ul>
                    <div class="side-banner">
                        <img src="{{ asset('source/bower_components/library/site/version4/images/top-banner.jpg') }}" alt="Flash Sale" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
            <div class="jtv-mob-toggle-wrap">
              <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
            </div>
            <div class="jtv-header-box">
              <div class="search_cart_block">
                <div class="search-box hidden-xs" style="margin-left: 170px">
                    {!! Form::open(['route' => 'site.home.search', 'method' => 'get']) !!}
                        {!! Form::text('key', null, ['class' => 'searchbox', 'placeholder' => 'Search', 'id' => 'search']) !!}
                        <button type="submit" title="Search" class="search-btn-bg" id="submit-button">
                            <span class="hidden-sm">Search</span>
                            <i class="fa fa-search hidden-xs hidden-lg hidden-md"></i>
                        </button>
                    {!! Form::close() !!}
                </div>
                <div class="right_menu">
                  <div class="menu_top">
                     <div class="top-cart-contain pull-right" style="margin-left: 15px">
                      <div class="mini-cart">
                        <div class="basket"><a class="basket-icon" href="{{ route('site.cart.view_to_compare') }}"><i class="fa fa-balance-scale"></i> Compare <span class="badge" id="so-luong">{{ $compare_sl > 0 ? $compare_sl : "" }}</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="top-cart-contain pull-right">
                      <div class="mini-cart" id="cart-content">
                        <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Shopping Cart <span class="badge">{{ count($cart_init) > 0 ? count($cart_init) : "" }}</span></a>
                          <div class="top-cart-content">
                            @if(count($cart_init) > 0)
                                <div class="block-subtitle">
                                    <div class="top-subtotal">{{ count($cart_init) }} Sản phẩm, <span class="price">{{ $amount }} đ</span></div>
                                </div>
                                <ul class="mini-products-list" id="cart-sidebar">
                                    @foreach($cart_init as $row)
                                    <li class="item">
                                        <div class="item-inner"><a class="product-image" title="product tilte is here" href="product-detail.html"><img alt="product tilte is here" src="{{ url(config('app.imageUrl')) }}/{{ $row->options->avatar }}"></a>
                                        <div class="product-details">
                                        
                                        <p class="product-name"><a href="product-detail.html">{{ $row->name }}</a></p>
                                        <strong>{{ $row->qty }}</strong> x <span class="price">{{ number_format($row->price, null, null, '.') }} đ</span></div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="actions"> 
                                    <a href="{{ route('site.cart.view') }}" class="view-cart"><span>View Cart</span></a>
                                    <button class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button>
                                </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="top_section hidden-xs">
                <div class="toplinks">
                    <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> <strong>Hotline:</strong> +1 123 456 7890</a> <a href="mailto:support@example.com"><i class="fa fa-envelope"></i> support@example.com</a> </div>
                    <ul class="links">
                        @if(Auth::check())
                            <li>
                                <a title="My Account" href="{{ route('site.customer.edit', ['customer' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a title="My Wishlist" href="{{ route('site.cart.view_to_wishlist') }}">Wishlist
                                <span id="wl_sl" class="badge">{{ $wl_sl > 0 ? $wl_sl : ""}}</span></a>
                            </li>
                            <li><a title="Checkout" href="checkout.html">Checkout</a></li>
                            <li><a title="Checkout" href="{{ route('site.customer.logout') }}">Log Out</a></li>
                        @else
                            <li><a title="Track Order" href="{{ route('site.customer.regester') }}">Regester</a></li>
                            <li><a title="Log In" href="{{ route('site.customer.login') }}">Log In</a></li>
                        @endif
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>