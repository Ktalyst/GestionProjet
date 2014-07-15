@extends('layouts.scaffold')

@section('main')

<h1>Show Tach</h1>

<p>{{ link_to_route('Taches.index', 'Return to All Taches', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Pourcentage</th>
				<th>Tache_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Tache->nom }}}</td>
					<td>{{{ $Tache->pourcentage }}}</td>
					<td>{{{ $Tache->tache_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('Taches.destroy', $Tache->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('Taches.edit', 'Edit', array($Tache->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
