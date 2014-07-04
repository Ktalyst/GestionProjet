@section('navigation')
    <li>{{ link_to_route('accueil', 'Accueil', null) }}</li>
    <li>{{ link_to_route('clients.index', 'Client', null) }}</li>
    <li>{{ link_to_route('contacts.index', 'Contact', null) }}</li>
    <li>{{ link_to_route('contrats.index', 'Contrat', null) }}</li>
    <li>{{ link_to_route('commandes.index', 'Commande', null) }}</li>
    <li>{{ link_to_route('items.index', 'Item', null) }}</li>
    <li>{{ link_to_route('servicerequests.index', 'Service Request', null) }}</li>
 @if (Auth::check())
    <li>{{ link_to('auth/logout', 'Deconnexion') }}</li>
  @else
    <li>{{ link_to('auth/login', 'Connexion') }}</li>
  @endif
@stop