@section('navigation')
    <li><a href="{{URL::route('accueil')}}" class="actif">Accueil</a></li>
    <li><a href="{{URL::route('clients.index')}}">Client</a></li>
    <li><a href="{{URL::route('contacts.index')}}">Contact</a></li>
    <li><a href="{{URL::route('contrats.index')}}">Contrat</a></li>
    <li><a href="{{URL::route('commandes.index')}}">Commande</a></li>
    <li><a href="{{URL::route('items.index')}}">Item</a></li>
    <li><a href="{{URL::route('servicerequests.index')}}">Service Request</a></li>
@stop