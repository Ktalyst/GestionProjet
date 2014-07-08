@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Orders
        <small>List</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('contrats.index') }}"><i class="fa fa-list"></i> Orders</a></li>
        <li class="active">Create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create order</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'commandes.store')) }}
                    <div class="form-group">
                        {{ Form::label('Contrat:') }} 
                        <select class="form-control" id="contrat_id" name="contrat_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($select as $key => $contrat)
                            <option value={{{ $key }}}>{{{ $contrat }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                </div>
                <div class="box-footer">
                  {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                  <a href = "{{ URL::route('commandes.index') }}" class = 'btn btn-default'>Back</a>
                  
              </div>

          </section>
      </div>
  </section>
  {{ Form::close() }}

  @stop


