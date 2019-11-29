@extends('includepage.template_master')
@section('content')


<div class="box box-success">
        
        <div class="box-body">
                <div class="lockscreen-logo">
                <h1 class="bold text-transform: uppercase" align="center">OEE VIEW</h1>
                </div>
        </div>   
      </div>

<div class="box box-success form-group">
    <div class="box-header with-border">
        <div class="row">
            <!--<h3 class="box-title">OEE</h3>-->

            <div class="col-xs-4">
              
            </div>
            <div class="col-xs-4">
              
            </div>
            <div class="col-xs-4">
              
        
          </div>   
    </div>

    <form method="post" id="sample_form" class="form-horizontal">
      <div class="box-body">
              <div align="right">
              <!-- <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button> -->
              </div>
              <br />
            <div class="table-responsive">
              <table id="user_table" class="table table-bordered table-striped">
              <thead>
                <tr class="bg-green color-palette">   
                <th scope="row" class="text-center">{{ $input }}</th>
                
                          <!--<th scope="row" class="text-center">oee</th>  
                          <th scope="row" class="text-center">view node</th> -->
                   
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
    </form>

        

  <script>
  var jq = $.noConflict(); 

  </script>

    
   @endsection 
 
 
