@extends('layouts.scaffold')

@section('main')

<h1>All Services</h1>

<p>{{ link_to_route('services.create', 'Add New Service', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($services->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Code</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($services as $service)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no services
@endif

@stop
