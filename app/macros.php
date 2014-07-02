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

