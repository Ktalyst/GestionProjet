@extends('layouts.scaffold')
 
@include('layouts.navigation')
 
@section('main')
 
    <div class="col-md-12">
        Pour vous connecter au site veuillez entrer votre pseudo et votre mot de passe dans le formulaire ci-dessous :
    </div>
    <br>
    <div class="row col-md-12">
        @if (Session::has('flash_error'))
            <div class="col-md-7">
                <div class="alert alert-danger">
                    {{ Session::get('flash_error') }}
                </div>
            </div>
        @endif
        <div class="col-md-7">
            {{ Form::open(array('url' => 'auth/login', 'method' => 'POST', 'class' => 'form-horizontal well')) }}
            <div class="form-group">
                {{ Form::label('username', 'Pseudo :', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-9">
                    {{ Form::text('username', '', $attributes = array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Mot de passe :', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-9">
                    {{ Form::password('password', $attributes = array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="checkbox pull-right">
                {{ Form::checkbox('souvenir') }}Se rappeler de moi
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    {{ Form::submit('Envoyer', array('class' => 'btn btn-success')) }}
                </div>
            </div>
            {{ Form::close()}}
        </div>
        <div class="col-md-5">
            <p>
                {{ link_to('remind/remind', 'J\'ai oublié mon mot de passe...', array('class' => 'btn btn-success')) }}
            </p>
        </div>
    </div>
    <div class="col-md-12">
        Si vous n'avez pas encore de compte vous pouvez en créer un en cliquant sur ce bouton :
        {{ link_to('auth/inscription', 'Je m\'inscris !', array('class' => 'btn btn-info')) }}
    </div>
     
@stop