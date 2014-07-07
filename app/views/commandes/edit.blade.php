@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Commandes
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li class="active">Commande</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Edit commande</div>
                    <div class="pull-right box-tools">
                        <div class="btn-group">
                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="{{ URL::route('items.create') }}">Add new items</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    {{ Form::model($commande, array('method' => 'PATCH', 'route' => array('commandes.update', $commande->id))) }}
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                </div>
                <div class="box-footer">
                  {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                  {{ link_to_route('commandes.show', 'Cancel', $commande->id, array('class' => 'btn btn-lg btn-default')) }}
                </div>
            </div>
          {{ Form::close() }}
      </div>
  </div>
</section>
</div>
</section>
@stop