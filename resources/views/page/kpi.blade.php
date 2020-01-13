@extends('includepage.template_master')
@section('content')



<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner ">
     


         <h3 class = "target"></h3>
      <!--   <h3><span class=" text-red "><i class="fa fa-angle-down difftarger"></i></span></h3>-->
        <p><b>TARGET / OUTPUT</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner">
        <h3 class = "mcrun"><sup style="font-size: 20px">%</sup></h3>

        <p><b>MC. RUN</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box "style="background: white;">
      <div class="inner">
        <h3 class = "oees"></h3>

        <p><b>OEE</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner">
        <h3 class = "oles"></h3>

        <p><b>OLE</b></p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->



</div>


<div class="row">

  <div class="col-md-4">  
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY1</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body ">
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
  </div>


  <div class="col-md-4">  
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY2</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body ">
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
  </div>

  <div class="col-md-4">  
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Location AY3</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
                <div class="box-body ">
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
  </div>

</div>



  <!-- <div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Area Chart</h3>

        <div class="box-tools pull-right">
          <strong class="btndate "></strong>
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="revenue-chart" style="height: 300px;"></div>
      </div>
    </div>
  </div>
</div> -->

  
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Monthly Recap Report</h3> 
            <div class="box-tools pull-right">
              <strong class="btn ">OUTPUT : 1/11/2019 - 30/11/2019</strong>
            </div>
            
          </div>
      
          <div class="box-body">
            <div class="row">
            
              <div class="col-md-7">
                <!--<div class="chart">
                  <canvas id="lineChart" style="height:200px"></canvas> 
                </div>-->
                <div class="chart" id="revenue-chart" style="height: 200px;"></div>
               
              </div>

              <div class="col-md-3">
                <div class="chart">
                  <canvas id="pieChart" height="180"></canvas>
                </div>
              </div>
            
              <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#">AY1
                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                  <li><a href="#">AY2 <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                  </li>
                  <li><a href="#">AY3
                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
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
   
      var area = new Morris.Area({
      element: 'revenue-chart',
      resize: false,
      data: [
        {y: '1', item1: 2666, item2: 2666},
        {y: '2', item1: 2778, item2: 2294},
        {y: '3', item1: 4912, item2: 1969},
        {y: '4', item1: 3767, item2: 3597},
        {y: '5', item1: 6810, item2: 1914},
        {y: '6', item1: 5670, item2: 4293},
        {y: '7', item1: 4820, item2: 3795},
        {y: '8', item1: 15073, item2: 5967},
        {y: '9', item1: 10687, item2: 4460},
        {y: '10', item1: 8432, item2: 5713}
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
    
      //Create the line chart
      //areaChart.Line(areaChartData, areaChartOptions)
  
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieChart       = new Chart(pieChartCanvas)
      var PieData        = [
        {
          value    : 700,
          color    : '#a0d0e0',
          highlight: '#a0d0e0',
          label    : 'AY1'
        },
        {
          value    : 500,
          color    : '#00c0ef',
          highlight: '#00c0ef',
          label    : 'AY2'
        },
        {
          value    : 500,
          color    : '#3c8dbc',
          highlight: '#3c8dbc',
          label    : 'AY3'
        },
        {
          value    : 100,
          color    : '#d2d6de',
          highlight: '#d2d6de',
          label    : 'TARGET'
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
 
