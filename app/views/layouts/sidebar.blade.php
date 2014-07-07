@section('sidebar') 
<section class="sidebar">

    <ul class="sidebar-menu">
        <li class="active">
            <a href="{{ URL::route('accueil') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('clients.index') }}">
                <i class="glyphicon glyphicon-user"></i> <span>Clients</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('contrats.index') }}">
                <i class="glyphicon glyphicon-file"></i> <span>Contrats</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('commandes.index') }}">
                <i class="glyphicon glyphicon-barcode"></i> <span>Commandes</span>
            </a>
        </li>
    </ul>
</section>
@stop