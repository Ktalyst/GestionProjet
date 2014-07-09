@extends('layouts.scaffold')

@section('main')

<h1>All ServiceRequestTypes</h1>

<p>{{ link_to_route('servicerequests.create', 'Add New ServiceRequestType', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($serviceRequestTypes->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Code</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($serviceRequestTypes as $serviceRequestType)
				<tr>
					<td>{{{ $serviceRequestType->nom }}}</td>
					<td>{{{ $serviceRequestType->code }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servicerequests.destroy', $serviceRequestType->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('servicerequests.edit', 'Edit', array($serviceRequestType->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no serviceRequestTypes
@endif

@stop
