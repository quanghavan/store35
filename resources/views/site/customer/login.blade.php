@extends('site.layout')
	@section('content')
		<section class="main-container col1-layout">
    	<div class="main container">
    	@include('site.message')
      <div class="account-login">
        <div class="page-title">
          <h2>{{ __('Login Account') }}</h2>
        </div>
        {!! Form::open(['route' => 'site.customer.login', 'method' => 'post', 'class' => 'form']) !!}
        <fieldset>
          <div class="registered-users">
            <div class="content">
              <ul class="form-list">
                <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  {!! Form::email('email', old('email'), ['required', 'class' => 'input-text required-entry']) !!}
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  {!! Form::password('password', ['required', 'class' => 'input-text required-entry']) !!}
                </li>
              </ul>
              <p class="required">{{ __('* Required Fields') }}</p>
              <div class="buttons-set">
              	{{ Form::submit('Login', ['class' => 'button login']) }}
                <a class="forgot-word" href="{{ route('site.customer.create') }}">{{ __("You haven't account ?") }}</a> </div>
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