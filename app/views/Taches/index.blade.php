@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Tasks
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="#"> tasks</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<!-- Left col -->
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All tasks</div>
				</div>
				<div class="box-body table-responsive">
					@if ($Taches->count())
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Pourcentage</th>
								<th>Service</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($Taches as $Tache)
							<tr>
								<td>{{{ $Tache->nom }}}</td>
								<td>{{{ $Tache->pourcentage }}}</td>
								<td>{{{ $Tache->service->nom }}}</td>
								<td>
									{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('taches.destroy', $Tache->id))) }}
									{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
									{{ Form::close() }}
									{{ link_to_route('taches.edit', 'Edit', array($Tache->id), array('class' => 'btn btn-info')) }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					There are no Taches
					@endif

				</div>
			</div>
		</div>
	</section>
</div>
</section>

@stop

