@extends('includepage.template_master')
@section('content')


<!--<div class="row ">-->
    <div class="box box-success">     
      <div class="box-body">
              <div class="lockscreen-logo">
              <h1 class="bold" align="center">SAFETY CONFIG</h1>
              </div>
      </div>   
    </div>


<div class="box box-success form-group">
    <div class="box-header with-border">
      <h3 class="box-title">INPUT CONFIG</h3>
</div>
<div class="box-body">
  <div align="right">
   <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
  </div>
  <br />
<div class="table-responsive">
 <table id="user_tableshi" class="table table-bordered table-striped">
  <thead>
  <tr class="bg-green color-palette">
    <th scope="row" class="text-center">Sf. Date</th>
    <th scope="row" class="text-center">Sf. Enid</th>
    <th scope="row" class="text-center">Sf. Name</th>
    <th scope="row" class="text-center">Sf. Type</th>
    <th scope="row" class="text-center">Sf. Remark</th>
    <th scope="row" class="text-center">User Action</th>
    <th scope="row" class="text-center">Action</th>
   </tr>
  </thead>
 </table>
</div>
<br />
<br />

</div>
          <!-- /input-group -->
        </div>
        <!-- /.box-body -->
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
          <form method="post" id="sample_formshi" class="form-horizontal">
            @csrf
 
           <div class="form-group">
             <label class="control-label col-md-4" >Date</label>
             <div class="col-md-8">
              <input type="text" name="Dates" id="Dates" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Enid</label>
             <div class="col-md-8">
              <input type="text" name="Enid" id="Enid" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Name</label>
             <div class="col-md-8">
              <input type="text" name="Name" id="Name" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Type Safety</label>
             <div class="col-md-8">
              <input type="text" name="Type" id="Type" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
            <label class="control-label col-md-4">Remark</label>
            <div class="col-md-8">
                <input type="text" name="Remark" id="Remark" class="form-control" />
            </div>
            </div>
 
               
            <div class="form-group">
              <label class="control-label col-md-4">User Action</label>
              <div class="col-md-8">                              
                 
                    <input type="text" name="User" id="User" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>
                              
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
     var jq = $.noConflict(); 
  jq(document).ready(function(){
  
   jq('#user_tableshi').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
     url: "{{route('sft.index')}}",
    },
    columns: [
     {
      data: 'Sf_Date',
      name: 'Sf_Date'
     },
     {
      data: 'Sf_Enid',
      name: 'Sf_Enid'
     },
     {
      data: 'Sf_Name',
      name: 'Sf_Name'
     },
     {
      data: 'Sf_TypeSafetie',
      name: 'Sf_TypeSafetie'
     },
     {
      data: 'Sf_Remark',
      name: 'Sf_Remark'
     },
     {
      data: 'Sf_User',
      name: 'Sf_User'
     },
     {
      data: 'action',
      name: 'action',
      orderable: false
     }
    ]
   });
  
   jq('#create_record').click(function(){
    jq('#Sh_Name').attr('readonly', false);
    jq('.modal-title').text('Add New Record');
    jq('#action_button').val('Add');
    jq('#action').val('Add');
    jq('#form_result').html('');
  //  jq('#Sh_Name').val('');
   // jq('#Sh_Type').val('');
   // jq('#Sh_Timestart').val('');
   // jq('#Sh_Timestop').val('');
   // jq('#Sh_Status').val('');
    jq('#formModal').modal('show');
   });
  
   jq('#sample_formshi').on('submit', function(event){
    event.preventDefault();
    var action_url = '';
  
    if(jq('#action').val() == 'Add')
    {
     action_url = "{{ route('sft.store') }}";
    }
  
    if(jq('#action').val() == 'Edit')
    {
     action_url = "{{ route('sft.update') }}";
    }
  
    jq.ajax({
     url: action_url,
     method:"POST",
     data:jq(this).serialize(),
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
       jq('#sample_formshi')[0].reset();
       jq('#user_tableshi').DataTable().ajax.reload();
      }
      jq('#form_result').html(html);
     }
    });
   });
  
   jq(document).on('click', '.edit', function(){
      var id = jq(this).attr('id');
      jq('#form_result').html('');
	    jq('#User').attr('readonly', true);
    
      jq.get("{{ route('sft.index') }}" +'/' + id +'/edit', function (data) {
      jq('#Dates').val(data.result.Sf_Date);
      jq('#Enid').val(data.result.Sf_Enid);
      jq('#Name').val(data.result.Sf_Name);
      jq('#Type').val(data.result.Sf_TypeSafetie);
      jq('#Remark').val(data.result.Sf_Remark);
      jq('#User').val(data.result.Sf_User);
      jq('#hidden_id').val(id);
      jq('.modal-title').text('Edit Record');
      jq('#action_button').val('Edit');
      jq('#action').val('Edit');
      jq('#formModal').modal('show');
      })
     });

   var user_id;
  
   jq(document).on('click', '.delete', function(){
    user_id = jq(this).attr('id');
    jq('#confirmModal').modal('show');
   });
  
   jq('#ok_button').click(function(){
    jq.ajax({
     url:"sft/destroy/"+user_id,
     beforeSend:function(){
      jq('#ok_button').text('Deleting...');
     },
     success:function(data)
     {
      setTimeout(function(){
       jq('#confirmModal').modal('hide');
       jq('#user_tableshi').DataTable().ajax.reload();
       alert('Data Deleted');
      }, 2000);
     }
    })
   });
  
  });
  </script>

<script type="text/javascript">
    var jqd = $.noConflict(); 
    var defaultDate = new Date(); 
      // var defaultDate = '2019/11/01'
      jqd(function () {
      jqd('#Dates').datetimepicker({
              format: 'YYYY-MM-DD HH:mm:ss',
              defaultDate: defaultDate
          });
                
      });
    </script>
@endsection     
 
