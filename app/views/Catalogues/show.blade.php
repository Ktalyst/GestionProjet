@extends('layouts.scaffold')
@include('layouts.header')
@include('layouts.sidebar')
@section('main')

<section class="content-header">
	<h1>
		Catalogue
		<small>Show</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{ URL::route('catalogues.index') }}"> catalogues</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">Catalogue {{{ $Catalogue->nom }}}</div>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Code</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{{ $Catalogue->nom }}}</td>
								<td>{{{ $Catalogue->code }}}</td>
							</tr>
						</tbody>
					</table>
					<hr>

					<table class="table table-striped">
						<tr>
							<th rowspan="2"></th>
							@foreach($Catalogue->serviceRequestTypes as $t)
							<th colspan="{{{ count($Catalogue->serviceRequestComplexities) }}}">{{{ $t->nom }}}</th>
							@endforeach
						</tr>
						<tr>
							@foreach($Catalogue->serviceRequestTypes as $t)
							@foreach($Catalogue->serviceRequestComplexities as $c)
							<td>{{{ $c->nom }}}</td>
							@endforeach
							@endforeach
						</tr>
						@foreach($Catalogue->services as $s)
						<tr>
							<td>{{{ $s->nom }}}</td>
							@foreach($Catalogue->serviceRequestTypes as $t)
							@foreach($Catalogue->serviceRequestComplexities as $c)
							<td name="gris">
                            @foreach($s->units as $u)
                            	@if($u->serviceRequestType_id == $t->id && $u->serviceRequestComplexity_id == $c->id)
                            		{{ $u->nombre }}
                            	@endif
                        	@endforeach
                        	</td>
							@endforeach
							@endforeach
						</tr>
						@endforeach
					</table>

					<!--<div class="box-group" id="accordion">
						<div class="panel box box-primary">
							<div class="box-header">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										Service Request Complexity
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="box-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Nom</th>
													<th>Code</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($Catalogue->servicerequestcomplexities as $s)
												<tr>
													<td>{{{ $s->nom }}}</td>
													<td>{{{ $s->code }}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
								</div>
							</div>
						</div>

						<div class="panel box box-primary">
							<div class="box-header">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										Service Request Type
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="box-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Nom</th>
													<th>Code</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($Catalogue->servicerequesttypes as $s)
												<tr>
													<td>{{{ $s->nom }}}</td>
													<td>{{{ $s->code }}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
								</div>
							</div>
						</div>

						<div class="panel box box-primary">
							<div class="box-header">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										Services
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="box-body">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Nom</th>
													<th>Code</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($Catalogue->services as $s)
												<tr>
													<td>{{{ $s->nom }}}</td>
													<td>{{{ $s->code }}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</section>
	</div>
</section>

@stop

@section('script')
<script type="text/javascript">
    $(document).ready(function()
    {
    	var tds = document.getElementsByName('gris');
    	for(var i = 0; i < tds.length; i++)
    	{
    		if(tds[i].outerText == "0.00")
    		{
    			tds[i].setAttribute("style","background-color: #000;");
    		}
    	}
    });
</script>
@stop