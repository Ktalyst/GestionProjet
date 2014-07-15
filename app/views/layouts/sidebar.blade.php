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
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Catalogues</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ URL::route('catalogues.index') }}"><i class="fa fa-angle-double-right"></i> List catalog</a></li>
                <li><a href="{{ URL::route('servicerequesttypes.create') }}"><i class="fa fa-angle-double-right"></i> Add service request type</a></li>
                <li><a href="{{ URL::route('servicerequestcomplexities.create') }}"><i class="fa fa-angle-double-right"></i> Add service request complexity</a></li>
                <li><a href="{{ URL::route('services.index') }}"><i class="fa fa-angle-double-right"></i> Edit services</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ URL::route('taches.index') }}">
                <i class=""></i> <span>Taches</span>
            </a>
        </li>
    </ul>
</section>
@stop