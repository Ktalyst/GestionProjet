@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Customer
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> Customers</a></li>
        <li class="active">create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create customer</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'clients.store', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('nom', 'Name:', array('class'=>'control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Enter a name')) }}
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    <a href = "{{ URL::previous() }}" class = 'btn btn-default'>Back</a>
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
</section>

@stop