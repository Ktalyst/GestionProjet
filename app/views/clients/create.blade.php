@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Clients
        <small>Create</small>
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
                    <div class="box-title">Create clients</div>
                </div>     
                {{ Form::open(array('route' => 'clients.store', 'role' => 'form')) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
</section>

@stop