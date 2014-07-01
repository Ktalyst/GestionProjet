@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<h1>All Items</h1>

<p>{{ link_to_route('items.create', 'Add New Item', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($items->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Code</th>
				<th>DateRecu</th>
				<th>Montant</th>
				<th>Description</th>
				<th>Id_commande</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($items as $item)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no items
@endif

@stop
