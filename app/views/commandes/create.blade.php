@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Contrats
        <small>Contrat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('contrats.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li class="active">Commande</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create commande</div>
                </div>     
                {{ Form::open(array('route' => 'commandes.store')) }}
                <div class="box-body">
                    {{ Form::bootselect('contrat_id', 'Contrat :', $select) }}
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                </div>
                <div class="box-footer">
                  {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
                </div>
            </div>

        </section>
    </div>
</section>
{{ Form::close() }}

 @stop


