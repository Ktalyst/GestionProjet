@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Service Request Complexity
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('catalogues.index') }}"><i class="fa fa-list"></i> Catalogue</a></li>
        <li class="active">Service Request Complexity</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create Service Request Complexity</div> 
                </div>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'servicerequestcomplexities.store')) }}
                    {{ Form::label('Catalogue:') }} 
                    <select class="form-control" id="catalogue_id" name="catalogue_id">
                        <option selected disabled>Please Select</option>
                        @foreach ($catalogues as $catalogue)
                            <option value={{{ $catalogue->id }}}>{{{ $catalogue->nom }}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>' control-label')) }}

                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}

                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}

                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    <a href = "{{ URL::route('servicerequestcomplexities.index') }}" class = 'btn btn-default'>Back</a>
                </div>
            </div>
        </section>
    </div>
</section>
{{ Form::close() }}

@stop


