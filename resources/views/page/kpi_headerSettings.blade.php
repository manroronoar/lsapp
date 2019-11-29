@extends('includepage.template_master')
@section('content')


<div class="box box-success">
        
        <div class="box-body">
                <div class="lockscreen-logo">
                <h1 class="bold" align="center">HEADERSETTINGS CONFIG</h1>
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
              <th scope="row" class="text-center">Hs. Mc</th>
              <th scope="row" class="text-center">Hs. Drawing</th>
              <th scope="row" class="text-center">Hs. TargetHour</th>
              <th scope="row" class="text-center">Hs. Shift</th>
              <th scope="row" class="text-center">Hs. Customer</th>
               <!--<th scope="row" class="text-center">Hs_Employee</th>-->
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
           
                    <!-- <div class="form-group">
                       <label class="control-label col-md-4" >Hs_Mc </label>
                       <div class="col-md-8">
                        <input type="text" name="Hs_Mc" id="Hs_Mc" class="form-control" />
                       </div>
                      </div> -->


                      <div class="form-group">
                            <label class="control-label col-md-4" >Hs. Mc </label>
                            <div class="col-md-8">
                           <select class="form-control" name="Hs_Mc" id="Hs_Mc">
                           <!-- <option value="">Select mcnumber</option>-->
                              <option value=""></option>
                               @foreach ($listmcnumber as $item) 
                           <option  name="Hs_Mc" id="Hs_Mc" value="{{$item->Mc_Number}}">{{$item->Mc_Number}}</option>
                               @endforeach
                           </select >
                           </div>
                           </div>
                      
           
                      <div class="form-group">
                       <label class="control-label col-md-4">Hs. Drawing</label>
                       <div class="col-md-8">
                        <input type="text" name="Hs_Drawing" id="Hs_Drawing" class="form-control" />
                       </div>
                      </div>
           
                      <div class="form-group">
                       <label class="control-label col-md-4">Hs. TargetHour</label>
                       <div class="col-md-8">
                        <input type="text" name="Hs_TargetHour" id="Hs_TargetHour" class="form-control" />
                       </div>
                      </div>
           
                   <!--   <div class="form-group">
                       <label class="control-label col-md-4">Hs_Shift</label>
                       <div class="col-md-8">
                        <input type="text" name="Hs_Shift" id="Hs_Shift" class="form-control" />
                       </div>
                      </div> -->

                      <div class="form-group">
                            <label class="control-label col-md-4" >Hs. Shift </label>
                            <div class="col-md-8">
                           <select class="form-control" name="Hs_Shift" id="Hs_Shift">
                            <option value=""></option>
                               @foreach ($listshift as $itemsh) 
                           <option  value="{{$itemsh->Sh_Type}}">{{$itemsh->Sh_Type}}</option>
                               @endforeach
                           </select >
                           </div>
                           </div>
           
                      <div class="form-group">
                       <label class="control-label col-md-4">Hs. Customer</label>
                       <div class="col-md-8">
                        <input type="text" name="Hs_Customer" id="Hs_Customer" class="form-control" />
                       </div>
                      </div>

                     
        
                      <div class="form-group">
                        <label class="control-label col-md-4">User Action</label>
                        <div class="col-md-8">                                                       
                              <input type="text" name="Hs_Employee" id="Hs_Employee" class="form-control" value=" {{ Auth::user()->enid }}" readonly/>                                        
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
       url: "{{ route('hsi.index') }}",
      },
      columns: [
       {
        data: 'Hs_Mc',
        name: 'Hs_Mc'
       },
       {
        data: 'Hs_Drawing',
        name: 'Hs_Drawing'
       },
       {
        data: 'Hs_TargetHour',
        name: 'Hs_TargetHour'
       },
       {
        data: 'Hs_Shift',
        name: 'Hs_Shift'
       },
       {
        data: 'Hs_Customer',
        name: 'Hs_Customer'
       },
       {
        data: 'Hs_Employee',
        name: 'Hs_Employee'
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
      jq('#Hs_Mc').val('');
      jq('#Hs_Drawing').val('');
      jq('#Hs_TargetHour').val('');
      jq('#Hs_Shift').val('');
      jq('#Hs_Customer').val('');
      
      jq('#formModal').modal('show');
     });
    
     jq('#sample_form').on('submit', function(event){
      event.preventDefault();
      var action_url = '';
    
      if(jq('#action').val() == 'Add')
      {
       action_url = "{{ route('hsi.store') }}";
      }
    
      if(jq('#action').val() == 'Edit')
      {
       action_url = "{{ route('hsi.update') }}";
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
      jq('#form_result').html('');
      jq.ajax({
       url :"/hsi/"+id+"/edit",
       dataType:"json",
       success:function(data)
       {

        jq('#Hs_Mc').val(data.result.Hs_Mc);
        jq('#Hs_Drawing').val(data.result.Hs_Drawing);
        jq('#Hs_TargetHour').val(data.result.Hs_TargetHour);
        jq('#Hs_Shift').val(data.result.Hs_Shift);
        jq('#Hs_Customer').val(data.result.Hs_Customer);
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
       url:"hsi/destroy/"+user_id,
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
 
