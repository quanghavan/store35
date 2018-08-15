@extends('admin.layout')
@section('content')
    @include('admin.customer.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => 'customer.store', 'method' => 'post', 'class' => 'form']) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Thêm mới khách hàng') }}</h6>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên khách hàng:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('name', old('name'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_email">{{ __('Email:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::email('email', old('email'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_phone">{{ __('Số điện thoại:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('phone', old('phone'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_address">{{ __('Địa chỉ:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            {!! Form::select('address_id', $addresses, null, ['class' => 'address']) !!}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_password">{{ __('Mật khẩu:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::password('password', ['required']) !!}
                            </span> 
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_repassword">{{ __('Nhập lại mật khẩu:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::password('re_password', ['required']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit">
                        {{ Form::submit(__('Thêm mới'), ['class' => 'dredB']) }}
                        {{ Form::reset(__('Hủy bỏ'), ['class' => 'basic']) }}
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        {!! Form::close() !!}
    </div>
    <div class="clear mt30"></div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/add-select2.js') }}"></script>
@endsection
