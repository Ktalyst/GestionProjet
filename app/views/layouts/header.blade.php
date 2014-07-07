@section('header')          
<a href="index.html" class="logo">
    STRIDE
</a>
<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
        <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>{{ Auth::user()->username }} <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue" style="height: 80px">
                        <p>
                            Hello, {{ Auth::user()->username }}

                        </p>
                    </li>
                    <li class="user-footer">
                        @if (Auth::user()->statut == 'admin')
                        <div class="pull-left">
                            <a href="{{ URL::route('admin') }}" class="btn btn-default btn-flat">Admin</a>
                        </div>
                        @endif
                        <div class="pull-right">
                            @if (Auth::check())
                            {{ link_to('auth/logout', 'Sign out', array('class' => 'btn btn-default btn-flat')) }}
                            @else
                            {{ link_to('auth/login', 'Connexion', array('class' => 'btn btn-default btn-flat')) }}
                            @endif
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@stop