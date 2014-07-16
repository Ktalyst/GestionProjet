@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Customers
		<small>List</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<section class="col-xs-12 connectedSortable"> 
			<div class="box box-primary">
				<div class="box-header">
					<div class="box-title">All customers</div>
				</div>
				<div class="box-body table-responsive">
						@if ($clients->count())
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nom du client</th>
									<th>Nom du contact</th>
									<th>Prenom du contact</th>
									<th>Adresse</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($clients as $client)
									@if(count($client->contacts) > 1)
									<tr>
										<td rowspan="{{{ count($client->contacts) }}}">{{{ $client->nom }}}</td>
										<td>{{{ $client->contacts[0]->nom }}}</td>
										<td>{{{ $client->contacts[0]->prenom }}}</td>
										<td>{{{ $client->contacts[0]->adresse }}}</td>
										<td rowspan="{{{ count($client->contacts) }}}">
											{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
											{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
											{{ Form::close() }}
											{{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-warning')) }}
										</td>
									</tr>
										@for($i = 1; $i < count($client->contacts); $i++)
										<tr>
											<td>{{{ $client->contacts[$i]->nom }}}</td>
											<td>{{{ $client->contacts[$i]->prenom }}}</td>
											<td>{{{ $client->contacts[$i]->adresse }}}</td>
										</tr>
										@endfor
									@else
									<tr>
										<td>{{{ $client->nom }}}</td>
										@if(count($client->contacts) == 1)
										<td>{{{ $client->contacts[0]->nom }}}</td>
										<td>{{{ $client->contacts[0]->prenom }}}</td>
										<td>{{{ $client->contacts[0]->adresse }}}</td>
										@else
										<td colspan="3">There are no contacts for this customer</td>
										@endif
										<td>
											{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('clients.destroy', $client->id))) }}
											{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
											{{ Form::close() }}
											{{ link_to_route('clients.edit', 'Edit', array($client->id), array('class' => 'btn btn-warning')) }}
										</td>
									</tr>								
									@endif
								@endforeach
							</tbody>
							<tfoot>
                                <tr>
									<th>Nom du client</th>
									<th>Nom du contact</th>
									<th>Prenom du contact</th>
									<th>Adresse</th>
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
