@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Commandes
        <small>Edit</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Edit commande {{{ $commande->code }}}</div>
                </div>
                <div class="box-body">
                    {{ Form::model($commande, array('method' => 'PATCH', 'route' => array('commandes.update', $commande->id))) }}
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                </div>
                    <hr>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" id="dynamic">
                                                        <div class="box-title">Edit items</div>
                            </br>
                        @foreach ($items as $key => $item)
                        <div class="form-group">
                            <input class='form-control input-sm' name="itemcode[{{{$key}}}]" type="text" value="{{{$item['code']}}}">
                        </div>
                        <div class="form-group">
                            <input class='form-control input-sm' name="itemdate[{{{$key}}}]" type="text" value="{{{$item['dateRecu']}}}">
                        </div>
                        <div class="form-group">
                            <input class='form-control input-sm' name="itemmontant[{{{$key}}}]" type="text" value="{{{$item['montant']}}}">
                        </div>
                        <div class="form-group">
                            <input class='form-control input-sm' name="itemdesc[{{{$key}}}]" type="text" value="{{{$item['description']}}}">
                        </div>
                        <div class="form-group">
                        {{ link_to_route('deleteitems', 'Delete', array($item['id']), array('class' => 'btn btn-danger')) }}
                        </div>
                        @endforeach
                    </div>
                     <input type="button"  class="btn btn-primary" value="Add another item" onClick="addInput('dynamic');"> 
                <div class="box-footer">
                  {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                  {{ link_to_route('commandes.show', 'Cancel', $commande->id, array('class' => 'btn btn-lg btn-default')) }}
                </div>
            </div>
          {{ Form::close() }}
      </div>
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