@extends('admin.layout')
@section('content')
    @include('admin.admin.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <h6>{{ __('Thông tin Admin') }}</h6>
            </div>
            @if(isset($admin) && count($admin)>0)
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable">
                <thead>
                <tr>
                    <td>{{ __('Mã số') }}</td>
                    <td>{{ __('Tên Admin') }}</td>
                    <td>{{ __('Email') }}</td>
                    <td>{{ __('Số điện thoại') }}</td>
                    <td>{{ __('Địa chỉ') }}</td>
                    <td>{{ __('Hành động') }}</td>
                </tr>
                </thead>
                <tbody class="list_item">
                @foreach($admin as $row)
                    <tr class='row_9'>
                        <td class="textC">{{ $row->id }}</td>
                        <td class="textC">{{ $row->name }}</td>
                        <td class="textC">{{ $row->email }}</td>
                        <td class="textC">{{ $row->phone }}</td>
                        <td class="textC">{{ $row->address->address }}</td>
                        <td class="option textC">
                            <a href="{{ route('admin.edit', ['id' => $row->id]) }}" title="Chỉnh sửa" class="tipS">
                                <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/edit.png') }}" />
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h5 class="eror">{{ __('Không có admin nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
