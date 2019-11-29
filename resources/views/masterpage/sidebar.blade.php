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
   
    <li class="active treeview">
        <a href="/kpi">
          <i class="fa fa-dashboard"></i>  <span>KPI Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/about"><i class="fa fa-circle-o"></i>1.Safety accidents</a></li>
          <li><a href="/test"><i class="fa fa-circle-o"></i>2.Quality Complaints</a></li>
          <li><a href="/mcs"><i class="fa fa-circle-o"></i>3.Internal PPM</a></li>
          <li><a href="/kpi"><i class="fa fa-circle-o"></i>4.OEE Critical Equipment</a></li>
          <li><a href="*.html"><i class="fa fa-circle-o"></i>5.OLE Labor Productivity</a></li>             
        </ul>
    </li>

    <li class="">  
          <a href="/mcs">
          <i class="fa fa-industry"></i>
          <span>MC Config</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>
          </span>
        </a>
    </li> 

    <li class="">    
      <a href="/HeaderSettings">
        <i class="fa fa-cubes"></i>
        <span>Header Settings</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right"></span>
        </span>
      </a>
      <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i>1.Safety accidents</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i>
          <span>Operator Settings</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>
          </span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-user-o"></i>
          <span>User Managements</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="/UserUpload"><i class="fa fa-circle-o"></i>1.Upload Emp</a></li>
                   
          </ul>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-lightbulb-o"></i>
          <span>Operator Training (RFID)</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right"></span>
          </span>
        </a>
       
    </li>
    
    
    
  
  </ul>