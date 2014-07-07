<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/AdminLTE.css') }}
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            {{ Form::open(array('url' => 'auth/login', 'method' => 'POST')) }}
                <div class="body bg-gray">
                    <div class="form-group">
                        {{ Form::text('username', '', $attributes = array('class' => 'form-control', 'placeholder' => 'username')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', $attributes = array('class' => 'form-control', 'placeholder' => 'password')) }}
                    </div>          
                    <div class="form-group">
                        <input name="remember_me" type="checkbox" id="remember_me">Remember me
                    </div>
                </div>
                <div class="footer">                      
                    {{ Form::submit('Sign me in', array('class' => 'btn bg-olive btn-block')) }}                                         
                    
                    <p>{{ link_to('remind/remind', 'I forgot my password') }}</p>
                    
                    {{ link_to('auth/inscription', 'Register a new membership') }}
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js') }}
  

    </body>
</html>