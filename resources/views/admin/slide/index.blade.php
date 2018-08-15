@extends('admin.layout')
@section('content')
    @include('admin.slide.head')
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/dialog.png') }}" class="titleIcon" />
                <h6>{{ __('Danh sách Slide') }}</h6>
                <div class="num f12">Tổng số: <b>{{count($slide)}}</b></div>
            </div>
            @if(count($slide)>0)
                <div class="gallery">
                    <ul>
                        @foreach($slide as $row)
                        <li id={{ $row->id }}>
                            <a class="lightbox" title="Slide {{ $row->id }}" href="" >
                                <img src="{{ url(config('app.slideUrl')) }}/{{ $row->image_link }}" width='280px' />
                            </a>
                            <div class="actions">
                                <a href="{{ route('slide.edit', ['slide' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                                </a>
                                <a href="{{ route('slide.delete', ['id' => $row->id]) }}" value="{{$row->id}}" title="Xóa" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clear mt20"></div>
                </div>
            @else
                <h5 class="eror">{{ __('Không có slide nào') }}</h5>
            @endif
        </div>
    </div>
<div class="clear mt30"></div>
@endsection