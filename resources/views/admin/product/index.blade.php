@extends('admin.layout')
@section('content')
    @include('admin.product.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    {{ __('Danh sách sản phẩm') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{count($product)}}</b></div>
            </div>
            @if(isset($product) && count($product)>0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Tên sản phẩm') }}</td>
                        <td>{{ __('Ảnh') }}</td>
                        <td>{{ __('Danh mục') }}</td>
                        <td>{{ __('Giá') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($product as $row)
                        <tr class="row_{{ $row->id }}">
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">
                                <div>
                                    <a href="" class="tipS" title="chi tiết" target="_blank">
                                        <b>{{ $row->name }}</b>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="image_thumb">
                                    <img src="{{ url(config('app.imageUrl')) }}/{{ $row->avatar }}" height="50">
                                </div>
                            </td>
                            <td class="textC">{{ $row->category->name }}</td>
                            <td class="textC">
                                {{ number_format($row->price - $row->discount) }} đ
                                @if($row->discount > 0)
                                    <p style='text-decoration:line-through'>{{ number_format($row->price) }} đ</p>
                                @endif
                            </td>
                            <td class="option textC">
                                <a href="{{ route('product.edit', ['product' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                                </a>
                                <a href="{{ route('product.delete', ['id' => $row->id]) }}" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($product)>0)
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="{{ route('product.delMulProd')}}" id="delMul" class="button blueB del">
                                    <span>{{ __('Xóa') }}</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @else
                <h5 class="eror">{{ __('Không có sản phẩm nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
