@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
	<h1>
		Client
		<small>Show</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Clients</li>
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
                        @else
                        There are no contacts
                        @endif

                    </div>
			</div>
		</section>			
	</div>
</section>
@stop

