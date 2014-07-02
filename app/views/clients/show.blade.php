@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Client</h1>

<p>{{ link_to_route('clients.index', 'Return to All clients', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

    {{ HTML::bootpanel('Nom Client', $client->nom) }}
    {{ HTML::bootpanelmulti('Contacts', $contacts, 'nom') }}

<!--<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $client->nom }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table> -->

@stop
