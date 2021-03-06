@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Catalogue
        <small>Create</small>
    </h1>
</section>
<section class="content">
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
                    {{ Form::open(array('route' => 'catalogues.store')) }}
                    <div class="form-group">
                        {{ Form::label('nom', 'Nom:', array('class'=>' control-label')) }}
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                        {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                    </div>
                    <div class="box-group" id="accordion">
                        <div class="panel box box-primary">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Select service request complexity
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div class="form-group">
                                        @foreach ($servicerequestcomplexities as $key => $src)
                                        <label class="checkbox-inline">
                                            <input id={{{ $src->id }}} name="src[{{{$key}}}]" type="checkbox" value="{{{ $src->nom }}}">{{{ $src->nom }}}
                                        <label>
                                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-group" id="accordion">
                        <div class="panel box box-primary">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Select service request type
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body" >
                                    <div class="form-group">
                                        @foreach ($servicerequesttypes as $key => $srt)
                                        <label class="checkbox-inline">
                                            <input id={{{ $srt->id }}} class="flat-red" name="srt[{{{$key}}}]" type="checkbox" value="{{{ $srt->nom }}}">{{{ $srt->nom }}}
                                        </Label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br><hr>
                    <div class="box-group" id="accordion">
                                    <div class="panel box box-primary">
                                        <div class="box-header">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    Create services
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="box-body" id="dynamic">
                                                <div class="form-group">
                                                    {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'name'=>'servicenom[1]', 'placeholder'=>'Nom')) }}
                                                </div>

                                                <div class="form-group">
                                                    {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'name'=>'servicecode[1]', 'placeholder'=>'Code')) }}
                                                </div>
                                            </div>
                                            <input type="button"  class="btn btn-primary" value="Add another service" onClick="addInput('dynamic');"> 
                                        </div>
                                    </div>
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

                    var div = document.createElement('div');
                    div.setAttribute('class',"form-group");
                    div.innerHTML =  "<hr><input class='form-control' name='servicenom["+counter+"]' placeholder='Nom' type='text'>";
                    var divbis = document.createElement('div');
                    divbis.setAttribute('class',"form-group");
                    divbis.innerHTML =  "<input class='form-control' name='servicecode["+counter+"]'  placeholder='Code' type='text' style='margin-left: 3px;'>";

                    document.getElementById(divName).appendChild(div);
                    document.getElementById(divName).appendChild(divbis);
                    counter++;

            }
            </script>
            @stop