@extends('layouts.scaffold')

@section('main')

<h1>Show Service</h1>

<p>{{ link_to_route('services.index', 'Return to All services', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Code</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $service->nom }}}</td>
					<td>{{{ $service->code }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('services.destroy', $service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('services.edit', 'Edit', array($service->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
