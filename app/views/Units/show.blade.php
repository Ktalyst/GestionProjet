@extends('layouts.scaffold')

@section('main')

<h1>Show Unit</h1>

<p>{{ link_to_route('Units.index', 'Return to All Units', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
				<th>ServiceRequestType_id</th>
				<th>ServiceRequestComplexity_id</th>
				<th>Service_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Unit->nombre }}}</td>
					<td>{{{ $Unit->serviceRequestType_id }}}</td>
					<td>{{{ $Unit->serviceRequestComplexity_id }}}</td>
					<td>{{{ $Unit->service_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('Units.destroy', $Unit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('Units.edit', 'Edit', array($Unit->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
