@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Customer
		<small>Show</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> Customers</a></li>
        <li class="active">Show</li>
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
					<div class="box-title">{{{ $client->nom }}}</div>
				</div>
                <div class="box-body table-responsive">
                    @if ($client->contacts->count())
                    <div class="box-group" id="accordeon">
                        <div class="panel box box-primary">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">                           
                                        <i class="fa fa-plus-square-o"></i><span> Contacts</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse in" style="height: auto;">
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->contacts as $contact)
                                            <tr>
                                                <td>{{{ $contact->nom }}}</td>
                                                <td>{{{ $contact->prenom }}}</td>
                                                <td>{{{ $contact->adresse }}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @else
                        There are no contacts
                        @endif

                    </div>
                    <div class="box-footer">
                        <a href="{{ URL::route('clients.index') }}" class = "btn btn-info">Back</a>
                    </div>
                </div>
            </div>
        </section>			
    </div>
</section>
@stop

