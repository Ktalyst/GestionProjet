@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
	<h1>
		Service
		<small>Show</small>
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
					<div class="box-title">{{{ $service->nom }}}</div>
				</div>
				<div class="box-body">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							{{ implode('', $errors->all('<li class="error">:message</li>')) }}
						</ul>
					</div>
					@endif
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{{ $service->nom }}}</td>
								<td>{{{ $service->code }}}</td>
							</tr>
						</tbody>
					</table>
					<hr>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th></th>
                            @foreach($service->catalogue->serviceRequestTypes as $t)
                            <th>{{{ $t->nom }}}</th>
                            @endforeach
                        </tr>
                        @foreach($service->catalogue->serviceRequestComplexities as $c)
                        <tr>
                            <td>{{{ $c->nom }}}</td>
                            @foreach($service->catalogue->serviceRequestTypes as $t)
                            <td>
                            @foreach($service->units as $unit)

                            	@if($unit->serviceRequestType_id == $t->id && $unit->serviceRequestComplexity_id == $c->id)
                            		{{{ $unit->nombre }}}
                            	@endif
                        	@endforeach
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
				</div>
			</div>
		</section>
	</div>
</section>

@stop
