@extends('layouts.scaffold')
 
@include('layouts.navigation')

@section('main')
	<div class="col-md-12">
		Pour entrer un nouveau mot de passe veuillez remplir ce formulaire :
	</div>
	<br>
	<div class="row col-md-12">
		@if (Session::has('error'))
			<div class="col-md-9">
        <div class="alert alert-danger">
    			{{ Session::get('error') }}
				</div>
			</div>
		@endif
		<div class="col-md-9">
	    {{ Form::open(array('url' => 'remind/reset/'.$token, 'method' => 'POST', 'class' => 'form-horizontal well')) }}
			{{ Form::hidden('token', $token)}}
			<div class="form-group">
				{{ Form::label('email', 'Mail :', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::text('email', '', $attributes = array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Mot de passe :', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::password('password', $attributes = array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('password_confirmation', 'Confirmation passe :', array('class' => 'col-md-4 control-label')) }}
				<div class="col-md-8">
					{{ Form::password('password_confirmation', $attributes = array('class' => 'form-control')) }}
				</div>
			</div>
      <div class="form-group">
          <div class="col-md-offset-4 col-md-8">
              {{ Form::submit('Envoyer', array('class' => 'btn btn-success')) }}
          </div>
      </div>
			{{ Form::close()}}
		</div>
	</div>
@stop