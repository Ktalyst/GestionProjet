@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Customer
        <small>Edit</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Edit customer {{{ $client->nom }}}</div>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::model($client, array('role' => 'form',  'method' => 'PATCH', 'route' => array('clients.update', $client->id))) }}
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:') }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>
                    <hr>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" id="dynamic">
                                                        <div class="box-title">Edit contacts</div>
                            </br>
                        @foreach ($contacts as $key => $contact)
                        <div class="form-group">
                            <input class='form-control input-sm' name="contactnom[{{{$key}}}]" type="text" value="{{{$contact['nom']}}}">
                        </div>
                        <div class="form-group">
                            <input class='form-control input-sm' name="contactprenom[{{{$key}}}]" type="text" value="{{{$contact['prenom']}}}">
                        </div>
                        <div class="form-group">
                            <input class='form-control input-sm' name="contactadresse[{{{$key}}}]" type="text" value="{{{$contact['adresse']}}}">
                        </div>
                        <div class="form-group">
                        {{ link_to_route('deletecontacts', 'Delete', array($contact['id']), array('class' => 'btn btn-danger')) }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="button"  class="btn btn-primary" value="Add another contact" onClick="addInput('dynamic');"> 

                <div class="box-footer">      
                    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                     <a href = "{{ URL::route('clients.index') }}" class = 'btn btn-default'>Back</a>
                </div>
                {{ Form::close() }}
            </div>
        </section>
    </div>
</section>
@stop

@section('script')
<script type="text/javascript">
var counter = (document.getElementById('dynamic').children.length - 1) / 2;
var limit = 10;
function addInput(divName){
    var div = document.createElement('div');
    div.setAttribute('class',"form-group");
    div.innerHTML =  "<hr><input class='form-control input-sm' name='contactnom["+counter+"]' placeholder='Entrer le nom du contact' type='text'>";
    var divbis = document.createElement('div');
    divbis.setAttribute('class',"form-group");
    divbis.innerHTML =  "<input class='form-control input-sm' name='contactprenom["+counter+"]'  placeholder='Entrer le prénom du contact' type='text' >";
    var divter = document.createElement('div');
    divter.setAttribute('class',"form-group");
    divter.innerHTML =  "<input class='form-control input-sm' name='contactadresse["+counter+"]'  placeholder='Entrer l adresse du contact' type='text' >";
    document.getElementById(divName).appendChild(div);
    document.getElementById(divName).appendChild(divbis);
    document.getElementById(divName).appendChild(divter);
    counter++;
}
</script>
@stop
