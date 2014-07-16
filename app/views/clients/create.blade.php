@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Customer
        <small>Create</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create customer</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'clients.store', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('nom', 'Name:', array('class'=>'control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Enter a name')) }}
                    </div>
                    <hr>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" id="dynamic">
                            <div class="box-title">Create contacts</div>
                            </br>
                            <div class="form-group">
                                {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control input-sm', 'name'=>'contactnom[1]', 'placeholder'=>'Entrer le nom du contact')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('code', Input::old('prenom'), array('class'=>'form-control input-sm', 'name'=>'contactprenom[1]', 'placeholder'=>'Entrer le prénom du contact')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('code', Input::old('adresse'), array('class'=>'form-control input-sm', 'name'=>'contactadresse[1]', 'placeholder'=>'Entrer l adresse du contact')) }}
                            </div>
                        </div>
                        <input type="button"  class="btn btn-primary" value="Add another contact" onClick="addInput('dynamic');"> 
                    </div>
                </div>
            <div class="box-footer">
                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                <a href = "{{ URL::route('clients.index') }}" class = 'btn btn-default'>Back</a>
            </div>
        </div>
        {{ Form::close() }}
    </section>
</div>
</section>

@stop

@section('script')
<script type="text/javascript">
var counter = 2;
var limit = 10;
function addInput(divName){
    var div = document.createElement('div');
    div.setAttribute('class',"form-group");
    div.innerHTML =  "<hr><input class='form-control input-sm' name='contactnom["+counter+"]' placeholder='Entrer le nom du contact' type='text'>";
    var divbis = document.createElement('div');
    divbis.setAttribute('class',"form-group");
    divbis.innerHTML =  "<input class='form-control input-sm' name='contactprenom["+counter+"]'  placeholder='Entrer le prénom du contact' type='text' style='margin-left: 3px;'>";
    var divter = document.createElement('div');
    divter.setAttribute('class',"form-group");
    divter.innerHTML =  "<input class='form-control input-sm' name='contactadresse["+counter+"]'  placeholder='Entrer l adresse du contact' type='text' style='margin-left: 3px;'>";
    document.getElementById(divName).appendChild(div);
    document.getElementById(divName).appendChild(divbis);
    document.getElementById(divName).appendChild(divter);
    counter++;
}
</script>
@stop