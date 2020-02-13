@extends('includepage.template_master')
@section('content')


    <div class="row">   
        <div class="col-md-12">  
          <div class="box" id="boxay3">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Location AY1</b></h3>
              <div class="box-tools pull-right">       
              </div>
            </div>
            <div class="box-body text-right" >
              <div class="col-md-4" align="right">
   
              </div>
        
              <div class="input-group col-md-8" align="right">
                  <span class="input-group-addon">Shift:</span>
                  <select class="form-control" name="Hs_Shift" id="Hs_Shift">  
                      <option value="All">All</option>
                        @foreach ($listshift as $item) 
                    <option  value="{{$item->Sh_Name}}">{{$item['Sh_Name']}}</option>
                        @endforeach  
                  </select>
                 
                  <span class="input-group-addon">Start Date:</span>
                  <input name="datetimeS" id="datetimeS"  type="text" class="form-control "> 
          
                  <span class="input-group-addon">End Date:</span>
                  <input name="datetimeE" id="datetimeE"  type="text" class="form-control"> 
                 
                  <span class="input-group-btn">
                    <button type="button" name="summit" id="summit" class="btn btn-primary">SEARCH</button> 
                  </span>              
                 </div>

            </div>
          </div>
        </div>
    </div>


    <div class="row">   
            <div class="col-md-2">  
              <div class="box" id="boxay1">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>OUTPUT</b></h3>
                  <div class="box-tools pull-right">       
                  </div>
                </div>
                    <div class="box-body " >
                     <!-- <div class="" id='myChart'></div> -->
                     <div id="payloadMeterDiv"></div>
                    </div>
              </div>
            </div>

            <div class="col-md-2">  
              <div class="box" id="boxay1">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>OEE</b></h3>
                  <div class="box-tools pull-right">       
                  </div>
                </div>
                    <div class="box-body " >
                    <!--   <div class="" id='myChartoee'></div>-->
                    <div id="chart-container"></div>

                    </div>
              </div>
            </div>

            <div class="col-md-2">  
              <div class="box" id="boxay1">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>OLE</b></h3>
                  <div class="box-tools pull-right">       
                  </div>
                </div>
                    <div class="box-body " >
                   <!--    <div class="Chart" id='myChartole'></div>-->
                    </div>
              </div>
            </div> 

            <div class="col-md-6">  
              <div class="box" id="boxay1">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>DETAIL</b></h3>
                  <div class="box-tools pull-right">       
                  </div>
                </div>
                    <div class="box-body " >
                      <div class=""> 
                      </div> 
                      <div class=""> 
                        <h5><b>Target<span class="pull-right" id="Targetay1"></span></b></h5>               
                      </div>
                      <div class=""> 
                        <h5><b>Output<span class="pull-right" id ="Outputay1"></span></b></h5> 
                      </div>
                      <div class=""> 
                        <h5><b>Diff Output<span class="pull-right" id ="Diffay1"></span></b></h5> 
                      </div>
                      <div class=""> 
                        <h5><b>Oee<span class="pull-right" id ="Oeeay1"></span></b></h5> 
                      </div>
                      <div class=""> 
                        <h5><b>Ole<span class="pull-right" id ="Oleay1"></span></b></h5> 
                      </div>
                      <div class=""> 
                        <h5><b>Mc.Total<span class="pull-right" id ="Mctay1"></span></b></h5>             
                      </div>
                      <div class=""> 
                        <h5><b>Mc.Run<span class="pull-right" id = "Mcray1"></span></b></h5>               
                      </div>
                    </div>
              </div>
            </div> 
    </div>

    <div class="row">   
   <!--   <div class="col-md-12">  
        <div class="box" id="boxay3">
          <div class="box-body text-right" >
            <div>col</div>  
          </div>
        </div>
      </div>-->

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><b>MC.</b></h3>
        </div>
       
        <div class="box-body">
          <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
             
            </tr>
            </thead>
            <tbody>
            <tr>
            </tr>
            </tbody>
          
          </table>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    $(function () {
          var today = new Date();
          var dd = today.getDate();
          var mm = today.getMonth() + 1; //January is 0!   
          var yyyy = today.getFullYear();
          var timeHs = today.getHours();
          var timeMs = today.getMinutes();
          var timeSs = today.getSeconds()   ;  

          if (dd < 10) {
            dd = '0' + dd;
          } 
          if (mm < 10) {
            mm = '0' + mm;
          } 
          if (timeHs < 10) {
            timeHs = '0' + timeHs;
          } 
          if (timeMs < 10) {
            timeMs = '0' + timeMs;
          } 
          if (timeSs < 10) {
            timeSs = '0' + timeSs;
          } 
          var todayS = yyyy + '-' + mm + '-' + dd + ' 00:00:00';
          var todayE = yyyy + '-' + mm + '-' + dd + ' 23:59:59';
          var tomonths = yyyy + '-' + mm + '-';
        //  var todayS = yyyy + '-' + mm + '-' + '%'
        //  var todayE = yyyy + '-' + mm + '-' + '%'
         // var todayE = yyyy + '-' + mm + '-' + dd + ' ' + timeHs + ':'+ timeMs + ':'+ timeSs;

      $.get("{{ url('kpireaddatamc/readdata') }}"+ '/' + todayS + '/' + todayE +'/' + tomonths, function (data) {

       console.log(data);
       // parseInt(data.Result[0].S1);
      var countr = data.result[0].countrow;
      //parseInt(data.Result[0].S1);
      //var targers = data.result[0].Prt;
      //var outputs =  data.result[0].Pra;
      var targers =  parseInt(data.result[0].Prt);    
      var outputs =  parseInt(data.result[0].Pra);
      var difftargers = targers - outputs;
      var mcrun  = data.countmcRe_McNumber.length;
      var mctotal = data.countmcMc_Number.length;
      var oees = (data.result[0].Oeea / countr).toFixed(2);

     
     // var oles ='';
     //alert(oees);
     // alert(todayS + ' ' +todayE + ' ' +targers + ' ' +outputs + ' ' +oees + ' ' +oles);
     if (difftargers > 0   )
      {
        $('.target').html("<h3>"+ targers +' / '+ outputs  +"<span class='pull-right text-red'><i class='fa fa-angle-down'></i>" + difftargers +"</span></h3>");
      }
      else if (difftargers <= 0)
      {
        $('.target').html("<h3>"+ targers +' / '+ outputs  +"<span class='pull-right text-green'><i class='fa fa-angle-down'></i>"  + difftargers +"</span></h3>");
      }  
    //  $('.target').text(targers +' / '+ outputs );
      $('.difftarger').text(difftargers);
      $('.dateyimeN').text(todayS +' to '+ todayE);
      $('.mcrun').text(mctotal +' Mc. / '+ mcrun +' Run');   
      $('.oees').text(oees +' %');
      $('.oles').text(0 +' %');
      $('.btndate').text(todayS +' to '+ todayE);      
    //##################################################################################################################################
    //##########################################################  AY1   ################################################################
      var countr1 = data.dataay1[0].countrow;  
      var targers1 =  parseInt(data.dataay1[0].Prt);    
      var outputs1 =  parseInt(data.dataay1[0].Pra);
      var difftargers1 = targers1 - outputs1;
      var mcrun1  = data.datajoinstatusAY1.length;
      var mctotal1 = data.countmcay1.length;
      var oees1 = (data.dataay1[0].Oeea / countr1).toFixed(2);


      $('#Targetay1').text(targers1);
      $('#Outputay1').text(outputs1);
      $('#Diffay1').text(difftargers1);
      $('#Oeeay1').text(oees1 +' %');
      $('#Oleay1').text('');
      $('#Mctay1').text(mctotal1  +' Mc.');
      $('#Mcray1').text(mcrun1 +' Mc.');


      $.each(data.datajoinstatusAY1, function (i,value) {
            var tr = "<tr>";
            if ((value.status == "Idle") || (value.status == "Running"))
            {
            //  console.log(value.status)  
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-success'>"+ value.status +"</span></td>";
            }
            else
            {
            //  console.log(value.status)  
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-danger'>"+ value.status +"</span></td>";
            }
					
						tr = tr + "</tr>";
						$('#myTable1 > tbody:last').append(tr);
        })

    var jq = $.noConflict(); 
       jq('#example1').DataTable({
              "data" : data.datajoinstatusAY1,
              columns : [
                {"data" : "Mc_Number",
                "title" : "Mc.Number"
                },
                {"data" : "mc_location",
                "title" : "Mc.location"
                },
                {"data" : "Gn_node",
                "title" : "Node"
                },
                {"data" : "status",
                "title" : "Status",
                "render": function(datum, type, row) {
                  if ((datum == "Idle") || (datum == "Running"))
                      {
                        return '<div class="label label-success" ><label ><b>'+ datum +'</b></label></div>';
                      }
                      else
                      {
                        return '<div class="label label-danger" ><label ><b>'+ datum +'</b></label></div>';
                      }
                    }
                }       
              ]         
          })


      })
      
     

    });
  </script>

<script>
  var jq = $.noConflict(); 
  jq(document).ready(function(){
   
  });
</script>
   <script type="text/javascript">
    var jqd = $.noConflict(); 
    var defaultDate = new Date(); 
  // var defaultDate = '2019/11/01'

      jqd(function () {
      jqd('#datetimeS').datetimepicker({
              format: 'YYYY/MM/DD',
              defaultDate: defaultDate
          });
      jqd('#datetimeE').datetimepicker({
          format: 'YYYY/MM/DD',
          defaultDate: defaultDate
      });      
      });
  </script>     
  <script>
    var jq = $.noConflict(); 
         var $myFuelMeter = null;
         jq( function () {
             $myFuelMeter = jq('#payloadMeterDiv').dynameter({
                 // REQUIRED.
                 label: 'payload',
                  value: 940,
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


        <script> 
        var FusionCharts = require('fusioncharts');
        var Widgets = require('fusioncharts/fusioncharts.widgets');
        var FusionTheme = require('fusioncharts/themes/fusioncharts.theme.fusion');
        var $ = require('jquery');
        var jQueryFusionCharts = require('jquery-fusioncharts');

        Widgets(FusionCharts);  // Resolve Widgets as dependency for FusionCharts
        FusionTheme(FusionCharts); // Resolve Fusion theme as dependency for FusionCharts
        jQueryFusionCharts(FusionCharts); // Resolve FusionCharts as dependency for jqueryFusionCharts

        $('document').ready(function () {
            $('#chart-container').insertFusionCharts({
                type: 'angulargauge',
                width: '600',
                height: '400',
                dataFormat: 'json',
                dataSource: { /* see data tab */ }
            });
        });


      </script>
  
 
@endsection     
 
