@extends('site.layout')
	@section('content')
		<section class="main-container col1-layout">
    	<div class="main container">
    	@include('site.message')
      <div class="account-login">
        <div class="page-title">
          <h2>{{ __('Regester Account') }}</h2>
        </div>
        {!! Form::open(['route' => 'site.customer.store', 'method' => 'post', 'class' => 'form']) !!}
        <fieldset>
          <div class="registered-users">
            <div class="content">
              <ul class="form-list">
                <li>
                  <label for="email">{{ __('Tên khách hàng') }}<span class="required">*</span></label>
                  {!! Form::text('name', old('name'), ['required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="email">{{ __('Email') }}<span class="required">*</span></label>
                  {!! Form::email('email', old('email'), ['required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="email">{{ __('Số điện thoại') }}<span class="required">*</span></label>
                  {!! Form::text('phone', old('phone'), ['required', 'autocomplete' => 'off', 'class' => 'input-text required-entry']) !!}
                </li>
                 <li style="margin: 20px 20px 20px 0">
                  <label style="margin-right: 20px" for="email">{{ __('Địa chỉ') }}<span class="required">*</span></label>
                   {!! Form::select('address_id', $addresses, null, ['class' => 'address']) !!}
                </li>
               	 <li>
                  <label for="pass">{{ __('Mật khẩu') }} <span class="required">*</span></label>
                  {!! Form::password('password', ['required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="pass">{{ __('Nhập lại mật khẩu')}}<span class="required">*</span></label>
                  {!! Form::password('re_password', ['required', 'class' => 'input-text required-entry']) !!}
                </li>
              </ul>
              <p class="required">{{ __('* Required Fields') }}</p>
              <div class="buttons-set">
              	{{ Form::submit('Login', ['class' => 'button login']) }}
                <a class="forgot-word" href="{{ route('site.customer.login') }}">{{ __("You havent account ?") }}</a> </div>
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