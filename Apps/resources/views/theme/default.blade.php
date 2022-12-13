<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi Klinik Hewan</title>
  <link rel="icon" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/adminlte/dist/css/adminlte.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/toastr/toastr.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- summernote --> 
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/summernote/summernote-bs4.css') }}">

  <link rel="stylesheet" href="{{ url('/adminlte/plugins/fullcalendar/main.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ url('/adminlte/plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ url('/adminlte/plugins/fullcalendar-bootstrap/main.min.css') }}"> -->

    <link rel="stylesheet" href="{{ url('/adminlte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="{{ url('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ url('/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-purple navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php //echo $this->uri->segment(2);?>

  <aside class="main-sidebar sidebar-light-blue elevation-4 sidebar-collapse">
    @include('theme.sidebar')
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<!-- <script src="{{ url('/adminlte/plugins/sparklines/sparkline.js"></') }}script> -->
<!-- JQVMap -->
<!-- <script src="{{ url('/adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></') }}script> -->
<script src="{{ url('/adminlte/plugins/moment/moment.min.js') }}"></script>
<!-- <script src="{{ url('/adminlte/plugins/fullcalendar/main.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/fullcalendar-bootstrap/main.min.js') }}"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{ url('/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{ url('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></') }}script> -->
<!-- Summernote -->
<script src="{{ url('/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('/adminlte/plugins/toastr/toastr.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/adminlte/dist/js/pages/apps_dash.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ url('/adminlte/dist/js/demo.js') }}"></script>
<script>
  $(function(){
    $('.select2').select2({
      theme: 'bootstrap4',
      width: '100%'
    });
  })

</script>

@stack('scripts')
</body>
</html>
