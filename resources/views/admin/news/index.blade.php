@extends('admin.layout')
@section('content')
    @include('admin.news.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    {{ __('Danh sách tin tức') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{count($news)}}</b></div>
            </div>
            @if(isset($news) && count($news)>0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Tiêu đề') }}</td>
                        <td>{{ __('Nội dung') }}</td>
                        <td>{{ __('Hình ảnh') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($news as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->title }}</td>
                            <td class="textC">{!! $row->content !!}</td>
                            <td class="textC">
                                <div class="image_thumb">
                                    <img src="{{ url(config('app.newsUrl')) }}/{{ $row->avatar }}" height="50">
                                </div>
                                
                            </td>
                            <td class="option textC">
                                <a href="{{ route('news.edit', ['news' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                                </a>
                                <a href="{{ route('news.delete', ['id' => $row->id]) }}" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($news)>0)
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="{{ route('news.delMulNews')}}" id="delMul" class="button blueB del">
                                    <span>Xóa hết</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @else
                <h5 class="eror">{{ __('Không có tin tức nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
