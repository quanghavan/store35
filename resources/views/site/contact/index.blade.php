@extends('site.layout')
	@section('content')
	<div class="breadcrumbs">
    <div class="container">
      	<div class="row">
	        <div class="col-xs-12">
	          	<ul>
		            <li class="home"> <a title="Go to Home Page" href="index.html">{{ __('Trang chủ') }}</a> <span>/</span></li>
		            <li> <strong>{{ __('Liên hệ với chúng tôi') }}</strong> </li>
	          	</ul>
	        </div>
      	</div>
    </div>
  	</div>
  
  <!-- main-container -->
  	<div class="main-container col2-right-layout">
    <div class="container">
      <div class="row">
        <section class="col-sm-9">
          <div class="col-main">
            <div class="static-inner">
            	@include('site.message')
              	<div class="page-title">
                	<h2>{{ __('Liên hệ với chúng tôi') }}</h2>
              	</div>
              	<div class="static-contain">
	              	{!! Form::open(['route' => 'site.contact.create', 'method' => 'post', 'class' => 'form']) !!}
		                <fieldset class="group-select">
		                  	<ul>
		                    <li id="billing-new-address-form">
		                      <fieldset>
		                        <ul>
		                          <li>
		                            <div class="customer-name">
		                              <div class="input-box name-firstname">
		                                <label for="billing:firstname">{{ __('Tên') }}<span class="required">*</span></label>
		                                <br>
		                                {!! Form::text('user_name', old('user_name'), ['required', 'class' => 'input-text required-entry']) !!}
		                              </div>
		                              <div class="input-box name-lastname">
		                                <label for="billing:lastname">{{ __('Email') }}<span class="required">*</span></label>
		                                <br>
		                                {!! Form::email('email', old('email'), ['required', 'class' => 'input-text required-entry']) !!}
		                              </div>
		                            </div>
		                          </li>
		                          <li>
		                            <label>{{ __('Tiêu đề') }} <span class="required">*</span></label>
		                            <br>
		                            {!! Form::text('title', old('title'), ['required', 'class' => 'input-text required-entry']) !!}
		                          </li>
		                          <li class="">
		                            <label for="comment">{{ __('Nội dung') }}<em class="required">*</em></label>
		                            <br>
		                            <div class="">
		                            {!! Form::textarea('content', old('content'), ['required', 'class' => 'input-text required-entry', 'cols' => 5, 'rows' => 5]) !!}
		                            </div>
		                          </li>
		                        </ul>
		                      </fieldset>
		                    </li>
		                    <li>
		                      	<p class="require"><em class="required">* </em>{{ __('Các trường yêu cầu') }}</p>
		                      	<div class="buttons-set">
		                      		{{ Form::submit(__('Gửi'), ['class' => 'button submit']) }}
		                      	</div>
		                    </li>
		                  	</ul>
		                </fieldset>
	                {!! Form::close() !!}
              	</div>
            </div>
          </div>
        </section>
        <aside class="col-right sidebar col-sm-3 wow">
          <div class="block block-company">
            <div class="block-title">Company </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item odd"><a href="#"><i class="fa fa-angle-right"></i> About Us</a></li>
                <li class="item even"><a href="#"><i class="fa fa-angle-right"></i> Sitemap</a></li>
                <li class="item  odd"><a href="#"><i class="fa fa-angle-right"></i> Terms of Service</a></li>
                <li class="item even"><a href="#"><i class="fa fa-angle-right"></i> Search Terms</a></li>
                <li class="item last"><strong><i class="fa fa-angle-right"></i> Contact Us</strong></li>
              </ol>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
	@endsection