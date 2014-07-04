@extends('layouts.scaffold')
 
@include('layouts.navigation')

@section('main')

<br>
<div class="row col-md-12">
	<h3 class="col-md-12">
		Nouveau mot de passe
	</h3>
	@if (!Session::has('flash_notice'))
		<div class="col-md-12">
			Il semblerait que vous ayez oublié votre mot de passe. Ne vous affolez pas, nous allons vous donner la possibilité d'en créer un nouveau. Veuillez entrer dans ce formulaire l'adresse mail que vous avez utilisée pour votre inscription :
		</div>
	@endif
	<br />
	@if (Session::has('error'))
    <div class="col-md-8">
      <div class="alert alert-danger">
				{{ Session::get('error') }}         
      </div>
    </div>
	@endif
	@if (Session::has('status'))
		<div class="col-md-8">
			<div class="alert alert-success">
				{{ Session::get('status') }}
			</div>
		</div>
	@else
		<div class="col-md-8">
      {{ Form::open(array('url' => 'remind/remind', 'method' => 'POST', 'class' => 'form-horizontal well')) }}
			<div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
				{{ Form::label('email', 'Mail :', array('class' => 'col-md-2 control-label')) }}
				<div class="col-md-10">
					{{ Form::text('email', '', $attributes = array('class' => 'form-control')) }}
				</div>
			</div>
      <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
              {{ Form::submit('Envoyer', array('class' => 'btn btn-success')) }}
          </div>
      </div>
			{{ Form::close()}}
		</div>
	@endif
</div>
@stop

