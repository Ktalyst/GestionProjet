@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Clients
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li class="active">Clients</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 connectedSortable">

        </div>
    </div>
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Edit clients</div>
                    <div class="pull-right box-tools">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="{{ URL::route('contacts.create') }}">Add new contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{ Form::model($client, array('role' => 'form',  'method' => 'PATCH', 'route' => array('clients.update', $client->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:') }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>

                    <div class="box-footer">
                        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                        {{ link_to_route('clients.show', 'Cancel', $client->id, array('class' => 'btn btn-lg btn-default')) }}
                    </div>
                    {{ Form::close() }}
                    <div class="box-body table-responsive">
                        @if ($contacts->count())
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{{ $contact->nom }}}</td>
                                    <td>
                                        {{ link_to_route('contacts.destroy', 'Delete', array($contact->id), array('class' => 'btn btn-danger')) }}
                                        {{ link_to_route('contacts.edit', 'Edit', array($contact->id), array('class' => 'btn btn-info')) }}
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
                        There are no contacts
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