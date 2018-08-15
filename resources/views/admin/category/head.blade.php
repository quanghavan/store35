<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ __('Danh mục') }}</h5>
            <span>{{ __('Quản lý danh mục') }}</span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('category.restore') }}">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/control/16/database.png') }}">
                        <span>{{ __('Khôi phục') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.create') }}">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/control/16/add.png') }}">
                        <span>{{ trans('common.head.tm') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/control/16/list.png') }}">
                        <span>{{ trans('common.head.ds') }}</span>
                    </a>
                </li>
            </ul>
            </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
@include('admin.message')
