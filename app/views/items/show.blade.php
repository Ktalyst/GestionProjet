@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>Show Item</h1>

<p>{{ link_to_route('items.index', 'Return to All items', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Code</th>
				<th>DateRecu</th>
				<th>Montant</th>
				<th>Description</th>
				<th>Id_commande</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $item->code }}}</td>
					<td>{{{ $item->dateRecu }}}</td>
					<td>{{{ $item->montant }}}</td>
					<td>{{{ $item->description }}}</td>
					<td>{{{ $item->id_commande }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('items.destroy', $item->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
