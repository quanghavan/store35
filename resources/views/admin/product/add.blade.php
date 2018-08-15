@extends('admin.layout')
@section('content')
    @include('admin.product.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => 'product.store', 'method' => 'post', 'class' => 'form', 'files' => true, 'multiple']) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Thêm mới sản phẩm') }}</h6>
                    </div>
                    <ul class="tabs">
                        <li class="activeTab"><a href="#tab1">{{ __('Thông tin chung') }}</a></li>
                        <li class=""><a href="#tab2">{{ __('Thông tin cấu hình') }}</a></li>
                    </ul>
                    <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên sản phẩm:') }}
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
                        <label class="formLeft" for="param_email">{{ __('Mô tả:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="Two">
                                {!! Form::textarea('descript', old('descript'), ['required', 'autocomplete' => 'off', 'id' => 'content']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_price">Giá :
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('price', old('price'), ['required', 'autocomplete' => 'off', 'class' => 'format_number input_price']) !!}
                                <img class='tipS img-price' title='Giá bán sử dụng để giao dịch' src="{{ asset('source/bower_components/library/backend/admin/crown/images/icons/notifications/information.png') }}"/>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- Price -->
                    <div class="formRow">
                        <label class="formLeft" for="param_discount">Giảm giá (VNĐ)
                            <span></span>:
                        </label>
                        <div class="formRight">
                            <span>
                            {!! Form::text('discount', old('discount'), ['autocomplete' => 'off', 'class' => 'format_number input_price']) !!}
                            <img class='tipS img-discount' title='Số tiền giảm giá' src="{{ asset('source/bower_components/library/backend/admin/crown/images/icons/notifications/information.png') }}"/>
                            </span>
                        </div>
                    <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label for="param_cat" class="formLeft">{{ __('Danh mục:') }}<span class="req">*</span></label>
                        <div class="formRight">
                            {!! Form::select('category_id', $list, null, ['required', 'placeholder' => 'Chọn một danh mục']) !!}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">{{ __('Hình ảnh:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <div class="left">
                                {!! Form::file('avatar', ['required', 'accept' => 'image/*']) !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">{{ __('Ảnh kèm theo:') }}</label>
                        <div class="formRight">
                            <div class="left">
                                {!! Form::file('image_id[]', ['multiple', 'accept' => 'image/*']) !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                    <div class="tab_content pd0" id="tab2">
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Màn hình:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('screen', old('screen'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Hệ điều hành:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('os', old('os'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Camera trước:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('front_camera', old('front_camera'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Camera sau:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('back_camera', old('back_camera'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Ram:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('ram', old('ram'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Bộ nhớ:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('memory', old('memory'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Dung lượng pin:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('battery_capacity', old('battery_capacity'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>

                    </div><!-- End tab_container-->
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
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/add-ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/tab.js') }}"></script>
@endsection