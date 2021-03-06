@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Catalogue
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('clients.index') }}"><i class="fa fa-list"></i> Catalogue</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Edit catalogue</div>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                     <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                </div>
                @endif
                {{ Form::model($catalogue, array('route' => array('catalogues.update', $catalogue['id']),'name'=>'general', 'method' => 'PATCH')) }}
                <div class="form-group">
                    {{ Form::label('nom', 'Nom:', array('class'=>' control-label')) }}
                    {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                    {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                </div>
                <div class="form-group">
                    @foreach ($select_types as $id => $nom)
                    <label class="checkbox-inline">
                        @if (in_array($nom, $srt)) 
                        <input class="flat-red" name="srt[{{{ $id }}}]" value="{{{ $nom }}}" type="checkbox" checked/>{{{ $nom }}} 
                        @else
                        <input class="flat-red" name="srt[{{{ $id }}}]" value="{{{ $nom }}}" type="checkbox">{{{ $nom }}} 
                        @endif
                    <Label>
                    @endforeach
                </div>
                <div class="form-group">
                    @foreach ($select_complexites as $id => $nom)
                    <label class="checkbox-inline">
                        @if(in_array($nom, $src))
                        <input class="flat-red" name="src[{{{ $id }}}]" value="{{{ $nom }}}" type="checkbox" checked/>{{{ $nom }}}
                        @else
                        <input class="flat-red" name="src[{{{ $id }}}]" value="{{{ $nom }}}" type="checkbox">{{{ $nom }}} 
                        @endif 
                    <Label>
                    @endforeach
                </div>
                <div class="box-body" id="dynamic">

                    @foreach ($services as $key => $service)
                    <div class="form-group">
                        <input name="servicenom[{{{$key}}}]" type="text" value="{{{$service['nom']}}}">
                    </div>
                    <div class="form-group">
                        <input name="servicecode[{{{$key}}}]" type="text" value="{{{$service['code']}}}">

                    </div>
                    {{ link_to_route('delete', 'Delete', array($service['id']), array('class' => 'btn btn-danger')) }}
                    @endforeach

            </div>
            </div>
                <input type="button"  class="btn btn-primary" value="Add another service" onClick="addInput('dynamic');"> 
            
            <div class="box-footer">      
                {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                {{ link_to_route('catalogues.show', 'Cancel', $catalogue->id, array('class' => 'btn btn-lg btn-default')) }}
            </div>
           {{ Form::close() }}
               <!-- <div class="box-body table-responsive">
                    @if ($catalogue->serviceRequestTypes->count())
                    <div class="box-group" id="accordeon">
                        <div class="panel box box-primary">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">                           
                                        <i class="fa fa-plus-square-o"></i><span> Types</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse in" style="height: auto;">
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($catalogue->serviceRequestTypes as $srt)
                                            <tr id="change">
                                                <td>{{{ $srt->nom }}}</td>
                                                <td><input class="form-control" onchange="updateInput(this, this.value)" placeholder="Code" name="code" id="codesrt" type="text" value="{{{ $srt->nom }}}"></td>
                                                <td>
                                                    {{ link_to_route('servicerequesttypes.destroy', 'Delete', array($srt->id), array('class' => 'btn btn-danger')) }}
                                                    {{ link_to_route('servicerequesttypes.update', 'Update', array($srt->id, 'truc'), array( 'id' => 'boutonchange' ,'class' => 'btn btn-info')) }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    There are no contacts
                    @endif
                </div>-->
            </div>
        </section>
    </div>
</section>
@stop
@section('script')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">

function updateInput(elmt, e){
    var contact = document.getElementById("change").innerHTML;
    var res = contact.replace("truc", e);
    document.getElementById("change").innerHTML = res;
    document.getElementById("codesrt").value = res;
}

            var limit = 10;
            function addInput(divName){
                    var counter = (document.getElementById('dynamic').children.length - 1) / 2;
                    var div = document.createElement('div');
                    div.setAttribute('class',"form-group");
                    div.innerHTML =  "<hr><input name='servicenom["+counter+"]' placeholder='Nom' type='text'>";
                    var divbis = document.createElement('div');
                    divbis.setAttribute('class',"form-group");
                    divbis.innerHTML =  "<input name='servicecode["+counter+"]'  placeholder='Code' type='text' style='margin-left: 3px;'>";

                    document.getElementById(divName).appendChild(div);
                    document.getElementById(divName).appendChild(divbis);

            }
</script>
@stop