@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<h1>Show Catalogue</h1>

<p>{{ link_to_route('catalogues.index', 'Return to All Catalogues', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
				<th>Code</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Catalogue->nom }}}</td>
					<td>{{{ $Catalogue->code }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('catalogues.destroy', $Catalogue->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('catalogues.edit', 'Edit', array($Catalogue->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
