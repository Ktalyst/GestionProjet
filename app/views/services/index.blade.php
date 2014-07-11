@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
	<h1>
		Service
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All services</div>
				</div>
				<div class="box-body">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							{{ implode('', $errors->all('<li class="error">:message</li>')) }}
						</ul>
					</div>
					@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
								<th>&nbsp;</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($services as $service)
							<tr>
								<td>{{{ $service->nom }}}</td>
								<td>{{{ $service->code }}}</td>
								<td>
									@if( count($service->units) > 0 )
									{{ link_to_route('unitcreate', 'Edit units', array($service->id), array('class' => 'btn btn-info')) }}
									@else
									{{ link_to_route('unitcreate', 'Add units', array($service->id), array('class' => 'btn btn-info')) }}
									@endif
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
