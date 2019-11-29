<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'KPI Report') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome --> 
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/AdminLTE.min.css') }}">



  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/skins/_all-skins.min.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  
   <!-- Google Font -->
   <link rel="stylesheet"
   href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>
<body class="hold-transition skin-green sidebar-mini sidebar-collapse">

   
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/mcconfig" class="logo">
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
    
    @include('masterpage.sidebar')
   
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page 0content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
         <!-- Dashboard-->
      </h1>
        <!-- <small>Kpi Report Version 1.0</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <!--  <li class="active">Dashboard</li>-->
      </ol>
  
    </section>

    <!-- Main content -->  
    <div class="container col-12">    
        <br />
        <h3 align="center">ADD MACHINE CONFIG</h3>
        <br />
        <div align="right">
         <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
        </div>
        <br />
      <div class="table-responsive">
       <table id="user_tableshi" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th scope="row">Sh_Name</th>
          <th scope="row">Sh_Type</th>
          <th scope="row">Sh_Timestart</th>
          <th scope="row">Sh_Timestop</th>
          <th scope="row">Sh_Status</th>
          <th scope="row">Sh_User</th>
           <th scope="row">Action</th>
         </tr>
        </thead>
       </table>
      </div>
      <br />
      <br />
     </div>
    </div>
    <!-- /.content -->

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

  <!-- jQuery 3 -->

  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('AdminLTE-master/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('AdminLTE-master/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('AdminLTE-master/dist/js/adminlte.min.js') }}"></script>




</body>
</html>
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Add New Record</h4>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_formshi" class="form-horizontal">
             @csrf
   
             <div class="form-group">
               <label class="control-label col-md-4" >Sh_Name</label>
               <div class="col-md-8">
                <input type="text" name="Sh_Name" id="Sh_Name" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Sh_Type</label>
               <div class="col-md-8">
                <input type="text" name="Sh_Type" id="Sh_Type" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Sh_Timestart</label>
               <div class="col-md-8">
                <input type="text" name="Sh_Timestart" id="Sh_Timestart" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Sh_Timestop</label>
               <div class="col-md-8">
                <input type="text" name="Sh_Timestop" id="Sh_Timestop" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Sh_Status</label>
               <div class="col-md-8">
                <input type="text" name="Sh_Status" id="Sh_Status" class="form-control" />
               </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4">Sh_User</label>
                <div class="col-md-8">                              
                   
                      <input type="text" name="Sh_User" id="Sh_User" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>
                                
                </div>
               </div> 
              
                   <br />
                   <div class="form-group" align="center">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                   </div>
            </form>
           </div>
        </div>
       </div>
   </div>
   
   <div id="confirmModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h2 class="modal-title">Confirmation</h2>
               </div>
               <div class="modal-body">
                   <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
               </div>
               <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
           </div>
       </div>
   </div>
   
   
   <script>
   $(document).ready(function(){
   
    $('#user_tableshi').DataTable({
     processing: true,
     serverSide: true,
     ajax: {
      url: "{{route('shi.index')}}",
     },
     columns: [
      {
       data: 'Sh_Name',
       name: 'Sh_Name'
      },
      {
       data: 'Sh_Type',
       name: 'Sh_Type'
      },
      {
       data: 'Sh_Timestart',
       name: 'Sh_Timestart'
      },
      {
       data: 'Sh_Timestop',
       name: 'Sh_Timestop'
      },
      {
       data: 'Sh_Status',
       name: 'Sh_Status'
      },
      {
       data: 'Sh_User',
       name: 'Sh_User'
      },
      {
       data: 'action',
       name: 'action',
       orderable: false
      }
     ]
    });
   
    $('#create_record').click(function(){
     $('.modal-title').text('Add New Record');
     $('#action_button').val('Add');
     $('#action').val('Add');
     $('#form_result').html('');
   
     $('#formModal').modal('show');
    });
   
    $('#sample_formshi').on('submit', function(event){
     event.preventDefault();
     var action_url = '';
   
     if($('#action').val() == 'Add')
     {
      action_url = "{{ route('shi.store') }}";
     }
   
     if($('#action').val() == 'Edit')
     {
      action_url = "{{ route('shi.update') }}";
     }
   
     $.ajax({
      url: action_url,
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      success:function(data)
      {
       var html = '';
       if(data.errors)
       {
        html = '<div class="alert alert-danger">';
        for(var count = 0; count < data.errors.length; count++)
        {
         html += '<p>' + data.errors[count] + '</p>';
        }
        html += '</div>';
       }
       if(data.success)
       {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        $('#sample_formshi')[0].reset();
        $('#user_tableshi').DataTable().ajax.reload();
       }
       $('#form_result').html(html);
      }
     });
    });
   
    $(document).on('click', '.edit', function(){
     var id = $(this).attr('id');
     $('#form_result').html('');
     $.ajax({
      url :"/shi/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
       $('#Sh_Name').val(data.result.Sh_Name);
      // $('#Mc_Name').val(data.result.Mc_Name);
      // $('#Mc_Type').val(data.result.Mc_Type);
     //  $('#Mc_Brand').val(data.result.Mc_Brand);
      // $('#Mc_Location').val(data.result.Mc_Location);
       $('#hidden_id').val(id);
       $('.modal-title').text('Edit Record');
       $('#action_button').val('Edit');
       $('#action').val('Edit');
       $('#formModal').modal('show');
      }
     })
    });
   
    var user_id;
   
    $(document).on('click', '.delete', function(){
     user_id = $(this).attr('id');
     $('#confirmModal').modal('show');
    });
   
    $('#ok_button').click(function(){
     $.ajax({
      url:"shi/destroy/"+user_id,
      beforeSend:function(){
       $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
       setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#user_tableshi').DataTable().ajax.reload();
        alert('Data Deleted');
       }, 2000);
      }
     })
    });
   
   });
   </script>
