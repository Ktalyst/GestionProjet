<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('css/AdminLTE.css') }}
</head>
<body class="bg-black">
    <div class="form-box" id="login-box">
        <div class="header">Register New Membership</div>
        {{ Form::open(array('url' => 'auth/inscription', 'method' => 'POST')) }}
        <div class="body bg-gray">
            <div class="form-group  {{ $errors->has('username') ? 'error' : '' }}" >
                {{ Form::text('username', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Full Name')) }}
            </div>
            <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                {{ Form::text('email', '', $attributes = array('class' => 'form-control', 'placeholder' => 'E-mail' )) }}
            </div>
            <div class="form-group form-group {{ $errors->has('password') ? 'error' : '' }}">
                {{ Form::password('password', $attributes = array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            <div class="form-group">
                {{ Form::password('password', $attributes = array('class' => 'form-control', 'placeholder' => 'Retape password')) }}
            </div>
        </div>
        <div class="footer">                    
            {{ Form::submit('Sign me up', array('class' => 'btn bg-olive btn-block')) }}
            {{ link_to('auth/login', 'I already have a membership') }}
        </div>
        {{ Form::close() }}
    <div class="margin text-center">
        <span>Register using social networks</span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
    </div>
</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>