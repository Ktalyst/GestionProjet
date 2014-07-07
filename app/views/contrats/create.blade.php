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
                {{ Form::open(array('route' => 'contrats.store')) }}
                <div class="box-body">
                    <div class="form-group">
                    {{ Form::bootselect('client_id', 'Client :', $selectclient) }}
                    </div>
                    <div class="form-group">
                    {{ Form::bootselect('contact_id', 'Contact :', $selectcontact) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>'control-label')) }} 
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
          $('#client_id').change(function()
            {
                alert('changement de la valeur ' + $(this).attr('value'));
            });
    });
  </script>
@stop
