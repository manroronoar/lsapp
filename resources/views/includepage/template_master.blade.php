<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
    @include('includepage.headmaster')
</head>
<body class="hold-transition skin-green sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/kpi" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KPI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KPI</b> Report</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">     
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="AdminLTE-master/dist/img/avatar04.png" class="user-image" alt="User Image">
                    <span class="hidden-xs">  {{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="AdminLTE-master/dist/img/avatar04.png" class="img-circle" alt="User Image">
      
                      <p>
                        {{ Auth::user()->name }}
                        <small>
                          @if(Auth::check() && Auth::user()->isAdmin())
                          <div class=”panel-heading”>User Admin</div>
                          @else
                          <div class=”panel-heading”>User Normal</div>
                          @endif</small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                   <!-- <li class="user-body">
                      <div class="row">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </div> -->
                      <!-- /.row -->
                   <!--  </li>-->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                     <!--  <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>-->
                      <div class="pull-right">                                        
                       <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                   </form>
                      </div>
                    </li>
                  </ul>
                </li>
            </ul>

      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    
      <!-- Sidebar user panel -->
      @include('includepage.sidebar')
   
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page 0content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> 
      <h1>
         KPI application
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">{{$urlname ?? ''}}</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    <!--  <b>Version</b> 2.4.18 -->
    </div>
   <!-- <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights 
    reserved.-->
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@include('includepage.scriptfooter')
</body>
</html>
