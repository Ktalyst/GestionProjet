@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<h1>All Catalogues</h1>


<section class="content-header">
	<h1>
		Catalogues
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="#"> catalogues</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<!-- Left col -->
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All catalogues</div>
					<div class="pull-right box-tools">
						<div class="btn-group">
							<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="{{ URL::route('catalogues.create') }}">Add new catalogue</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="box-body table-responsive">
					@if ($Catalogues->count())
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($Catalogues as $Catalogue)
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
							@endforeach
						</tbody>
					</table>
					@else
					There are no Catalogues
					@endif

				</div>
			</div>
		</div>
	</section>
</div>
</section>

@stop
