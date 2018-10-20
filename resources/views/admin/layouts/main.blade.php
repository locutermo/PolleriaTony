<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="locutermo"> 
    <!-- Favicon icon -->

    <link href="{{ asset('plugins/images/favicon.png') }}" rel="icon" type="image/png" sizes="16x16">
    <title>Polleria Tony | Administración</title>
    <!-- Theme style -->
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/select2/dis/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
    <!-- Boostrap-->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Date Picker -->
    <link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Dropify -->
    <link href="{{ asset('bower_components/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">      
    {{-- Sweet Alert Css --}}
    <link href="{{ asset('bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    
        <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href="{{ asset('bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    

    
    

    

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div class="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.layouts.header')
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.layouts.aside')
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- /#page-wrapper -->
        <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2018 <a href="https://www.facebook.com/jose.mateo.986">Jose Mateo Carrasco</a>.</strong> All rights
                reserved.
              </footer>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    {{-- Sweet Alert J --}}
    <script src="{{ asset('bower_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/filtering/type-based/accent-neutralise.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script type="text/javascript" src="{{ asset('bower_components/dropify/dist/js/dropify.min.js') }}"></script>
   <!-- AdminLTE App -->
   <script type="text/javascript" src="{{ asset('js/adminlte.min.js') }}"></script>
   {{-- Scripts  --}}
   <script type="text/javascript" src="{{ asset('js/admin/main.js') }}"></script>

   <script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>

    
</body>

</html>
