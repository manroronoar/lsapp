@extends('includepage.template_master')
@section('content')


<!--<div class="row ">-->
    <div class="box box-success">     
      <div class="box-body">
              <div class="lockscreen-logo">
              <h1 class="bold" align="center">CUSTOMER COMPLAINTS</h1>
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
    <th scope="row" class="text-center">Mc.Number</th>
    <th scope="row" class="text-center">CustName</th>
    <th scope="row" class="text-center">Type</th>
    <th scope="row" class="text-center">Remark</th>
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
             <label class="control-label col-md-4">Mc.Name</label>
             <div class="col-md-8">
              <input type="text" name="mcnumber" id="mcnumber" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Customer Name</label>
             <div class="col-md-8">
              <input type="text" name="custname" id="custname" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Type Complaints</label>
             <div class="col-md-8">
              <input type="text" name="type" id="type" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
            <label class="control-label col-md-4">Remark</label>
            <div class="col-md-8">
                <input type="text" name="remark" id="remark" class="form-control" />
            </div>
            </div>
 
               
            <div class="form-group">
              <label class="control-label col-md-4">User Action</label>
              <div class="col-md-8">                              
                 
                    <input type="text" name="user" id="user" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>
                              
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
     url: "{{route('cust.index')}}",
    },
    columns: [
     {
      data: 'Cc_Mcnumber',
      name: 'Cc_Mcnumber'
     },
     {
      data: 'Cc_Namecust',
      name: 'Cc_Namecust'
     },
     {
      data: 'Cc_Type',
      name: 'Cc_Type'
     },
     {
      data: 'Cc_Remark',
      name: 'Cc_Remark'
     },
     {
      data: 'Cc_User',
      name: 'Cc_User'
     },
     {
      data: 'action',
      name: 'action',
      orderable: false
     }
    ]
   });
  
   jq('#create_record').click(function(){
    jq('#user').attr('readonly', false);
    jq('.modal-title').text('Add New Record');
    jq('#action_button').val('Add');
    jq('#action').val('Add');
    jq('#form_result').html('');
    jq('#mcnumber').val('');
    jq('#custname').val('');
    jq('#type').val('');
    jq('#remark').val('');
    jq('#formModal').modal('show');
   });
  
   jq('#sample_formshi').on('submit', function(event){
    event.preventDefault();
    var action_url = '';
  
    if(jq('#action').val() == 'Add')
    {
     action_url = "{{ route('cust.store') }}";
    }
  
    if(jq('#action').val() == 'Edit')
    {
     action_url = "{{ route('cust.update') }}";
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
	  jq('#user').attr('readonly', true);
      jq.get("{{ route('cust.index') }}" +'/' + id +'/edit', function (data) {
      jq('#mcnumber').val(data.result.Cc_Mcnumber);
      jq('#custname').val(data.result.Cc_Namecust);
      jq('#type').val(data.result.Cc_Type);
      jq('#remark').val(data.result.Cc_Remark);
      jq('#user').val(data.result.Cc_User);
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
     url:"cust/destroy/"+user_id,
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

@endsection     
 
