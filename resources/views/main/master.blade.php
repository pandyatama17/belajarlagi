<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Plugins -->
    <link href="{{ asset("/bower_components/AdminLTE/plugins/bootstrap-slider/slider.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/iCheck/all.css")}}" rel="stylesheet" type="text/css" />
    <style media="screen">
      .clear
      {
        clear: both;
      }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('main.header')

    <!-- Sidebar -->
    @include('main.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('main.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
<!--plugins-->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/bootstrap-slider/bootstrap-slider.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
<!-- Custom Script -->
<script type="text/javascript">
  $(document).ready(function()
  {
    var progressChange = function()
    {
    	$('#task-value').text(taskSlider.getValue()+'%');
      if (taskSlider.getValue() < 25)
      {
            $('#taskSlider .slider-selection').css('background','#f56954');
      }
      else if (taskSlider.getValue() >= 25 && taskSlider.getValue() < 50)
      {
            $('#taskSlider .slider-selection').css('background','#f39c12');
      }
      else if (taskSlider.getValue() >= 50 && taskSlider.getValue() < 75)
      {
            $('#taskSlider .slider-selection').css('background','#00a65a');
      }
      else if(taskSlider.getValue() >= 75){
          $('#taskSlider .slider-selection').css('background','#3c8dbc');
      }
    };
    var taskSlider = $('#task-slider').slider()
                                      .on('slide',progressChange)
                                      .data('slider');

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].danger, input[type="radio"].danger').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-red'
    });
    //icheck warning
    $('input[type="checkbox"].warning, input[type="radio"].warning').iCheck
    ({
       checkboxClass: 'icheckbox_square-orange',
       radioClass: 'iradio_square-orange',
       increaseArea: '20%' // optional
     });
     //icheck success
     $('input[type="checkbox"].success, input[type="radio"].success').iCheck
     ({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
      });
      //icheck info
      $('input[type="checkbox"].info, input[type="radio"].info').iCheck
      ({
         checkboxClass: 'icheckbox_square-blue',
         radioClass: 'iradio_square-blue',
         increaseArea: '20%' // optional
       });

       $( '#createTask' ).on( 'submit', function(e)
       {
         e.preventDefault();
         var name = $('#task-name').val();
         var progress = taskSlider.getValue();
         var type = $('input[name=type]:checked').val();
         $.ajax({
               type: "POST",
               url: $('#createTask').attr('action'),
               data: {name:name, progress:progress, type:type},
               success: function( msg ) {
               alert( msg );
               }
           });
      });
  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>
