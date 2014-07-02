@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Modifier le client</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
         <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    </div>
    @endif
</div>
</div>
    {{ Form::model($client, array('url' => 'clients/'.$client->id, 'method' => 'put', 'class' => 'form-horizontal panel', 
    'route' => array('clients.update', $client->id))) }}   
        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h2>Modifier les contacts</h2>
            </div>
        </div>
        @for ($i = 0; $i < count($contact); $i++)
        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', $client->contacts[$i]->nom, array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('prenom', 'Prenom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('prenom',$client->contacts[$i]->prenom, array('class'=>'form-control', 'placeholder'=>'Prenom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('adresse', 'Adresse:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('adresse', $client->contacts[$i]->adresse, array('class'=>'form-control', 'placeholder'=>'Adresse')) }}
            </div>
        </div>
        @endfor
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <h1>Ajouter des Contacts</h1>
            </div>
        </div>
        <div id="dynamicInput">
        </div>
        <button id="add" type="button" class="btn btn-primary pull-right"  onClick="addInput('dynamicInput')">Ajouter un contact</button>

        <br><hr>

        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
                {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                {{ link_to_route('clients.show', 'Cancel', $client->id, array('class' => 'btn btn-lg btn-default')) }}
            </div>
        </div>

    {{ Form::close() }}

@stop

@section('scripts')
<script type="text/javascript">
var counter = 1;
var limit = 3;
function addInput(divName){
    var newdiv = document.createElement('div');
    newdiv.innerHTML =  "<div class='form-group'>" + "<label for='nom' class='col-md-2 control-label'>Nom:</label>" + "<div class='col-sm-10'>" 
    + "<input class='form-control' placeholder='Nom' name='" + "NomContact" + counter + "' type='text' id='" + "NomContact" + counter + "'>" + "</div>" +  "</div>" ;
    document.getElementById(divName).appendChild(newdiv);
    counter++;
}

</script>
@stop