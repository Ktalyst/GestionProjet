@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

{{ Form::close() }}

{{ Form::open(array('url' => 'clients', 'method' => 'post', 'class' => 'form-horizontal panel')) }}  
{{ Form::bootlegend('Création d\'un client') }}<br>
{{ Form::boottext('nom', 'Nom :') }}<br>
{{ Form::bootselectbutton('contact', 1, 'Contact :', $select_contacts) }}                    
<div class="row">
    <button id="add" type="button" class="btn btn-primary pull-right">Ajouter un contact</button>
</div>

<br>
<br><hr>

{{ Form::bootbuttons(url('clients')) }}
{{ Form::close() }}

@stop

@section('scripts')
<script type="text/javascript">
$(function(){
    // Suppression d'une ligne d'auteurs
    $(".btn-danger").click(function() {
        if($('.ligne').length > 1) $(this).parents('.row .ligne').remove(); 
    });
    // Ajout d'une ligne d'auteurs
    $("#add").click(function() {
        // Recherche dernier id
        var max = id = 0;
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
        // Ajoute la ligne à la fin
        $('#lignecontact' + id).after(clone);            
    });

})
</script>
@stop



