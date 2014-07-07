@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Items
        <small>Item</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('items.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li class="active">Item</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create Item</div> 
                </div>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'items.store')) }}
                    {{ Form::bootselect('commande_id', 'Commande :', $select) }}
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('dateRecu', 'DateRecu:', array('class'=>'control-label')) }}
                        {{ Form::input('date', 'dateRecu') }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('montant', 'Montant:', array('class'=>'control-label')) }}
                        {{ Form::text('montant', Input::old('montant'), array('class'=>'form-control', 'placeholder'=>'Montant')) }}    
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description:', array('class'=>'control-label')) }}
                        {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control', 'placeholder'=>'Description')) }}
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


