@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Tasks
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tasks</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create task</div>
                </div>   
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'taches.store')) }}
                    <div class="form-group">
                        {{ Form::label('Service:') }} 
                        <select class="form-control" id="service_id" name="service_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($select as $key => $service)
                            <option value={{{ $key }}}>{{{ $service }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>'control-label')) }}

                          {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}

                  </div>

                  <div class="form-group">
                    {{ Form::label('pourcentage', 'Pourcentage:', array('class'=>'control-label')) }}

                      {{ Form::text('pourcentage', Input::old('pourcentage'), array('class'=>'form-control', 'placeholder'=>'Pourcentage')) }}

              </div>


              <div class="box-footer">
                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
        </div>
    </section>
</div>
</section>
@stop



