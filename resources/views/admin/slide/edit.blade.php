@extends('admin.layout')
@section('content')
    @include('admin.slide.head')
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => ['slide.update', $slide->id], 'method' => 'PUT', 'class' => 'form', 'files' => true]) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Cập nhật Slide') }}</h6>
                    </div>
                     <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tên slide:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('name', $slide->name, ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                        <div class="formRight">
                            <div class="left">
                                <div>
                                    <img src="{{ url(config('app.slideUrl')) }}/{{ $slide->image_link }}" width="350px">
                                </div>
                                <div class="clear mt15"></div>
                                <div>
                                    {!! Form::file('avatar', ['required', 'accept' => 'image/*']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit">
                        {{ Form::submit(__('Cập nhật'), ['class' => 'dredB']) }}
                        {{ Form::reset(__('Hủy bỏ'), ['class' => 'basic']) }}
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        {!! Form::close() !!}
    </div>
    <div class="clear mt30"></div>
@endsection