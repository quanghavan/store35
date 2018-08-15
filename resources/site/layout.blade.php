@include('site.head')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            @include('site.right')
            @yield('content')
        </div>
        @include('site.sidebar')
    </div>
</div>
@include('site.footer')