<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Remind</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/AdminLTE.css') }}
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">New password</div>
      		{{ Form::open(array('url' => 'remind/remind', 'method' => 'POST')) }}
            <div class="body bg-gray">
                <div class="form-group  {{ $errors->has('email') ? 'error' : '' }}">
                    {{ Form::text('email', '', $attributes = array('class' => 'form-control', 'placeholder' => 'E-mail')) }}
                </div> 		
            </div>
      		<div class="footer"> 
              	{{ Form::submit('Send', array('class' => 'btn bg-olive btn-block')) }}
          	</div>
			{{ Form::close()}}
		</div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js') }}

    </body>
</html>