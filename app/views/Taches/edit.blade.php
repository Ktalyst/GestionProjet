@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Tach</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($Tache, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('Taches.update', $Tache->id))) }}

        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('pourcentage', 'Pourcentage:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('pourcentage', Input::old('pourcentage'), array('class'=>'form-control', 'placeholder'=>'Pourcentage')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('tache_id', 'Tache_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'tache_id', Input::old('tache_id'), array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('Taches.show', 'Cancel', $Tache->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop