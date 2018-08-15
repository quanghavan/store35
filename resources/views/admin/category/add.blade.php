@extends('admin.layout')
@section('content')
    @include('admin.category.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => 'category.store', 'method' => 'post', 'class' => 'form']) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Thêm mới danh mục') }}</h6>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên danh mục:') }}
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
                        <label class="formLeft" for="param_address">{{ __('Loại danh mục:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            {!! Form::select('parent_id', $type_category, null, ['required', 'placeholder' => 'Chọn một danh mục']) !!}
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
