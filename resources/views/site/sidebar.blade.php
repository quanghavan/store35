<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                @foreach($category as $row)
                    @if($row->parent_id == 0)
                        <li>
                            <a href="?page=category_product" title="">{{ $row->name }}</a>
                            @if(count($row->subCategory) > 0)
                                @include('site.sub', ['sub' => $row->subCategory])
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-13.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                        <div class="price">
                            <span class="new">5.190.000đ</span>
                            <span class="old">7.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-11.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-12.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-05.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-22.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-23.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-18.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                <li class="clearfix">
                    <a href="?page=detail_product" title="" class="thumb fl-left">
                        <img src="public/images/img-pro-15.png" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                        <div class="price">
                            <span class="new">15.190.000đ</span>
                            <span class="old">17.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>