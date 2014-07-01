@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>All Contacts</h1>

<p>{{ link_to_route('contacts.create', 'Add New Contact', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($contacts->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Id_client</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($contacts as $contact)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no contacts
@endif

@stop
