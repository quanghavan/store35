<div id="left_content">
    <div id="leftSide" class="side-bar">
        <!-- Account panel -->
        <div class="sideProfile">
            <a href="" title="" class="profileFace"><img width="40" src="{{ asset('source/bower_components/library/backend/admin/images/user.png') }}" /></a>
            <span>{{ trans('common.sidebar.hello') }} <strong>{{ trans('common.sidebar.admin') }}</strong></span>
            <span>{{ Auth::user()->name }}</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->
        <ul id="menu" class="nav">
            <li class="home">
                <a href="{{ route('home.index') }}" class="active" id="current">
                    <span>{{ trans('common.layout.bang_dieu_kien') }}</span>
                    <strong></strong>
                </a>
            </li>
            <li class="tran">
                <a href="" class=" exp" >
                    <span>{{ trans('common.sidebar.qlbh') }}</span>
                    <strong>{{ __('1') }}</strong>
                </a>
                <ul class="sub">
                    <li >
                        <a href="{{ route('order.index') }}">
                            {{ __('Quản lý đơn hàng') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="product">
                <a href="" class=" exp" >
                    <span>{{ trans('common.sidebar.sp') }}</span>
                    <strong>{{ trans('common.sidebar.sp_nb') }}</strong>
                </a>
                <ul class="sub">
                    <li >
                        <a href="{{ route('product.index') }}">
                            {{ trans('common.sidebar.sp') }}
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('category.index') }}">
                            {{ trans('common.sidebar.dm') }}
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('comment.index') }}">
                            {{ trans('common.sidebar.bl') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="account">
                <a href="" class=" exp" >
                    <span>{{ trans('common.sidebar.tk') }}</span>
                    <strong>{{ trans('common.sidebar.qlbh_nb') }}</strong>
                </a>
                <ul class="sub">
                    <li >
                        <a href="{{ route('admin.index') }}">
                            {{ trans('common.sidebar.Admin') }}
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('customer.index') }}">
                            {{ trans('common.sidebar.customer') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="content">
                <a href="" class=" exp" >
                    <span>{{ trans('common.sidebar.nd') }}</span>
                    <strong>{{ __('3')}}</strong>
                </a>
                <ul class="sub">
                    <li >
                        <a href="{{ route('slide.index') }}">
                            {{ trans('common.sidebar.slide') }}
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('news.index') }}">
                            {{ trans('common.sidebar.news') }}
                        </a>
                    </li>
                    <li >
                        <a href="{{ route('contact.index') }}">
                            {{ __('Liên hệ') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
