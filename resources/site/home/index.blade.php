@extends('site.layout')
@section('content')
    <div class="section" id="feature-product-wp">
        <div class="section-head">
            <h3 class="section-title">{{ __('Sản phẩm nổi bật') }}</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach($product_high as $row)
                    <li>
                        <a href="?page=detail_product" title="" class="thumb">
                            <img src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}">
                        </a>
                        <a href="?page=detail_product" title="" class="product-name">{{ $row->name }}</a>
                        <div class="price">
                            <span class="new">{{ number_format($row->price - $row->discount) }} {{ __('VNĐ') }}</span>
                            @if($row->discount > 0)
                                <span class="old">{{ number_format($row->price) }} {{ __('VNĐ') }}</span>
                            @endif
                        </div>
                        <div class="action clearfix">
                            <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="list-product-wp">
        <div class="section-head">
            <h3 class="section-title">{{ __('Sản phẩm mới') }}</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @foreach($product_new as $row)
                    <li>
                        <a href="?page=detail_product" title="" class="thumb">
                            <img src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}">
                        </a>
                        <a href="?page=detail_product" title="" class="product-name">{{ $row->name }}</a>
                        <div class="price">
                            <span class="new">{{ number_format($row->price - $row->discount) }} {{ __('VNĐ') }}</span>
                            @if($row->discount > 0)
                                <span class="old">{{ number_format($row->price) }} {{ __('VNĐ') }}</span>
                            @endif
                        </div>
                        <div class="action clearfix">
                            <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="list-product-wp">
        <div class="section-head">
            <h3 class="section-title">{{ __('Sản phẩm khuyến mại') }}</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item clearfix">
                @foreach($product_disc as $row)
                    <li>
                        <a href="?page=detail_product" title="" class="thumb">
                            <img src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}">
                        </a>
                        <a href="?page=detail_product" title="" class="product-name">{{ $row->name }}</a>
                        <div class="price">
                            <span class="new">{{ number_format($row->price - $row->discount) }} {{ __('VNĐ') }}</span>
                            <span class="old">{{ number_format($row->price) }} {{ __('VNĐ') }}</span>
                        </div>
                        <div class="action clearfix">
                            <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection