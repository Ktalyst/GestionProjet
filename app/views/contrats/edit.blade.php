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
        <li><a href="{{ URL::route('contrats.index') }}"><i class="fa fa-list"></i> Contrat</a></li>
        <li class="active">Create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create contrat</div>
                </div>     
                {{ Form::model($contrat, array('method' => 'PATCH', 'route' => array('contrats.update', $contrat->id))) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('Contact:') }} 
                        {{ Form::select('contact_id', $select, Input::old('contact_id'), array('class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>'control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}

                    </div>


                    <div class="box-footer">
                      {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                      {{ link_to_route('contrats.show', 'Cancel', $contrat->id, array('class' => 'btn btn-default')) }}

                  </div>
              </div>
          </section>
      </div>
  </section>
  {{ Form::close() }}

  @stop