<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') }}
            {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css') }}
            {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</head>

  <body>

    <header class="navbar navbar-fixed-top">
      <div id="nav" class="navbar-inner">
        <div class="container">
          <button class="btn btn-navbar collapsed" data-target=".nav-collapse" data-toggle="collapse" type="button">
            <i class="icon-align-justify"></i>
          </button>
          <a class="brand" href="#">Administration</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('admin') }}">
                  <i class="icon-home"></i>
                  Accueil
                </a>
              </li>
              <li>
                <a href="{{ url('users') }}">
                  <i class="icon-home"></i>
                  User
                </a>
              </li>
              <li class="divider-vertical"></li>
              
            <li class="divider-vertical"></li>
              <li>
                <a href="{{ url('auth/logout') }}">
                  <i class="icon-share-alt"></i>
                  Deconnexion
                </a>
              </li>     
              <li class="divider-vertical"></li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div class="container">

      <div class="row">


  		@yield('content')
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2013</p>
      </footer>

    </div>

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    
  </body>
</html>