@extends('includepage.template_master')
@section('content')


<div class="box box-success">
    <div class="box-body">
            <div class="lockscreen-logo">
            <h1 class="bold" align="center">DOWNTIMECODE CONFIG</h1>
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
           <table id="user_table" class="table table-bordered table-striped">
            <thead>
             <tr class="bg-green color-palette"> 
              <th scope="row" class="text-center">Dc. Number</th>
              <th scope="row" class="text-center">Dc. Type</th>
              <th scope="row" class="text-center">Dc. Name</th>
              <th scope="row" class="text-center">Dc. Remark</th>
              <th scope="row" class="text-center">Dc. Status</th>
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
                    <form method="post" id="sample_form" class="form-horizontal">
                     @csrf
           
                     <div class="form-group">
                       <label class="control-label col-md-4" >Dc. Number</label>
                       <div class="col-md-8">
                        <input type="text" name="Dc_Number" id="Dc_Number" class="form-control" />
                       </div>
                      </div>
           
                     <div class="form-group">
                       <label class="control-label col-md-4">Dc. Name</label>
                       <div class="col-md-8">
                        <input type="text" name="Dc_Name" id="Dc_Name" class="form-control" />
                       </div>
                      </div> 

                      <div class="form-group">
                          <label class="control-label col-md-4" >Dc. Type </label>
                          <div class="col-md-8">
                         <select class="form-control" name="Dc_Type" id="Dc_Type">
                          <option value=""></option>
                             @foreach ($listdowntype as $item) 
                         <option  value="{{$item->Bi_Type}}">{{$item->Bi_Type}}</option>
                             @endforeach
                         </select >
                         </div>
                         </div>

                   
           
                      <div class="form-group">
                       <label class="control-label col-md-4">Dc. Remark</label>
                       <div class="col-md-8">
                        <input type="text" name="Dc_Remark" id="Dc_Remark" class="form-control" />
                       </div>
                      </div>
           
                      <div class="form-group">
                       <label class="control-label col-md-4">Dc. Status</label>
                       <div class="col-md-8">
                        <select class="form-control" name="Dc_Status" id="Dc_Status">
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
                           
                              <input type="text" name="Dc_User" id="Dc_User" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>
                                        
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
     
      </div>



<script>
  var jq = $.noConflict(); 
    jq(document).ready(function(){
    
     jq('#user_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
       url: "{{ route('dtc.index') }}",
      },
      columns: [
       {
        data: 'Dc_Number',
        name: 'Dc_Number'
       },
       {
        data: 'Dc_Type',
        name: 'Dc_Type'
       },
       {
        data: 'Dc_Name',
        name: 'Dc_Name'
       },
       {
        data: 'Dc_Remark',
        name: 'Dc_Remark'
       },
       {
        data: 'Dc_Status',
        name: 'Dc_Status'
       },
       {
        data: 'Dc_User',
        name: 'Dc_User'
       },
       {
        data: 'action',
        name: 'action',
        orderable: false
       }
      ]
     });
    
     jq('#create_record').click(function(){
     
      jq('#Dc_Number').attr('readonly', false);
      jq('.modal-title').text('Add New Record');
      jq('#action_button').val('Add');
      jq('#action').val('Add');
      jq('#form_result').html('');
      jq('#Dc_Number').val('');
      jq('#Dc_Type').val('');
      jq('#Dc_Name').val('');
      jq('#Dc_Remark').val('');
      jq('#Dc_Status').val('');
    
      jq('#formModal').modal('show');
     });
    
     jq('#sample_form').on('submit', function(event){
      event.preventDefault();
      var action_url = '';
    
      if(jq('#action').val() == 'Add')
      {
       action_url = "{{ route('dtc.store') }}";
      }
    
      if(jq('#action').val() == 'Edit')
      {
       action_url = "{{ route('dtc.update') }}";
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
         jq('#sample_form')[0].reset();
         jq('#user_table').DataTable().ajax.reload();
        }
        jq('#form_result').html(html);
       }
      });
     });
    
     jq(document).on('click', '.edit', function(){
      var id = jq(this).attr('id');
	  jq('#Dc_Number').attr('readonly', true);
    jq('#form_result').html('');
      jq.get("{{ route('dtc.index') }}" +'/' + id +'/edit', function (data) {
        jq('#Dc_Number').val(data.result.Dc_Number);
        jq('#Dc_Type').val(data.result.Dc_Type);
        jq('#Dc_Name').val(data.result.Dc_Name);
        jq('#Dc_Remark').val(data.result.Dc_Remark);
        jq('#Dc_Status').val(data.result.Dc_Status);
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
       url:"dtc/destroy/"+user_id,
       beforeSend:function(){
        jq('#ok_button').text('Deleting...');
       },
       success:function(data)
       {
        setTimeout(function(){
         jq('#confirmModal').modal('hide');
         jq('#user_table').DataTable().ajax.reload();
         alert('Data Deleted');
        }, 2000);
       }
      })
     });
    


    });
    </script>
  
@endsection     
 
