@extends('layouts.scaffold')

@section('main')

<h1>All ServiceRequestComplexities</h1>

<p>{{ link_to_route('servicerequestcomplexities.create', 'Add New ServiceRequestComplexity', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($serviceRequestComplexities->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Code</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($serviceRequestComplexities as $serviceRequestComplexity)
				<tr>
					<td>{{{ $serviceRequestComplexity->nom }}}</td>
					<td>{{{ $serviceRequestComplexity->code }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servicerequestcomplexities.destroy', $serviceRequestComplexity->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('servicerequestcomplexities.edit', 'Edit', array($serviceRequestComplexity->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no serviceRequestComplexities
@endif

@stop
