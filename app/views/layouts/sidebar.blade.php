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
                <i class="glyphicon glyphicon-user"></i> <span>Customers</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('contrats.index') }}">
                <i class="glyphicon glyphicon-file"></i> <span>Contracts</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('commandes.index') }}">
                <i class="glyphicon glyphicon-barcode"></i> <span>Orders</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::route('catalogues.index') }}">
                <i class="fa fa-book"></i> <span>Catalogues</span>
            </a>
        </li>
    </ul>
</section>
@stop