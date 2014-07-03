@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Contact</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($contact, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('contacts.update', $contact->id))) }}
{{ Form::bootselect('client_id', 'Client :', $select, $contact->client_id) }}  
        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('prenom', 'Prenom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('prenom', Input::old('prenom'), array('class'=>'form-control', 'placeholder'=>'Prenom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('adresse', 'Adresse:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('adresse', Input::old('adresse'), array('class'=>'form-control', 'placeholder'=>'Adresse')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('contacts.show', 'Cancel', $contact->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop