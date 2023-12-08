<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free-6.5.1-web/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Customs -->
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- navbar -->
  @include('layout.navbar')
  <!-- sidebar -->
  @include('layout.sidebar')
  <!-- content -->
  @yield('content')
  <!-- footer -->
  @include('layout.footer')
  <!-- control -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('template/plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist/js/adminlte.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset ('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset ('template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset ('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset ('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset ('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Filter Table -->
<script src="{{asset ('helpers/filterTable.js')}}"></script>
<!-- Datepicker -->
<script>
  $(function () {
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": true, "scrollX": true,
      "buttons": [
        {
          text: 'Tambah Data &ensp; <i class="fa-solid fa-plus"></i>',
          action: function(e, dt, node, config) {
              window.location.href = '{{route('create_prestasi')}}';
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example1_wrapper .dataTables_filter input').css({
      'width': 'auto', 
      'height': 'auto' 
    });

    $("#example2").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": true,"scrollX": true,
    })
  })
</script>


<!-- jquery-validation -->
<script src="{{ asset('template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- validation -->
<script src="{{asset ('helpers/validation.js')}}"></script>
<!-- File Path Upload -->
<script src="{{asset ('helpers/filePathUpload.js')}}"></script>
</body>
</html>