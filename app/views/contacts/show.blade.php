@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Contact</h1>

<p>{{ link_to_route('contacts.index', 'Return to All contacts', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Id_client</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $contact->nom }}}</td>
					<td>{{{ $contact->prenom }}}</td>
					<td>{{{ $contact->adresse }}}</td>
					<td>{{{ $contact->id_client }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('contacts.destroy', $contact->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('contacts.edit', 'Edit', array($contact->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
