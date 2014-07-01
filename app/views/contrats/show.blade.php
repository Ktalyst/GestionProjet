@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Contrat</h1>

<p>{{ link_to_route('contrats.index', 'Return to All contrats', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Code</th>
				<th>Id_contact</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
