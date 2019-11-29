@extends('includepage.template_master')
@section('content')
<h1>KPI Us</h1>
<div class="card-body"> 
  @if(Auth::check() && Auth::user()->isAdmin())
  <div class=”panel-heading”>Admin User</div>
  @else
  <div class=”panel-heading”>Normal User</div>
  @endif
</div>

  <div class="container col-12">    
      <br />
      <h3 align="center">ADD MACHINE CONFIG</h3>
      <br />
      <div align="right">
       <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
      </div>
      <br />
    <div class="table-responsive">
     <table id="user_table" class="table table-bordered table-striped">
      <thead>
       <tr>
        <th scope="row">Mc Number</th>
                 <th scope="row">Mc Name</th>
                 <th scope="row">Mc Type</th>
                 <th scope="row">Mc Brand</th>
                 <th scope="row">Mc Location</th>
                 <th scope="row">User Action</th>
                 <th scope="row">Action</th>
       </tr>
      </thead>
     </table>
    </div>
    <br />
    <br />
   </div>
  </div>


  <div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Add New Record</h4>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal">
             @csrf
   
             <div class="form-group">
               <label class="control-label col-md-4" >Mc Number </label>
               <div class="col-md-8">
                <input type="text" name="Mc Number" id="Mc_Number" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Mc Name</label>
               <div class="col-md-8">
                <input type="text" name="Mc Name" id="Mc_Name" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Mc Type</label>
               <div class="col-md-8">
                <input type="text" name="Mc Type" id="Mc_Type" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Mc Brand</label>
               <div class="col-md-8">
                <input type="text" name="Mc Brand" id="Mc_Brand" class="form-control" />
               </div>
              </div>
   
              <div class="form-group">
               <label class="control-label col-md-4">Mc Location</label>
               <div class="col-md-8">
                <input type="text" name="Mc Location" id="Mc_Location" class="form-control" />
               </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4">User Action</label>
                <div class="col-md-8">                              
                      @if(Auth::check() && Auth::user()->isAdmin())
                      <input type="text" name="Mc User" id="Mc_User" class="form-control" value=""/>
                      @else
                      <input type="text" name="Mc User" id="Mc_User" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>
                      @endif               
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
   

   <script type="text/javascript">
    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss'
    }); 
  </script>  
   
   <script>
   $(document).ready(function(){
   
    $('#user_table').DataTable({
     processing: true,
     serverSide: true,
     ajax: {
      url: "{{ route('mcs.index') }}",
     },
     columns: [
      {
       data: 'Mc_Number',
       name: 'Mc_Number'
      },
      {
       data: 'Mc_Name',
       name: 'Mc_Name'
      },
      {
       data: 'Mc_Type',
       name: 'Mc_Type'
      },
      {
       data: 'Mc_Brand',
       name: 'Mc_Brand'
      },
      {
       data: 'Mc_Location',
       name: 'Mc_Location'
      },
      {
       data: 'Mc_User',
       name: 'Mc_User'
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
   
    $('#sample_form').on('submit', function(event){
     event.preventDefault();
     var action_url = '';
   
     if($('#action').val() == 'Add')
     {
      action_url = "{{ route('mcs.store') }}";
     }
   
     if($('#action').val() == 'Edit')
     {
      action_url = "{{ route('mcs.update') }}";
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
        $('#sample_form')[0].reset();
        $('#user_table').DataTable().ajax.reload();
       }
       $('#form_result').html(html);
      }
     });
    });
   
    $(document).on('click', '.edit', function(){
     var id = $(this).attr('id');
     $('#form_result').html('');
     $.ajax({
      url :"/mcs/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
       $('#Mc_Number').val(data.result.Mc_Number);
       $('#Mc_Name').val(data.result.Mc_Name);
       $('#Mc_Type').val(data.result.Mc_Type);
       $('#Mc_Brand').val(data.result.Mc_Brand);
       $('#Mc_Location').val(data.result.Mc_Location);
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
      url:"mcs/destroy/"+user_id,
      beforeSend:function(){
       $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
       setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#user_table').DataTable().ajax.reload();
        alert('Data Deleted');
       }, 2000);
      }
     })
    });
   
   });
   </script>

@include('masterpage.scriptfooter')
  <!-- *************************************************************************************************************************** -->
@endsection     
  <!-- *************************************************************************************************************************** -->
