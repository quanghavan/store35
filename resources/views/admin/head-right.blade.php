<div class="topNav">
    <div class="wrapper">
        <div class="userNav">
            <ul>
                <li><a href="" target="_blank">
                        <img id="head-right-img" src="{{ asset('source/bower_components/library/backend/admin/images/icons/light/home.png') }}" />
                        <span>{{ trans('common.head.trang_chu') }}</span>
                    </a></li>

                <!-- Logout -->
                <li><a href="{{ route('admin.logout') }}">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/topnav/logout.png') }}" alt="" />
                        <span>{{ trans('common.head.dang_xuat') }}</span>
                    </a></li>

            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
<!-- Main content -->
