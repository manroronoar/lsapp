@extends('includepage.template_master')
@section('content')

<form method="post"   id="sample_form" class="form-horizontal">   
  @csrf
      <div class="box box-success">
        <div class="box-body">
                <div class="lockscreen-logo">
                <h1 class="bold text-transform: uppercase" align="center"></h1>
                </div>
        </div>   
      </div>
<!--************************************************************************************************************ -->



<div class="box ">
  <div class="box-header with-border">
    <h3 class="box-title  valmcs"></h3>
  </div>
  <div class="box-body">
    <div class="row col-md-12">

      <div class="col-md-6" align="right">
   
      </div>

      <div class="input-group col-md-6" align="right">
        <span class="input-group-addon">Shift:</span>
        <select class="form-control" name="Hs_Shift" id="Hs_Shift">
        
        </select >
        <span class="input-group-addon">Start Date:</span>
        <input name="datetimeS" id="datetimeS"  type="text" class="form-control "> 

        <span class="input-group-addon">End Date:</span>
        <input name="datetimeE" id="datetimeE"  type="text" class="form-control"> 
        <span class="input-group-btn">
          <button type="button" name="summit" id="summit" class="btn btn-success">SEARCH</button> 
        </span>
      </div>




    </div>
  </div>
  <!-- /.box-body -->
</div>

    
<!--************************************************************************************************************ -->
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h4><b>OEE</b></h4></span>
              <span class="info-box-number OEE"><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text "><h4><b>OUTPUT</b></h4></span>
              <span class="info-box-number OUTPUT"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h4><b>DIFF OUTPUT</b></h4></span>
              <span class="info-box-number DIFF"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text "><h4><b>DOWN</b></h4></span>
              <span class="info-box-number DOWN"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
     
      <!--************************************************************************************************************ -->
      <div class="table-responsive">
         <table id="user_table" class="table table-bordered table-striped dataTable no-footer">
          <thead>
           <tr class="bg-green color-palette">
            <td scope="row" class="text-center b6" ></td>
            <td scope="row" class="text-center b5" ></td>
            <td scope="row" class="text-center b4" ></td>
            <td scope="row" class="text-center b3" ></td>
            <td scope="row" class="text-center b2" ></td>
            <td scope="row" class="text-center b1" ></td>
           </tr>
          </thead>
          <tbody>
          <!--<tr role="row" class="odd" style="border: groove">-->
             <tr role="row" class="odd" style="border: groove">
                          
               <td scope="row" class="text-center b6" ></td>
               <td scope="row" class="text-center b5" ></td>
               <td scope="row" class="text-center b4" ></td>
               <td scope="row" class="text-center b3" ></td>
               <td scope="row" class="text-center b2" ></td>
               <td scope="row" class="text-center b1" ></td>
               
           </tr>
         </tbody>
         </table>
        </div>


          
 
   
  

   <!--************************************************************************************************************ -->
              <!-- Bar chart -->
         <!--  <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
         
          </div> -->
          <!-- /.box -->

          <!--************************************************************************************************************ -->
            <!-- BAR CHART -->
            <div class="box box">
              <div class="box-header with-border">
                <h3 class="box-title">OUTPUT : ITEM</h3>
  
                <div class="box-tools pull-right">
               <!--   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> -->
                  </button>
                <!--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
              </div>
              <div class="box-body chart-responsive">
             <!--   <div class="chart" id="bar-charts" style="height: 300px;"></div> -->
                <div class="chart" id="payloadMeterDiv"></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        
            <!-- ./col -->
           <!-- <div class="col-xs-6 col-md-3 text-center">
              <input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="#f56954">

              <div class="knob-label">data-width="120"</div>
            </div>-->
            <!-- ./col -->
      </form>
    
   

      <script>
   var jq = $.noConflict(); 
        var $payloadMeter = null;
        jq( function () {
            $payloadMeter = jq('div#payloadMeterDiv').dynameter({
                // REQUIRED.
                label: 'Payload',
                value: 500,
                unit: 'lbs',
                min: 0,
                max: 1000,
                regions: {
                800: 'warn',
                900: 'error'
        }
            });
        });
      </script>

      
         

@endsection 
 
