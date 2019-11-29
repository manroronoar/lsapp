@extends('includepage.template_master')
@section('content')



<div class="box box-success">
        
    <div class="box-body">
            <div class="lockscreen-logo">
            <h1 class="bold" align="center">SHIFT CONFIG</h1>
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
    <th scope="row" class="text-center">Sh. Name</th>
    <th scope="row" class="text-center">Sh. Type</th>
    <th scope="row" class="text-center">Sh. Timestart</th>
    <th scope="row" class="text-center">Sh. Timestop</th>
    <th scope="row" class="text-center">Sh. Status</th>
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
             <label class="control-label col-md-4" >Sh. Name</label>
             <div class="col-md-8">
              <input type="text" name="Sh_Name" id="Sh_Name" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Sh. Type</label>
             <div class="col-md-8">
              <input type="text" name="Sh_Type" id="Sh_Type" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Sh. Timestart</label>
             <div class="col-md-8">
              <input type="text" name="Sh_Timestart" id="Sh_Timestart" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Sh. Timestop</label>
             <div class="col-md-8">
              <input type="text" name="Sh_Timestop" id="Sh_Timestop" class="form-control" />
             </div>
            </div>
 
            <div class="form-group">
             <label class="control-label col-md-4">Sh. Status</label>
             <div class="col-md-8">
             <!-- <input type="text" name="Sh_Status" id="Sh_Status" class="form-control" /> -->
              <select class="form-control" name="Sh_Status" id="Sh_Status">
                  <option value=""></option>
                     @foreach ($liststatus as $item) 
                 <option  value="{{$item->CH_Type}}">{{$item->CH_Name}}</option>                      
                     @endforeach
              </select >
             </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4">User Action</label>
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
     var jq = $.noConflict(); 
  jq(document).ready(function(){
  
   jq('#user_tableshi').DataTable({
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
  
   jq('#create_record').click(function(){
    jq('.modal-title').text('Add New Record');
    jq('#action_button').val('Add');
    jq('#action').val('Add');
    jq('#form_result').html('');
    jq('#Sh_Name').val('');
    jq('#Sh_Type').val('');
    jq('#Sh_Timestart').val('');
    jq('#Sh_Timestop').val('');
    jq('#Sh_Status').val('');
    jq('#formModal').modal('show');
   });
  
   jq('#sample_formshi').on('submit', function(event){
    event.preventDefault();
    var action_url = '';
  
    if(jq('#action').val() == 'Add')
    {
     action_url = "{{ route('shi.store') }}";
    }
  
    if(jq('#action').val() == 'Edit')
    {
     action_url = "{{ route('shi.update') }}";
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
    jq.ajax({
     url :"/shi/"+id+"/edit",
     dataType:"json",
     success:function(data)
     {
      jq('#Sh_Name').val(data.result.Sh_Name);
      jq('#Sh_Type').val(data.result.Sh_Type);
      jq('#Sh_Timestart').val(data.result.Sh_Timestart);
      jq('#Sh_Timestop').val(data.result.Sh_Timestop);
      jq('#Sh_Status').val(data.result.Sh_Status);
      jq('#Sh_User').val(data.result.Sh_User);
      jq('#hidden_id').val(id);
      jq('.modal-title').text('Edit Record');
      jq('#action_button').val('Edit');
      jq('#action').val('Edit');
      jq('#formModal').modal('show');
     }
    })
   });
  
   var user_id;
  
   jq(document).on('click', '.delete', function(){
    user_id = jq(this).attr('id');
    jq('#confirmModal').modal('show');
   });
  
   jq('#ok_button').click(function(){
    jq.ajax({
     url:"shi/destroy/"+user_id,
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
  jqd(function () {
    jqd('#Sh_Timestart').datetimepicker({
            format: 'hh:mm:ss'
        });
    jqd('#Sh_Timestop').datetimepicker({
            format: 'hh:mm:ss'
        });
    });
  </script>

@endsection     
 
