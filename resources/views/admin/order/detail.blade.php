@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>{{ __('Chi tiết đơn đặt hàng') }}</h5>
            </div>
            <div class="clear"></div>
            <h6>{{ __('Thông tin khách hàng') }}</h6>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable">  
                <tbody class="list_item">
                    <tr>
                        <td>{{ __('Họ và tên') }}</td>
                        <td class="textC">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Email') }}</td>
                        <td class="textC">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Số điện thoại') }}</td>
                        <td class="textC">{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Địa chỉ') }}</td>
                        <td class="textC">{{ $user->address->address }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Địa chỉ giao hàng') }}</td>
                        <td class="textC">{{ $order->address->address }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Tin nhắn') }}</td>
                        <td class="textC">{{ $order->note }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Phương thức thanh toán') }}</td>
                        <td class="textC">{{ $order->payment == 1 ? __('Tiền mặt') : __('Chuyển khoản')  }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Ngày đặt hàng') }}</td>
                        <td class="textC">{{ $order->created_at }}</td>
                    </tr>
                </tbody>
            </table>
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
                    {{ __('Chi tiết đơn hàng') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{ count($orderDetails) }}</b></div>
            </div>
            @if(isset($orderDetails) && count($orderDetails) > 0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã đơn hàng') }}</td>  
                        <td>{{ __('Mã sản phẩm') }}</td>
                        <td>{{ __('Tên sản phẩm') }}</td>
                        <td>{{ __('Đơn giá') }}</td>
                        <td>{{ __('Số lượng') }}</td>
                        <td>{{ __('Tổng tiền') }}</td>
                        <td>{{ __('Thời gian') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @php $i = 0; @endphp
                    @foreach($orderDetails as $row)
                       <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $product[$i]->id }}</td>
                            <td class="textC">{{ $product[$i]->name }}</td>
                            <td class="textR red">{{ number_format($product[$i]->price - $product[$i]->discount) }} đ</td>
                            <td class="textC">{{ $row->quantity }}</td>
                            <td class="textR red">{{ number_format($row->quantity * ($product[$i]->price - $product[$i]->discount)) }} đ</td>
                            <td class="textC">{{ $row->created_at }}</td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                    </tbody>
                </table>
                <div class="list_action itemActions">
                    <a href="{{ route('order.deleteOrderDetail') }}" id="delMul" class="button dredB orderDetail" style="margin-right: 25px">
                        <span>{{ __('Xóa') }}</span>
                    </a>
                    @if($order->status == 0)
                        {!! Form::open(['route' => 'order.confirm_order', 'method' => 'post', 'class' => 'confirm-order']) !!}
                        {!! Form::hidden('id_order', $order->id) !!}
                        {!! Form::close() !!}
                        <a href="#" class="button blueB order-submit" style="margin-right: 25px">
                            <span>{{ __('Xác nhận đơn hàng') }}</span>
                        </a>
                    @endif
                    <a href="{{ route('order.index') }}" class="button basic">
                        <span>{{ __('Quay lại') }}</span>
                    </a>
                </div>   

            @else
                <h5 class="eror">{{ __('Không có đơn đặt hàng nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
