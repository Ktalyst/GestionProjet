@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Commande
		<small>Show</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Commande</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">{{{ $commande->code }}}</div>
				</div>
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Code</th>
								<th>Date</th>
								<th>Montant</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($commande->items as $item)
							<tr>
								<td>{{{ $item->code }}}</td>
								<td>{{{ $item->dateRecu }}}</td>
								<td>{{{ $item->montant }}}</td>
								<td>{{{ $item->description }}}</td>
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
