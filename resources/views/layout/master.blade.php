<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="current-route" content="{{ Route::currentRouteName() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TItle</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free-6.5.1-web/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Customs -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @if (Request::segment(1) == 'login' || Request::segment(1) == 'register')
        @yield('content')
    @else
        <div class="wrapper">
            @if (Auth::check() && Auth::user()->role == 'admin')
                @include('layout.navbar_admin')
                @include('layout.sidebar')
                <div class="content-wrapper p-2">
                    @yield('content')
                </div>
                @include('layout.footer')
            @else
                @include('layout.navbar_mahasiswa')
                @yield('content')
                @include('layout.footer') 
            @endif
        </div>
    @endif

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Filter Table -->
    <script src="{{ asset('helpers/filterTable.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- validation -->
    <script src="{{ asset('helpers/validation.js') }}"></script>
    <!-- File Path Upload -->
    <script src="{{ asset('helpers/filePathUpload.js') }}"></script>
    <!-- Datepicker -->
    <script>
        $(function() {
            $('#reservationdate, #reservationdate1, #reservationdate2').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $("#filterButton").click(function(){
                var selectedDate = $("#datePicker").val();

                $.ajax({
                    url: 'filter.php',
                    method: 'POST',
                    data: { selectedDate: selectedDate },
                    success: function(response){
                        $("#result").html(response);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
            });
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "scrollX": true,
                "buttons": [{
                    text: 'Tambah Data &ensp; <i class="fa-solid fa-plus"></i>',
                    action: function(e, dt, node, config) {
                        window.location.href = '{{ route('create_prestasi') }}';
                    }
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1_wrapper .dataTables_filter input, #tableLomba_wrapper .dataTables_filter input').css({
                'width': 'auto',
                'height': 'auto'
            });
            $("#tableLomba").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "scrollX": false,
                "buttons": [{
                    text: 'Tambah Data &ensp; <i class="fa-solid fa-plus"></i>',
                    action: function(e, dt, node, config) {
                        window.location.href = '{{ route('lomba.create') }}';
                    }
                }]
            }).buttons().container().appendTo('#tableLomba_wrapper .col-md-6:eq(0)');
            $("#example2").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "scrollX": true
            })
        })
    </script>
    <!-- autofill -->
    <script>
        $(document).ready(function () {
            $('#nim').on('blur', function () {
                var nim = $(this).val();
                if (nim !== '') {
                    $.ajax({
                        url: '{{ route('autofill') }}',
                        method: 'GET',
                        data: { nim: nim },
                        success: function (data) {
                            if (data) {
                                $('#namaMahasiswa').val(data.nama);
                                $('#tahunAngkatan').val(data.tahunAngkatan);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
