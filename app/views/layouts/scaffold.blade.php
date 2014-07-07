<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stride | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/font-awesome.min.css'); }}
    {{ HTML::style('css/ionicons.min.css'); }}
    {{ HTML::style('css/morris/morris.css'); }}
    {{ HTML::style('css/jvectormap/jquery-jvectormap-1.2.2.css'); }}
    {{ HTML::style('css/fullcalendar/fullcalendar.css'); }}
    {{ HTML::style('css/daterangepicker/daterangepicker-bs3.css'); }}
    {{ HTML::style('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); }}
    {{ HTML::style('css/AdminLTE.css'); }}
    {{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
</head>
<body class="skin-black">
    <header class="header">
        @yield('header')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            @yield('sidebar')
        </aside>
        <aside class="right-side">
            @yield('main')
        </aside>
    </div>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js'); }}
     @yield('script')
    {{ HTML::script('js/plugins/datatables/jquery.dataTables.js'); }}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{ HTML::script('js/plugins/datatables/dataTables.bootstrap.js'); }}
    {{ HTML::script('js/plugins/morris/morris.min.js'); }}
    {{ HTML::script('js/plugins/sparkline/jquery.sparkline.min.js'); }}
    {{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); }}
    {{ HTML::script('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); }}
    {{ HTML::script('js/plugins/fullcalendar/fullcalendar.min.js'); }}
    {{ HTML::script('js/plugins/jqueryKnob/jquery.knob.js'); }}
    {{ HTML::script('js/plugins/daterangepicker/daterangepicker.js'); }}
    {{ HTML::script('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); }}
    {{ HTML::script('js/plugins/iCheck/icheck.min.js'); }}
    {{ HTML::script('js/AdminLTE/app.js'); }}
    {{ HTML::script('js/AdminLTE/dashboard.js'); }}
    {{ HTML::script('js/AdminLTE/demo.js'); }}
</body>
</html>