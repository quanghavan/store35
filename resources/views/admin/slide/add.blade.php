@extends('admin.layout')
@section('content')
    @include('admin.slide.head')
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => 'slide.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Thêm mới Slide') }}</h6>
                    </div>
                     <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên slide:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneThree">
                                {!! Form::text('name', old('name'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                        <div class="formRight">
                            <div class="left">
                                {!! Form::file('avatar', ['required', 'accept' => 'image/*']) !!}
                            </div>
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
