@extends('admin.layout')
@section('content')
    @include('admin.news.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => 'news.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Thêm mới tin tức') }}</h6>
                    </div>
                    <div class="formRow">   
                        <label class="formLeft" for="param_name">{{ __('Tiêu đề:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="oneTwo">
                                {!! Form::text('title', old('title'), ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_email">{{ __('Nội dung:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <span class="Two">
                                {!! Form::textarea('content', old('content'), ['required', 'autocomplete' => 'off', 'id' => 'content']) !!}
                            </span>
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
@endsection