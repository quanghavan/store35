@extends('admin.layout')
@section('content')
    @include('admin.customer.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    {{ trans('common.title.dskh') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{count($user)}}</b></div>
            </div>
            @if(isset($user) && count($user) > 0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Tên khách hàng') }}</td>
                        <td>{{ __('Email') }}</td>
                        <td>{{ __('Số điện thoại') }}</td>
                        <td>{{ __('Địa chỉ') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($user as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $row->name }}</td>
                            <td class="textC">{{ $row->email }}</td>
                            <td class="textC">{{ $row->phone }}</td>
                            <td class="textC">{{ $row->address->address }}</td>
                            <td class="option textC">
                                <a href="{{ route('customer.edit', ['customer' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                                </a>
                                <a href="{{ route('customer.delete') }}" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="list_action itemActions">
                    <a href="{{ route('customer.delMulCus')}}" id="delMul" class="button blueB">
                        <span>{{ __('Xóa') }}</span>
                    </a>
                </div>
            @else
                <h5 class="eror">{{ trans('common.error.kkh') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
