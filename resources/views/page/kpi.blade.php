@extends('includepage.template_master')
@section('content')



<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner " style="color:black;">
     


         <h3 class = "target"></h3>
      <!--   <h3><span class=" text-red "><i class="fa fa-angle-down difftarger"></i></span></h3>-->
        <p><b>TARGET / OUTPUT</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer" style="color:black;">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner"style="color:black;">
        <h3 class = "mcrun"><sup style="font-size: 20px">%</sup></h3>

        <p><b>MC. RUN</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer" style="color:black;">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box "style="background: white;">
      <div class="inner" style="color:black;">
        <h3 class = "oees"></h3>

        <p><b>OEE</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer" style="color:black;">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner" style="color:black;">
        <h3 class = "oles"></h3>

        <p><b>OLE</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer" style="color:black;">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->



</div>


<div class="row">

  <div class="col-md-4 "  id = "ay1">
    <a href="{{ url('loay1') }}">  
    <div class="box box-default" id="boxay1">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY1</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body " style="color:black;">
                  <div class="col-md-6 chart-responsive">  
            
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

                <div class="col-md-6">  
                  <table class="table table-striped table-hover" id="myTable1">
                    <thead>
                      <tr>            
                        <th>Mc.Name</th>
                        <th>Mc.Status</th>
                      <tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  
                  </table>
                </div>
       </div>
    </div>
    </a>
  </div>


  <div class="col-md-4" id = "ay2">
    <a href="{{ url('loay2') }}">   
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY2</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body " style="color:black;">
                  <div class="col-md-6 chart-responsive">  
            
                  <div class=""> 
                  </div> 
                  <div class=""> 
                    <h5><b>Target<span class="pull-right" id="Targetay2"></span></b></h5>               
                  </div>
                  <div class=""> 
                    <h5><b>Output<span class="pull-right" id ="Outputay2"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Diff Output<span class="pull-right" id ="Diffay2"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Oee<span class="pull-right" id ="Oeeay2"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Ole<span class="pull-right" id ="Oleay2"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Mc.Total<span class="pull-right" id ="Mctay2"></span></b></h5>             
                  </div>
                  <div class=""> 
                    <h5><b>Mc.Run<span class="pull-right" id = "Mcray2"></span></b></h5>               
                  </div>
      
                </div>

                <div class="col-md-6">  
                  <table class="table table-striped table-hover" id="myTable2">
                    <thead>
                      <tr>            
                        <th>Mc.Name</th>
                        <th>Mc.Status</th>
                      <tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  
                  </table>
                </div>
       </div>
    </div>
    </a>
  </div>

  <div class="col-md-4" id = "ay3">
    <a href="{{ url('loay3') }}">   
    <div class="box" id="boxay3">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY3</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body " style="color:black;">
                  <div class="col-md-6 chart-responsive">  
            
                  <div class=""> 
                  </div> 
                  <div class=""> 
                    <h5><b>Target<span class="pull-right" id="Targetay3"></span></b></h5>               
                  </div>
                  <div class=""> 
                    <h5><b>Output<span class="pull-right" id ="Outputay3"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Diff Output<span class="pull-right" id ="Diffay3"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Oee<span class="pull-right" id ="Oeeay3"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Ole<span class="pull-right" id ="Oleay3"></span></b></h5> 
                  </div>
                  <div class=""> 
                    <h5><b>Mc.Total<span class="pull-right" id ="Mctay3"></span></b></h5>             
                  </div>
                  <div class=""> 
                    <h5><b>Mc.Run<span class="pull-right" id = "Mcray3"></span></b></h5>               
                  </div>
      
      
                </div>

                <div class="col-md-6">  
                  <table class="table table-striped table-hover" id="myTable3">
                    <thead>
                      <tr>            
                        <th>Mc.Name</th>
                        <th>Mc.Status</th>
                      <tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  
                  </table>
                </div>
       </div>
    </div>
   </a>
  </div>

</div>

  
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Monthly Recap Report</h3> 
            <div class="box-tools pull-right">
              <strong class="btn ">OUTPUT : Date</strong>
            </div>
            
          </div>
      
          <div class="box-body">
            <div class="row">
            
              <div class="col-md-7">
                <div class="chart">
                  <canvas id="lineChart" style="height:320px"></canvas> 
                </div>
               <!-- <div class="chart" id="revenue-chart" style="height: 200px;"></div>-->
               
              </div>

              <div class="col-md-3">
                <div class="chart">
                  <canvas id="pieChart" height="200"></canvas>
                </div>
              </div>
            
              <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                  <li><a  class="text-red">Location AY1 <span class="pull-right text-red"><i class="" id="acay1"></i> </span></a></li>
                  <li><a  class="text-green">Location AY2 <span class="pull-right text-green"><i class="" id="acay2"></i> </span></a></li>
                  <li><a  class="text-yellow">Location AY3<span class="pull-right text-yellow"><i class="" id="acay3"></i> </span></a></li>
                  <li><a  class="" style="color: #00c0ef;">Diff Target<span class="pull-right" style="color: #00c0ef;"><i class="" id="diffac"></i> </span></a></li>
                  <li></li>
                </ul>
              </div>
          
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
    //  alert(countr1 + ' ' + targers1 + ' ' +outputs1 + ' ' + difftargers1 + ' ' +mcrun1 + ' ' +mctotal1 + ' ' + oees1);
    //  <h5>target<span class="pull-right  "><i class=""></i> 1200 </span></h5>     
    //  <h5>Mc001<span class="pull-right  "><i class=""></i> run</span></h5>        
    //##################################################################################################################################
    //##########################################################  AY2   ################################################################
    var countr2 = data.dataay2[0].countrow;  
      var targers2 =  parseInt(data.dataay2[0].Prt);    
      var outputs2 =  parseInt(data.dataay2[0].Pra);
      var difftargers2 = targers2 - outputs2;
      var mcrun2  = data.datajoinstatusAY2.length;
      var mctotal2 = data.countmcay2.length;
      var oees2 = (data.dataay2[0].Oeea / countr2).toFixed(2);

      $('#Targetay2').text(targers2);
      $('#Outputay2').text(outputs2);
      $('#Oeeay2').text(oees2 +' %');
      $('#Diffay2').text(difftargers2);
      $('#Oleay2').text('');
      $('#Mctay2').text(mctotal2  +' Mc.');
      $('#Mcray2').text(mcrun2 +' Mc.');

      $.each(data.datajoinstatusAY2, function (i,value) {
            var tr = "<tr>";
            if ((value.status == "Idle") || (value.status == "Running"))
            {
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-success'>"+ value.status +"</span></td>";
            }
            else
            {
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-danger'>"+ value.status +"</span></td>";
            }
						tr = tr + "</tr>";
						$('#myTable2 > tbody:last').append(tr);
        })
    //##################################################################################################################################
    //##########################################################  AY3   ################################################################
      var countr3 = data.dataay3[0].countrow;  
      var targers3 =  parseInt(data.dataay3[0].Prt);    
      var outputs3 =  parseInt(data.dataay3[0].Pra);
      var difftargers3 = targers3 - outputs3;
      var mcrun3  = data.datajoinstatusAY3.length;
      var mctotal3 = data.countmcay3.length;
      var oees3 = (data.dataay3[0].Oeea / countr3).toFixed(2);

      $('#Targetay3').text(targers3);
      $('#Outputay3').text(outputs3);
      $('#Diffay3').text(difftargers3);
      $('#Oeeay3').text(oees3 +' %');
      $('#Oleay3').text('');
      $('#Mctay3').text(mctotal3 +' Mc.');
      $('#Mcray3').text(mcrun3  +' Mc.');

      $.each(data.datajoinstatusAY3, function (i,value) {
            var tr = "<tr>";
            if ((value.status == "Idle") || (value.status == "Running"))
            {
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-success'>"+ value.status +"</span></td>";
            }
            else
            {
              tr = tr + "<td>"+ value.Mc_Number +"</td><td><span class='label label-danger'>"+ value.status +"</span></td>";
            }
						tr = tr + "</tr>";
						$('#myTable3 > tbody:last').append(tr);
        })
    //##################################################################################################################################
    //##########################################################  Chart   ##############################################################
      console.log(data)  
   
      //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    // var areaChart       = new Chart(areaChartCanvas)
        //alert(data.datachart[0].ac);
        var chartData = {
          ac : [],
          tr : [],
          date : []
        }
        var len  = data.datachart.length;
        for (var i = 0;i < len ; i++) 
        {  
          chartData.ac.push(data.datachart[i].ac);
          chartData.tr.push(data.datachart[i].tr);
          chartData.date.push(data.datachart[i].day + '-' + data.datachart[i].month + '-' + data.datachart[i].year);
        }
        console.log(chartData)  

    var areaChartData = {
      labels  : chartData.date,
      datasets: [
        {
          label               : 'TR',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : chartData.tr
        },
        {
          label               : 'AC',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : chartData.ac
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
   // areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)
    
      //Create the line chart
      //areaChart.Line(areaChartData, areaChartOptions)

     // var outputs =  data.result[0].Pra;
     // var targers =  parseInt(data.result[0].Prt);    
     // var outputs =  parseInt(data.result[0].Pra);
     // var difftargers = targers - outputs;
     // var mcrun  = data.countmcRe_McNumber.length;
     // var mctotal = data.countmcMc_Number.length;
     // var oees = (data.result[0].Oeea / countr).toFixed(2);

     var targetay1 =   ((parseInt(data.dataay1[0].Pra)) / (parseInt(data.result[0].Prt))).toFixed(2);
     var targetay2 =    ((parseInt(data.dataay2[0].Pra)) / (parseInt(data.result[0].Prt))).toFixed(2);
     var targetay3 =   ((parseInt(data.dataay3[0].Pra)) / (parseInt(data.result[0].Prt))).toFixed(2);
     var difftr = (difftargers / (parseInt(data.result[0].Prt))).toFixed(2);
     //targers
      

     $('#acay1').text(targetay1 + ' %');
     $('#acay2').text(targetay2 + ' %');
     $('#acay3').text(targetay3 + ' %');
     $('#diffac').text(difftr + ' %');
     //acay1
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieChart       = new Chart(pieChartCanvas)
      var PieData        = [
        {
        //value    : 36000,
        value    : parseInt(data.dataay1[0].Pra),
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Location AY1'
      },
      {
       // value    : 36000,
        value    : parseInt(data.dataay2[0].Pra),
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Location AY2'
      },
      {
        //value    : 36000,
        value    : parseInt(data.dataay3[0].Pra),
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Location AY3'
      },
      {
        //value    : 4000,
        value    : difftargers,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Diff Target'
      }
      ]
      var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions)
      });
    });
  </script>


@endsection     
 
