@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Service
        <small>{{{ $service->nom }}}</small>
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
                    <div class="box-title">Add units</div>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                    </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        {{ Form::open(array('action' => 'ServicesController@unitStore')) }}
                        <tr>
                            <?php $cpt = 0; ?>
                            <th></th>
                            @foreach($service->catalogue->serviceRequestTypes as $t)
                            <th>{{{ $t->nom }}}</th>
                            @endforeach
                        </tr>
                        @foreach($service->catalogue->serviceRequestComplexities as $c)
                        <tr>
                            <td>{{{ $c->nom }}}</td>
                            @foreach($service->catalogue->serviceRequestTypes as $t)
                            <?php $cpt++; ?>
                            <td>
                                <input name="input[{{{$cpt}}}][nombre]" placeholder="unit workload" type="text">
                                <input name="input[{{{$cpt}}}][serviceRequestType_id]" type="hidden" value="{{{ $t->id }}}">
                                <input name="input[{{{$cpt}}}][serviceRequestComplexity_id]" type="hidden" value="{{{ $c->id }}}">
                                <input name="input[{{{$cpt}}}][service_id]" type="hidden" value="{{{ $service->id }}}">
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </section>
    </div>
</section>
@stop
