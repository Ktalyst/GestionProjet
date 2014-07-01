@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>All Servicerequests</h1>

<p>{{ link_to_route('servicerequests.create', 'Add New Servicerequest', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($servicerequests->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id_item</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($servicerequests as $servicerequest)
				<tr>
					<td>{{{ $servicerequest->id_item }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servicerequests.destroy', $servicerequest->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('servicerequests.edit', 'Edit', array($servicerequest->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no servicerequests
@endif

@stop
