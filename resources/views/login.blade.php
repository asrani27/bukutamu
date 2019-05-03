
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SENNA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('LTE/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('LTE/dist/css/skins/_all-skins.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('/') }}" class="navbar-brand">Home</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse"> 
         
        </div>
        <div class="navbar-custom-menu">
       
        </div>

        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
      
    <div class="row">
    </div>
    <center><img class="" src="{{url('LTE/logo1.png')}}">
        <h2 class="widget-user-username"><b>APLIKASI BPN</b></h2>
        <h4 class="widget-user-desc"><b>Kalimantan Selatan</b></h4></center>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
        <div class="box box-primary">
            <div class="box-body">
               <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-4">
                    </div>
                  </div>
            </div>
            <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><b>Login</b></button>
            </div>
        </form>
        </div>
          </div>
          <!-- /.widget-user -->
        </div>
    </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="{{url('LTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('LTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('LTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('LTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('LTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('LTE/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;
          
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
  
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
              
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
  
      }
    @endif
</script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>
