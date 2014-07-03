<?php

Form::macro('boottext', function($name, $label, $input = '')
{
    return sprintf('
        <div class="row">
            <div class="form-group">
                %s
                <div class="col-md-10">
                    %s
                </div>
            </div>
        </div>',
        Form::label($name, $label, array("class" => "col-md-2")),
        Form::text($name, $input, array('class' => 'form-control'))
    );
});

Form::macro('bootselect', function($name, $label, $select, $id = null)
{
    return sprintf('
        <div class="row">
            <div class="form-group">
                %s
                <div class="col-md-10">
                    %s
                </div>
            </div>
        </div>',
        Form::label($name, $label, array("class" => "col-md-2")),
        Form::select($name, $select, $id, array('class' => 'form-control'))
    );
});

Form::macro('bootselectbutton', function($name, $num, $label, $select, $id = null)
{
    $i = $name.$num;
    return sprintf('
        <div class="row ligne" id="%s">
            <div class="form-group">
                %s
                <div class="col-md-7">
                    %s
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>',
        'ligne'.$i,
        Form::label($i, $label, array("class" => "col-md-3")),
        Form::select($i, $select, $id, array('class' => 'form-control', 'name' => $name.'[]')),
        $name
    );
});

Form::macro('bootlegend', function($legend)
{
    return sprintf('
        <div class="row">
            <legend>%s</legend>
        </div>',
        $legend
    );
});

Form::macro('bootbuttons', function($url)
{
    return sprintf('
        <div class="form-group">    
            <div class="col-md-offset-2">   
                <a href="%s" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
              <button type="submit" class="btn btn-primary pull-right">
                <span class="glyphicon glyphicon-plane"></span> Valider
              </button>
            </div>
        </div>',
        $url
    );
});

HTML::macro('bootpanel', function($titre, $nom)
{
    return sprintf('
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">%s</h3>
            </div>
            <div class="panel-body">
            %s
          </div>
        </div>',
        $titre,
        $nom
    );
});

HTML::macro('bootpanelmulti', function($titre, $noms, $attribute)
{
    $lignes = '';
    foreach($noms as $nom) {
        $lignes .= '<tr><td>'.$nom->getAttribute($attribute).'</td></tr>';
    }
    return sprintf('
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">%s</h3>
            </div>
            <table class="table">
            %s
          </table>
        </div>',
        $titre,
        $lignes
    );
});

