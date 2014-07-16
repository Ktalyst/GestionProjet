@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Orders
        <small>Create</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create order</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    {{ Form::open(array('route' => 'commandes.store')) }}
                    <div class="form-group">
                        {{ Form::label('Customer:') }} 
                        <select class="form-control" id="client_id" name="client_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($selectclient as $key => $client)
                            <option value={{{ $key }}}>{{{ $client }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Contrat:') }} 
                        <select class="form-control" id="contrat_id" name="contrat_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($select as $key => $contrat)
                            <!--<option value={{{ $key }}}>{{{ $contrat }}}</option>-->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                    <hr>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" id="dynamic">
                            <div class="box-title">Create items</div>
                        </br>
                        <div class="form-group">
                            {{ Form::text('code', Input::old('code'), array('class'=>'form-control input-sm', 'name'=>'itemcode[1]', 'placeholder'=>'Entrer le code de l item')) }}
                        </div>
                        <div class="form-group">
                            <input id="dateRecu" name="itemdate[1]" type="text" class="form-control" data-inputmask="'alias': 'mm-dd-yyyy'" data-mask/>
                        </div>
                        <div class="form-group">
                            {{ Form::text('montant', Input::old('montant'), array('class'=>'form-control input-sm', 'name'=>'itemmontant[1]', 'placeholder'=>'Entrer le montant de l item ')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('description', Input::old('description'), array('class'=>'form-control input-sm', 'name'=>'itemdesc[1]', 'placeholder'=>'Entrer la description de l item ')) }}
                        </div>
                    </div>
                    <input type="button"  class="btn btn-primary" value="Add another item" onClick="addInput('dynamic');"> 
                </div>
            </div>
            <div class="box-footer">
              {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
              <a href = "{{ URL::route('commandes.index') }}" class = 'btn btn-default'>Back</a>

          </div>

      </section>
  </div>
</section>
{{ Form::close() }}

@stop

@section('script')

<script type="text/javascript">
var counter = 2;
var limit = 10;
function addInput(divName){
    var div = document.createElement('div');
    div.setAttribute('class',"form-group");
    div.innerHTML =  "<hr><input class='form-control input-sm' name='itemcode["+counter+"]' placeholder='Entrer le code de l item' type='text'>";
    var divbis = document.createElement('div');
    divbis.setAttribute('class',"form-group");
    divbis.innerHTML =  "<input id='dateRecu' name='itemdate["+counter+"]' type='text' class='form-control' data-mask/>";
    var divter = document.createElement('div');
    divter.setAttribute('class',"form-group");
    divter.innerHTML =  "<input class='form-control input-sm' name='itemmontant["+counter+"]'  placeholder='Entrer le montant de l item' type='text' style='margin-left: 3px;'>";
    var divfor = document.createElement('div');
    divfor.setAttribute('class',"form-group");
    divfor.innerHTML =  "<input class='form-control input-sm' name='itemdesc["+counter+"]'  placeholder='Entrer la description de l item' type='textarea' style='margin-left: 3px;'>";
    document.getElementById(divName).appendChild(div);
    document.getElementById(divName).appendChild(divbis);
    document.getElementById(divName).appendChild(divter);
    document.getElementById(divName).appendChild(divfor);
    counter++;
}
jQuery(document).ready(
    function($){
        $('#client_id').change(function(){
            $.get("{{ url('api/dropdowncommande')}}",
                { option: $(this).val() },
                function(data) {
                    var contrat = $('#contrat_id');
                    contrat.empty();
                    $.each(data, function(index,element) {
                        contrat.append("<option value='"+ index +"''>" + element + "</option>");
                    });
                });
        });
        $("#dateRecu").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
    });
</script>
@stop
