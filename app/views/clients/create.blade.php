@extends('layouts.scaffold')

@include('layouts.navigation')

@section('main')

<!--<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Client</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'clients.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">

        </div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>-->

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
                // On supprime la ligne s'il en reste au moins 2
                if($('.ligne').length > 1) $(this).parents('.row .ligne').remove(); 
            });
            // Ajout d'une ligne d'auteurs
            $("#add").click(function() {
                // Recherche dernier id
                var max = id = 0;
                $('.ligne').each(function(){
                    id = parseInt(($(this).attr('id')).substring(11));
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
            // Changement editeur/auto editeur
            $('input[type="radio"]').change(function () {
                $('.toggle').toggleClass('show hidden');
            });
        })
    </script>
@stop



