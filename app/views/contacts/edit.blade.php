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
                {{ Form::model($contact, array('method' => 'PATCH', 'route' => array('contacts.update', $contact->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>'control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('prenom', 'Prenom:', array('class'=>'control-label')) }}
                        {{ Form::text('prenom', Input::old('prenom'), array('class'=>'form-control', 'placeholder'=>'Prenom')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('adresse', 'Adresse:', array('class'=>'control-label')) }}
                        {{ Form::textarea('adresse', Input::old('adresse'), array('class'=>'form-control', 'placeholder'=>'Adresse')) }}
                    </div>

                    <div class="box-footer">
                      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                      {{ link_to_route('contacts.show', 'Cancel', $contact->id, array('class' => 'btn btn-lg btn-default')) }}
                  </div>
                  {{ Form::close() }}

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