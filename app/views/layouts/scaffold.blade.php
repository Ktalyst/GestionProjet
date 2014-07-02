<!doctype html>
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
    <div class="container">
        <header class="jumbotron" id="entete">
            <h1>Gestion de projet</h1>
        </header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Menu</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @yield('navigation')
                </ul>
                {{ Form::open(array('url' => 'find', 'method' => 'POST', 'class' => 'navbar-form navbar-left pull-right')) }}
                {{ Form::text('find', '', array('class' => 'form-group form-control', 'placeholder' => 'Recherche')) }}
                {{ Form::close() }}
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
                @endif

                @yield('main')
            </div>
        </div>
        <footer>
            <em>© 2014</em>
        </footer>
    </div>
@yield('scripts')
</body>
</html>