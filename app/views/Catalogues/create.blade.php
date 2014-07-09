@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Catalogue
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('catalogues.index') }}"><i class="fa fa-list"></i> Catalogues</a></li>
        <li class="active">create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 connectedSortable">

        </div>
    </div>
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create catalogue</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'catalogues.store', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                      {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                  </div>

              </br><hr>

              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <div class="box-header">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">

                                Create service request type
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" id="dynamic">
                          <div class="form-group">
                              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'name'=>'srtnom[1]', 'placeholder'=>'Nom')) }}
                          </div>

                          <div class="form-group">
                              {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'name'=>'srtcode[1]', 'placeholder'=>'Code')) }}

                          </div>

                      </div>
                      <input type="button"  class="btn btn-primary" value="Add another type" onClick="addInput('dynamic');"> 
                  </div>
              </div>
              <div class="box-footer">
                  {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                  <a href = "{{ URL::previous() }}" class = 'btn btn-default'>Back</a>
              </div>
              {{ Form::close() }}
          </div>
      </section>
  </div>
</section>
@stop

@section('script')
<script type="text/javascript">
var counter = 2;
var limit = 10;
function addInput(divName){
   if (counter == limit)  {
      alert("You have reached the limit of adding " + counter + " types");
  }
  else {
      var div = document.createElement('div');
      div.setAttribute('class',"form-group");
      div.innerHTML =  "<hr><input class='form-control' name='srtnom["+counter+"]' placeholder='Nom' type='text'>";
      var divbis = document.createElement('div');
      divbis.setAttribute('class',"form-group");
      divbis.innerHTML =  "<input class='form-control' name='srtcode["+counter+"]'  placeholder='Code' type='text' style='margin-left: 3px;'>";

      document.getElementById(divName).appendChild(div);
      document.getElementById(divName).appendChild(divbis);
      counter++;
  }
}

</script>
@stop