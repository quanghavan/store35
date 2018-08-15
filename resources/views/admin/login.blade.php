@include('admin.header')
<body class="nobg loginPage">
<!-- Main content wrapper -->
<div class="loginWrapper">
    <div class="widget" id="admin_login">
        <div class="title"><img src="{{ asset('source/bower_components/library/backend/admin/images/icons/dark/lock.png') }}" alt="" class="titleIcon" />
            <h6>{{ trans('common.button.login') }}</h6>
        </div>
         {!! Form::open(['method' => 'post', 'class' => 'form']) !!}
            <fieldset>
                <div class="formRow">
                    {!! Form::label('email', 'Email:') !!}
                    <div class="loginInput">
                        {!! Form::email('email', old('email'), ['required']) !!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    {!! Form::label('password', 'Mật khẩu:') !!}
                    <div class="loginInput">
                        {!! Form::password('password', ['required']) !!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="loginControl">
                    {{ Form::submit(trans('common.button.login'), ['class' => 'dredB logMeIn']) }}
                    <div class="clear"></div>
                </div>
            </fieldset>
        {!! Form::close() !!}
    </div>
    @include('admin.message')
</div>
</body>
</html>
