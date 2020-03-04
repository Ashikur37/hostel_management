<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
  @if(auth()->user()->type==8)
  Admission
  @elseif(auth()->user()->type==9)
  Accountant
  @else
  Admin
  @endif
  |Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
p{
  font-size:18px;
  color:#fff;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{count($notifications)}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " style="overflow:auto">
          <span class="dropdown-item dropdown-header">{{count($notifications)}} Notifications</span>
          <div class="dropdown-divider"></div>
          @foreach ($notifications as $notification)
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$notification->message}}
            <span class="float-right text-muted text-sm">{{$notification->created_at}}</span>
            
          </a>
          <div class="dropdown-divider"></div>
          @endforeach
          
          
         
        </div>
      </li>
      <li class="nav-item">
            <a style="font-size:19px;font-weight:bold;color:blue" class="nav-link" href="/logout">
                Logout
            </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
 
      <span class="brand-text font-weight-light">HMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(auth()->user()->type!=8&&auth()->user()->type!=9)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Application
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/unapproved-application" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Unapproved Application</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/approved-application" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Approved Application</p>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Leave Application
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/leave-list" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Application List</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Room
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/add-room" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Room</p>
                  </a>
                </li>
                  <li class="nav-item">
                    <a href="/room-list" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Room List</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Student Information
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  @if(auth()->user()->type==8)
              <li class="nav-item">
                <a href="/add-student-data" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student Data</p>
                </a>
              </li>
              @endif
                <li class="nav-item">
                  <a href="/student-data-list" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Data</p>
                  </a>
                </li>
              </ul>
            </li>
            @if(auth()->user()->type==9)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Payments
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/pending-payment" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Payments</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/payment-history" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payment History</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/due-payment" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Due Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/clear-payment" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Clear Payment</p>
                    </a>
                  </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Canteen
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/pending-payment-canteen" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Canteen Payments</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/payment-history-canteen" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Canteen Payment History</p>
                    </a>
                  </li>
              </ul>
            </li>
            @endif
            @if(auth()->user()->type!=8&&auth()->user()->type!=9)
            
            
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Notice
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/notice-list" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Notices</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/add-notice" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Notice</p>
                      </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Messages
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/admin-inbox" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inbox</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
         @endif

         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">  @if(auth()->user()->type==8)
  Admission
  @elseif(auth()->user()->type==9)
  Accountant
  @else
  Warden
  @endif Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#dt").DataTable();
  });
</script>
</body>
</html>
