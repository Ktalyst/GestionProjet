@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

{{ Form::open(array('url' => 'clients/'.$client->id, 'method' => 'put', 'class' => 'form-horizontal panel')) }}   
{{ Form::bootlegend('Modification du client') }}<br>
{{ Form::boottext('nom', 'Nom :', $client->nom) }}<br>


@for ($i = 0; $i < count($client->contacts); $i++)
        <div class="row ligne" id="ligne{{ $i }}">
            <div class="form-group">
                {{ Form::label('contact'.+$i, 'Contact :', array("class" => "col-md-3")) }}
                <div class="col-md-7">
                    {{ Form::select('contact'.+$i, $select_contacts, $contacts[$i], array('class' => 'form-control', 'name' => 'contact'.'[]')) }}
                </div>
                <div class="col-md-2">
                    {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('contacts.destroy', 1))) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

@endfor

<div class="row">
    <button id="add" type="button" class="btn btn-primary pull-right">Ajouter un contact</button>
</div>
<br><hr>
{{ Form::bootbuttons(url('clients')) }}
{{ Form::close() }}
@stop
@section('scripts')
<script>
$(function(){
    // Suppression d'une ligne d'auteurs
    $(".btn-danger").click(function() {
        // On supprime la ligne s'il en reste au moins 2
            $(this).parents('.row .ligne').remove(); 
    });
    $("#add").click(function() {
        var max = id = 0;
        // Recherche dernier id
        $('.ligne').each(function(){
            id = parseInt($(this).attr('id').replace('lignecontact', ''));
            if(id > max) max = id;
        });
        // Première ligne
        var clone = $('#lignecontact' + max).clone(true);
        // Change l'id
        clone.attr('id', 'lignecontact' + ++max);
        // Change le for du label 
        clone.find('label').attr('for', 'contact' + max);
        // Change l'id du select
        clone.find('select').attr('id', 'contact' + max);
        clone.find('option').attr('selected', null);
        // Ajoute la ligne à la fin
        $('#lignecontact' + id).after(clone);            
    });
})
</script>
@stop
