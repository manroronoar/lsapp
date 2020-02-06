<section class="sidebar">
<div class="user-panel">
    <div class="pull-left image">
      <img src="AdminLTE-master/dist/img/avatar04.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header center">MAIN KPI</li>
   
    <!--<li class="active treeview">-->
    <li class="treeview">
        <a href="">
          <i class="fa fa-dashboard"></i>  <span>KPI Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('sft.index') }}"><i class="fa fa-circle-o"></i>1.Safety accidents</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>2.Quality Complaints</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>3.Internal PPM</a></li>
         <!-- <li><a href="{{ route('oee.index') }}"><i class="fa fa-circle-o"></i>3.OEE</a></li>-->
         <li><a href=""><i class="fa fa-circle-o"></i>3.OEE</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>5.OLE </a></li>        
          <li><a href="{{ url('motmc') }}"><i class="fa fa-circle-o"></i>6.Monitor MC.</a></li>      
        </ul>
    </li>

   

    <li class="treeview">
          <a href="">
          <i class="fa fa-industry"></i> <span>MC Config</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('nod.index') }}"><i class="fa fa-circle-o"></i>1.Config Nodes</a></li>
            <li><a href="{{ route('mcs.index') }}"><i class="fa fa-circle-o"></i>2.Config Machines </a></li>
            <li><a href="{{ route('bit.index') }}"><i class="fa fa-circle-o"></i>3.Config Typebit</a></li>
            <li><a href="{{ route('dtc.index') }}"><i class="fa fa-circle-o"></i>4.Config Downtime</a></li>
            <li><a href="{{ route('sti.index') }}"><i class="fa fa-circle-o"></i>5.Config Setuptime</a></li>
          </ul>
    </li> 

    <li class="treeview">    
      <a href="">
        <i class="fa fa-cubes"></i>
        <span>Header Settings</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li><a href="{{ route('hsi.index') }}"><i class="fa fa-circle-o"></i>1.Header Settings</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Operator Settings</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('shi.index') }}"><i class="fa fa-circle-o"></i>1.Config Shift</a></li>
          </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-user-o"></i>
          <span>User Managements</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/UserUpload"><i class="fa fa-circle-o"></i>1.Upload Emp</a></li>
            <li><a href="/UserUpload"><i class="fa fa-circle-o"></i>2..OperatorTraining</a></li>
                   
          </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-lightbulb-o"></i>
          <span>Other Seting</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('loc.index') }}"><i class="fa fa-circle-o"></i>1.Config Location</a></li>
            <li><a href="{{ route('seq.index') }}"><i class="fa fa-circle-o"></i>2.Config Quality(OEE)</a></li>        
          </ul> 
    </li>
    
    
    
  
  </ul>
</section>