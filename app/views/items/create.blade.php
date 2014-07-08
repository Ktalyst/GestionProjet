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
        <li><a href="{{ URL::route('commandes.index') }}"><i class="fa fa-list"></i> Order</a></li>
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
                    <div class="form-group">
                    {{ Form::label('Commande:') }} 
                    <select class="form-control" id="commande_id" name="commande_id">
                        <option selected disabled>Please Select</option>
                        @foreach ($select as $key => $commande)
                            <option value={{{ $key }}}>{{{ $commande }}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control input-sm', 'placeholder'=>'Code')) }}
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>                            
                            <input id="dateRecu" name="dateRecu" type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('montant', 'Montant:', array('class'=>'control-label')) }}
                        {{ Form::text('montant', Input::old('montant'), array('class'=>'form-control input-sm', 'placeholder'=>'Montant')) }}    
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description:', array('class'=>'control-label')) }}
                        {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control input-sm', 'rows' => '3', 'placeholder'=>'Description')) }}
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    <a href = "{{ URL::route('commandes.index') }}" class = 'btn btn-default'>Back</a>
                </div>
            </div>
        </section>
    </div>
</section>
{{ Form::close() }}

@stop
@section('script')
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#dateRecu").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            });
        </script>
@stop


