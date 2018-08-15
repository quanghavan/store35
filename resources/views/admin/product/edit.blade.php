@extends('admin.layout')
@section('content')
    @include('admin.product.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper">
        <!-- Form -->
        {!! Form::open(['route' => ['product.update', 'product' => $product->id], 'method' => 'put', 'class' => 'form', 'files' => true, 'multiple']) !!}
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/add.png') }}" class="titleIcon" />
                        <h6>{{ __('Cập nhật sản phẩm') }}</h6>
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
                                {!! Form::text('name', $product->name, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::textarea('descript', $product->descript, ['required', 'autocomplete' => 'off', 'id' => 'content']) !!}
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
                                {!! Form::text('price', $product->price, ['required', 'autocomplete' => 'off', 'class' => 'format_number input_price']) !!}
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
                            {!! Form::text('discount', $product->discount, ['autocomplete' => 'off', 'class' => 'format_number input_price']) !!}
                            <img class='tipS img-discount' title='Số tiền giảm giá' src="{{ asset('source/bower_components/library/backend/admin/crown/images/icons/notifications/information.png') }}"/>
                            </span>
                        </div>
                    <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label for="param_cat" class="formLeft">{{ __('Danh mục:') }}<span class="req">*</span></label>
                        <div class="formRight">
                            {!! Form::select('category_id', $list, $product->category->id) !!}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">{{ __('Hình ảnh:') }}
                            <span class="req">*</span>
                        </label>
                        <div class="formRight">
                            <img src="{{ url(config('app.imageUrl')) }}/{{ $product->avatar }}" width="350">
                            <div class="clear mt15"></div>
                            <div class="left">
                                {!! Form::file('avatar', ['accept' => 'image/*']) !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft">{{ __('Ảnh kèm theo:') }}</label>
                        @if(count($product->images)>0)
                            <div class="gallery formRight">
                                <ul>
                                    @foreach($product->images as $row)
                                    <li id={{ $row->id }}>
                                        <a class="lightbox" title="product {{ $row->id }}" href="" >
                                            <img src="{{ url(config('app.imageUrl')) }}/{{ $row->image_link }}" width='150px' />
                                        </a>
                                        <div class="actions">
                                            <a href="{{ route('product.edit', ['product' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                                <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                                            </a>
                                            <a href="{{ route('product.delete', ['id' => $row->id]) }}" value="{{$row->id}}" title="Xóa" class="tipS">
                                                <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="clear mt20"></div>
                            </div>
                        @endif
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
                                {!! Form::text('screen', $product->configuration->screen, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('os', $product->configuration->os, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('front_camera', $product->configuration->front_camera, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('back_camera', $product->configuration->back_camera, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('ram', $product->configuration->ram, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('memory', $product->configuration->memory, ['required', 'autocomplete' => 'off']) !!}
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
                                {!! Form::text('battery_capacity', $product->configuration->battery_capacity, ['required', 'autocomplete' => 'off']) !!}
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </div><!-- End tab_container-->
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
@section('script')
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/add-ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/tab.js') }}"></script>
@endsection