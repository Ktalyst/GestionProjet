@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')
	@foreach ($lignes as $client)
		<tr>
			<td>{{ $client->id }}</td>
			<td class="text-primary"><strong>{{ $client->titre }}</strong></td>
			<td>{{ link_to_route('clients.show', 'Voir', array($client->id), array('class' => 'btn btn-success btn-block')) }}</td>
			<td>{{ link_to_route('clients.edit', 'Modifier', array($client->id), array('class' => 'btn btn-warning btn-block')) }}</td>
			<td>
				{{ Form::open(array('method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
					{{ Form::submit('Supprimer', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce livre ?\')')) }}
        {{ Form::close() }}
      </td>
		</tr>
	@endforeach
@stop