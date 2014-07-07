@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Customers
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="#"> customers</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<!-- Left col -->
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All customers</div>
					<div class="pull-right box-tools">
						<div class="btn-group">
							<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="{{ URL::route('clients.create') }}">Add new customer</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="box-body table-responsive">
						@if ($clients->count())
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Nom</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($clients as $client)
								<tr>
									<td>{{{ $client->nom }}}</td>
										<td>
											{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
											{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
											{{ Form::close() }}
											{{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-warning')) }}
											{{ link_to_route('clients.show', 'Show', array($client->id), array('class' => 'btn btn-info')) }}
										</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
                                <tr>
                                	<th>Nom</th>
                                	<th>Actions</th>
                                </tr>
                            </tfoot>
						</table>
						@else
						There are no clients
						@endif

					</div>
				</div>
			</div>
		</section>
	</div>
</section>

@stop

@section('script')
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
@stop