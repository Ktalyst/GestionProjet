@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Service Request
        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create service request</div>
                </div>     
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif

                    {{ Form::open(array('route' => 'servicerequests.store', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        {{ Form::label('Item:') }} 
                        <select class="form-control" id="item_id" name="item_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($selectitem as $key => $item)
                            <option value={{{ $key }}}>{{{ $item }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Catalogue:') }} 
                        <select class="form-control" id="catalogue_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($selectcatalogue as $key => $catalogue)
                            <option value={{{ $key }}}>{{{ $catalogue }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nom', 'Name:', array('class'=>'control-label')) }} 
                        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Service Request Type:') }} 
                        <select class="form-control" id="servicerequesttype_id" name="servicerequesttype_id">
                            <option selected disabled>Please Select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Service Request Complexity:') }} 
                        <select class="form-control" id="servicerequestcomplexity_id" name="servicerequestcomplexity_id">
                            <option selected disabled>Please Select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Services:') }} 
                        <div id="service_id"></div>
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
                    var service = $('#service_id');
jQuery(document).ready(
    function($){
        $('#catalogue_id').change(function(){
            $.get("{{ url('api/dropdownCatalogue')}}",
                { option: $(this).val() },
                function(data) {
                    var servicerequesttype = $('#servicerequesttype_id');
                    var servicerequestcomplexity = $('#servicerequestcomplexity_id');
                    servicerequesttype.empty();
                    servicerequestcomplexity.empty();
                    service.empty();
                    $.each(data["types"], function(index,element) {
                        servicerequesttype.append("<option value='"+ index +"''>" + element + "</option>");
                    });
                    $.each(data["complexities"], function(index,element) {
                        servicerequestcomplexity.append("<option value='"+ index +"''>" + element + "</option>");
                    });
                    $.each(data["services"], function(index,element) {
                        service.append("<input name='service["+ index +"]' type='checkbox' value='" + element + "' />"+ element +" <input name='uo["+ index +"]' type='text' >");
                    });
                });
        });
        $('#service_id').change(function(){
            var check = document.getElementsByTagName("input");
            for(var i = 0; i < check.length; i++)
            {
                if(check[i].checked){
                    check[i].outerHTML.after($("<input type='text' >"));
                }
            }
        });
    });
</script>
@stop



