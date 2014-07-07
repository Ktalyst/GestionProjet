@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Contrat
		<small>Show</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Contrat</li>
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
					<div class="box-title">{{{ $contrat->nom }}}</div>
				</div>
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
								<th>Contact</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>{{{ $contrat->nom }}}</td>
								<td>{{{ $contrat->code }}}</td>
								<td>{{{ $contrat->contact->nom}}}</td>
							</tr>
						</tbody>
					</table>

				</div>
				<div class="box-footer">
					<a href="{{ URL::previous() }}" class="btn btn-info">Back</a>
				</div>
			</div>
		</section>			
	</div>
</section>

@stop
