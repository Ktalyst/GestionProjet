@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>All Contrats</h1>

<p>{{ link_to_route('contrats.create', 'Add New Contrat', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($contrats->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Code</th>
				<th>Id_contact</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($contrats as $contrat)
				<tr>
					<td>{{{ $contrat->nom }}}</td>
					<td>{{{ $contrat->code }}}</td>
					<td>{{{ $contrat->id_contact }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('contrats.destroy', $contrat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('contrats.edit', 'Edit', array($contrat->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no contrats
@endif

@stop
