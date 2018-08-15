@extends('admin.layout')
@section('content')
    @include('admin.contact.head')
    <!-- Message -->
    <!-- Main content wrapper -->
    <div class="wrapper" id="main_product">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    {{ __('Danh sách liên hệ') }}
                </h6>
                <div class="num f12">{{ trans('common.title.sl') }} <b id="total">{{ count($contact) }}</b></div>
            </div>
            @if(isset($contact) && count($contact)>0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/tableArrows.png') }}" /></td>
                        <td>{{ __('Mã số') }}</td>
                        <td>{{ __('Tên') }}</td>
                        <td>{{ __('Email') }}</td>
                        <td>{{ __('Tiêu đề') }}</td>
                        <td>{{ __('Nội dung') }}</td>
                        <td>{{ __('Ngày tạo') }}</td>
                        <td>{{ __('Hành động') }}</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($contact as $row)
                        <tr class='row_{{ $row->id }}'>
                            <td>{!! Form::checkbox('id[]', $row->id, false, ['class' => 'check-del']) !!}</td>
                            <td class="textC">{{ $row->id }}</td>
                            <td class="textC">{{ $row->user_name }}</td>
                            <td class="textC">{{ $row->email }}</td>
                            <td class="textC">{{ $row->title }}</td>
                            <td class="textC">{{ $row->content }}</td>
                            <td class="textC">{{ $row->created_at }}</td>
                            <td class="option textC">
                                <a href="{{ route('contact.delete') }}" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                    <img src="{{ asset('source/bower_components/library/backend/admin/images/icons/color/delete.png') }}" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @if(count($contact)>0)
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="{{ route('contact.delMulCon')}}" id="delMul" class="button blueB del">
                                <span>{{ __('Xóa hết') }}</span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endif
            @else
                <h5 class="eror">{{ __('Không có liên hệ nào') }}</h5>
            @endif
        </div>
    </div>
    <div class="clear mt30"></div>
@endsection
