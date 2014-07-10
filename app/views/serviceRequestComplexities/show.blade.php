@extends('layouts.scaffold')

@section('main')

<h1>Show ServiceRequestComplexity</h1>

<p>{{ link_to_route('serviceRequestComplexities.index', 'Return to All serviceRequestComplexities', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Code</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $serviceRequestComplexity->nom }}}</td>
					<td>{{{ $serviceRequestComplexity->code }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('serviceRequestComplexities.destroy', $serviceRequestComplexity->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('serviceRequestComplexities.edit', 'Edit', array($serviceRequestComplexity->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
