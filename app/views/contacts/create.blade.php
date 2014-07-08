@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Contacts
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li><a href="{{ URL::previous() }}"><i class="fa fa-users"></i> Customer</a></li>
        <li class="active">Contacts</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create contact</div>
                </div>   
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'contacts.store')) }}
                    <div class="form-group">
                    {{ Form::label('Client:') }} 
                    <select class="form-control" id="client_id" name="client_id">
                        <option selected disabled>Please Select</option>
                        @foreach ($select as $key => $client)
                            <option value={{{ $key }}}>{{{ $client }}}</option>
                        @endforeach
                    </select>
                    </div>
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
                        {{ Form::textarea('adresse', Input::old('adresse'), array('class'=>'form-control', 'rows' => '3', 'placeholder'=>'Adresse')) }}
                    </div>
                <div class="box-footer">
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    <a href = "{{ URL::route('clients.index') }}" class = 'btn btn-default'>Back</a>
                </div>
                  {{ Form::close() }}
            </div>
        </section>
    </div>
</section>
@stop


