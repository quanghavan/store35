@extends('admin.layout')
@section('content')
   @include('admin.customer.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => ['customer.update', $customer->id], 'method' => 'PUT', 'class' => 'form']) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Cập nhật thông tin khách hàng') }}</h6>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên khách hàng:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('name', $customer->name, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::email('email', $customer->email, ['disabled', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('phone', $customer->phone, ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_address">{{ __('Địa chỉ:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            {!! Form::select('address_id', $addresses, "$customer->address_id", ['class' => 'address']) !!}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_password">{{ __('Mật khẩu:') }}</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::password('password') !!}
                            </span> 
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_repassword">{{ __('Nhập lại mật khẩu:') }}</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::password('re_password') !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit">
                        {{ Form::submit(__('Cập nhật'), ['class' => 'redB']) }}
                        {{ Form::reset(__('Hủy bỏ'), ['class' => 'basic']) }}
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        {!! Form::close() !!}
        <p class="col-sm-offset-4 note"><b>{{ __('Chú ý') }}</b> : <i>{{ __('Nếu bạn không thay đổi mật khẩu thì không cần phải nhập vào') }}</i></p>
    </div>
    <div class="clear mt30"></div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/add-select2.js') }}"></script>
@endsection
