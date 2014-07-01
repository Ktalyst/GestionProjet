@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Servicerequest</h1>

<p>{{ link_to_route('servicerequests.index', 'Return to All servicerequests', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Id_item</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $servicerequest->id_item }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servicerequests.destroy', $servicerequest->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('servicerequests.edit', 'Edit', array($servicerequest->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
