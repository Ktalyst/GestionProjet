@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Unit</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'Units.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('serviceRequestType_id', 'ServiceRequestType_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'serviceRequestType_id', Input::old('serviceRequestType_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('serviceRequestComplexity_id', 'ServiceRequestComplexity_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'serviceRequestComplexity_id', Input::old('serviceRequestComplexity_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('service_id', 'Service_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'service_id', Input::old('service_id'), array('class'=>'form-control')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


