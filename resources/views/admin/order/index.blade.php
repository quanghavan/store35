@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>{{ __('Đơn đặt hàng') }}</h5>
                <span>{{ __('Quản lý đơn đặt hàng') }}</span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    {{ __('Danh sách đơn đặt hàng') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{ count($order) }}</b></div>
            </div>
            @if(isset($order) && count($order) > 0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Tên khách hàng') }}</td>
                        <td>{{ __('Số điện thoại') }}</td>
                        <td>{{ __('Phương thức thanh toán') }}</td>
                        <td>{{ __('Đơn giá') }}</td>
                        <td>{{ __('Trạng thái') }}</td>
                        <td>{{ __('Ngày tạo') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($order as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $row->user->name }}</td>
                            <td class="textC">{{ $row->user->phone }}</td>
                            <td class="textC">{{ $row->payment == 1 ? __('Tiền mặt') : __('Chuyển khoản') }}</td>
                            <td class="textR red">{{ number_format($row->amount) }} đ</td>
                            @if($row->status == 1) 
                                <td class="status textC">
                                    <span class="completed">
                                        {{ __('Thành công') }}
                                    </span>
                                </td>
                            @else
                                <td class="status textC">
                                    <span class="pending">
                                        {{ __('Đang chờ') }}
                                    </span>
                                </td>
                            @endif
                            <td class="textC">{{ $row->created_at }}</td>
                            <td class="textC">
                                <a href="{{ route('order.detail', ['id' => $row->id]) }}" title="xem chi tiết đơn hàng" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/view.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list_action itemActions">
                    <a href="{{ route('order.delete')}}" id="delMul" class="button blueB">
                        <span>{{ __('Xóa') }}</span>
                    </a>
                </div>
            @else
                <h5 class="eror">{{ __('Không có đơn đặt hàng nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
