<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>
  
  
  <link href="{{asset('admin-temp/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom fonts for this template-->
  <link href="{{asset('admin-temp/vendor/font-awesome_4-7/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin-temp/dist/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('admin-temp/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('admin-temp/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('admin-temp/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('admin-temp/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Page level plugin CSS-->
  <link href="{{asset('admin-temp/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin-temp/css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{asset('admin-temp/css/profil.css')}}" rel="stylesheet">
  <link href="{{asset('admin-temp/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
  <style>
        table.table form {
            display: inline-block;
        }
        button.delete {
            background: transparent;
            border:none;
            color: #337a7;
            padding: 0px;
        }
    </style>
</head>

<body id="page-top">

  @include('partials._head-navbar')

  <div id="wrapper">

    <!-- Sidebar -->
   @include('partials._sidebar')

   @yield('content')
    <!-- /.content-wrapper -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2019</span>
      </div>
    </div>
  </footer>
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin-temp/vendor/jquery/jquery.js')}}"></script>
  <script src="{{asset('admin-temp/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin-temp/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
 <!--  <script src="{{asset('admin-temp/vendor/chart.js/Chart.min.js')}}"></script> -->
  <script src="{{asset('admin-temp/plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-temp/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-temp/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin-temp/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin-temp/js/sb-admin.min.js')}}"></script>
  <script src="{{asset('admin-temp/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-temp/plugins/iCheck/icheck_2.js')}}" type="text/javascript"></script>

  <script src="{{asset('admin-temp/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript">
  </script>
  <script src="{{asset('admin-temp/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-temp/dist/js/scripts.js')}}" type="text/javascript"></script>
  <!-- <script src="{{asset('admin-temp/js/demo/chart-area-demo.js')}}"></script> -->
  <script src="{{asset('admin-temp/js/demo/datatables-demo.js')}}"></script>
  <!-- Demo scripts for this page-->

</body>

</html>
