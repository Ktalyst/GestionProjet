@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')

<section class="content-header">
    <h1>
        Contrats
        <small>Contrat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('contrats.index') }}"><i class="fa fa-list"></i> List</a></li>
        <li class="active">Create</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <section class="col-xs-12 connectedSortable"> 
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box-title">Create contrat</div>
                </div>     
                {{ Form::open(array('route' => 'contrats.store')) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('Client:') }} 
                        <select class="form-control" id="client_id" name="client_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($selectclient as $key => $client)
                            <option value={{{ $key }}}>{{{ $client }}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Contact:') }} 
                        <select class="form-control" id="contact_id" name="contact_id">
                            <option selected disabled>Please Select</option>
                            @foreach ($selectclient as $key => $client)
                            <!--<option value={{{ $key }}}>{{{ $client }}}</option>-->
                            @endforeach
                        </select>
                        <div class="form-group">
                            {{ Form::label('nom', 'Nom:', array('class'=>'control-label')) }} 
                            {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('code', 'Code:', array('class'=>'control-label')) }}
                            {{ Form::text('code', Input::old('code'), array('class'=>'form-control', 'placeholder'=>'Code')) }}
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </section>
    @stop

@section('script')

<script type="text/javascript">
jQuery(document).ready(
    function($){
        $('#client_id').change(function(){
            $.get("{{ url('api/dropdown')}}",
            { option: $(this).val() },
            function(data) {
                var contact = $('#contact_id');
                contact.empty();
                $.each(data, function(index,element) {
                    contact.append("<option value='"+ index +"''>" + element + "</option>");
            });
        });
    });
});
</script>
@stop
