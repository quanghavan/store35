@extends('site.layout')
    @section('content')
        <section class="main-container col1-layout">
        <div class="main container">
        @include('site.message')
        <div class="account-login">
        <div class="page-title">
          <h2>{{ __('Regester Account') }}</h2>
        </div>
        {!! Form::open(['route' => ['site.customer.update', $customer->id], 'method' => 'PUT', 'class' => 'form']) !!}
        <fieldset>
          <div class="registered-users">
            <div class="content">
              <ul class="form-list">
                <li>
                  <label for="email">{{ __('Tên khách hàng') }}<span class="required">*</span></label>
                  {!! Form::text('name', $customer->name, ['required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="email">{{ __('Email') }}</label>
                  {!! Form::email('email', $customer->email, ['disabled', 'required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="email">{{ __('Số điện thoại') }}<span class="required">*</span></label>
                  {!! Form::text('phone', $customer->phone, ['required', 'autocomplete' => 'off', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="email">{{ __('Địa chỉ') }}</label><br>
                   {!! Form::select('address_id', $addresses, "$customer->address_id", ['class' => 'address selectpicker select-custom']) !!}
                   <br><br>
                </li>
                 <li>
                  <label for="pass">{{ __('Mật khẩu') }}</label>
                  {!! Form::password('password', ['class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="pass">{{ __('Nhập lại mật khẩu')}}</label>
                  {!! Form::password('password', ['class' => 'input-text required-entry']) !!}
                </li>
              </ul>
              <p class="required">{{ __('* Required Fields') }}</p>
              <div class="buttons-set">
                {{ Form::submit('Update', ['class' => 'button login']) }}
                </div>
                </div>
            </div>
          </div>
        </fieldset>
        {!! Form::close() !!}
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
    </section>
    @endsection