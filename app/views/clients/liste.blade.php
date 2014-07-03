@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')
<h1>All Clients</h1>

<p>{{ link_to_route('clients.create', 'Add New Client', null, array('class' => 'btn btn-lg btn-success')) }}</p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($lignes as $client)
				<tr>
					<td>{{{ $client->nom }}}</td>
					@foreach ($client->contacts as $contact)
					<td>{{ $contact->nom }}</td>
					@endforeach
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop