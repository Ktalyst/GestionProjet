@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Contrats
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Contrats</li>
	</ol>
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
					<div class="box-title">All contrats</div>
					<div class="pull-right box-tools">
						<div class="btn-group">
							<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="{{ URL::route('contrats.create') }}">Add new contrat</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="box-body table-responsive">
					@if ($contrats->count())
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
								<th>Contact</th>
								<th>Client</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($contrats as $contrat)
							<tr>
								<td>{{{ $contrat->nom }}}</td>
								<td>{{{ $contrat->code }}}</td>
								<td>{{{ $contrat->contact->nom }}}</td>
								<td>{{{ $contrat->contact->client->nom }}}</td>
								<td>
									{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('contrats.destroy', $contrat->id))) }}
									{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
									{{ Form::close() }}
									{{ link_to_route('contrats.edit', 'Edit', array($contrat->id), array('class' => 'btn btn-warning')) }}
									{{ link_to_route('contrats.show', 'Show', array($contrat->id), array('class' => 'btn btn-info')) }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					There are no contrats
					@endif
				</div>
			</div>
		</section>
	</div>
</section>
@stop
