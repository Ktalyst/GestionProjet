@extends('layouts.scaffold')

@include('layouts.header')

@include('layouts.sidebar')

@section('main')
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('accueil') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-6 connectedSortable">
            <div class="box box-warning">
                <div class="box-header" style="cursor: move;">
                    <i class="fa fa-calendar"></i>
                    <div class="box-title">Calendar</div>

                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Add new event</a></li>
                            </ul>
                        </div>
                    </div><!-- /. tools -->                                    
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <!--The calendar -->
                    <div id="calendar"></div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>

</section><!-- /.content -->
@stop
@section('script')
<script type="text/javascript">

        $(document).ready(function()
        {
            /*
                date store today date.
                d store today date.
                m store current month.
                y store current year.
            */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            
            /*
                Initialize fullCalendar and store into variable.
                Why in variable?
                Because doing so we can use it inside other function.
                In order to modify its option later.
            */
            
            var calendar = $('#calendar').fullCalendar(
            {
                /*
                    header option will define our calendar header.
                    left define what will be at left position in calendar
                    center define what will be at center position in calendar
                    right define what will be at right position in calendar
                */
                header:
                {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                /*
                    defaultView option used to define which view to show by default,
                    for example we have used agendaWeek.
                */
                defaultView: 'month',
                /*
                    selectable:true will enable user to select datetime slot
                    selectHelper will add helpers for selectable.
                */
                selectable: true,
                selectHelper: true,
                /*
                    when user select timeslot this option code will execute.
                    It has three arguments. Start,end and allDay.
                    Start means starting time of event.
                    End means ending time of event.
                    allDay means if events is for entire day or not.
                */
                select: function(start, end, allDay)
                {
                    /*
                        after selection user will be promted for enter title for event.
                    */
                    var title = prompt('Event Title:');
                    /*
                        if title is enterd calendar will add title and event into fullCalendar.
                    */
                    if (title)
                    {
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true // make the event "stick"
                        );
                    }
                    calendar.fullCalendar('unselect');
                },
                /*
                    editable: true allow user to edit events.
                */
                editable: true,
                /*
                    events is the main option for calendar.
                    for demo we have added predefined events in json object.
                */
                events: [
  
                ]
            });
            
        });

    </script>
    @stop