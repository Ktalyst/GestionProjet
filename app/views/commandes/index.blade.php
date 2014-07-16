@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Commandes
		<small>List</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 connectedSortable">

		</div>
	</div>

	<div class="row">
		<!-- Left col -->
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All commandes</div>
				</div>
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Code</th>
								<th>Contrat</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($commandes as $commande)
							<tr>
								<td>{{{ $commande->code }}}</td>
								<td>{{{ $commande->contrat->nom }}}</td>
								<td>
									{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('commandes.destroy', $commande->id))) }}
									{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
									{{ Form::close() }}
									{{ link_to_route('commandes.edit', 'Edit', array($commande->id), array('class' => 'btn btn-warning')) }}
									{{ link_to_route('commandes.show', 'Show', array($commande->id), array('class' => 'btn btn-info')) }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</section>
@stop
