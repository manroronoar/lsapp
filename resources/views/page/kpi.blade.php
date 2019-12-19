@extends('includepage.template_master')
@section('content')


<div class="row">

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon"><i class="fa fa-tags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text"><b>TARGET / OUTPUT<b></span>
        <span class="info-box-number">135,000 / 134,580</span>

      <!--  <div class="progress progress-sm active">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span class="sr-only">20% Complete</span>
          </div>
        </div> -->
       <p></p>
        
            <span class="progress-description">
              19/12/2019 00:00:00 - 23:59:59(time now)
            </span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon"><i class="fa fa-tags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">MC. DOWN</span>
        <span class="info-box-number">41,410</span>

        <p></p>
            <span class="progress-description">
              19/12/2019 00:00:00 - 23:59:59(time now)
            </span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon"><i class="fa fa-tags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">OEE</span>
        <span class="info-box-number">97.27 %</span>

        <p></p>
            <span class="progress-description">
              19/12/2019 00:00:00 - 23:59:59(time now)
            </span>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon"><i class="fa fa-tags"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">OLE</span>
        <span class="info-box-number">98.27 %</span>

        <p></p>
            <span class="progress-description">
              19/12/2019 00:00:00 - 23:59:59(time now)
            </span>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Monthly Recap Report</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">
              <strong>OUTPUT : 1/11/2019 - 30/11/2019</strong>
            </p>

            <div class="chart">
              <canvas id="areaChart" style="height:300px"></canvas>
            </div>

            <!-- /.chart-responsive -->
          </div>
  
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    </div>
  </div>

</div>



  <script>
    $(function () {
      $.get("{{ url('momc/readdataChart') }}", function (data) {
             
                
      console.log(data)  

    //  $('.ssss').text(data.sumoutput);
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      var areaChart       = new Chart(areaChartCanvas)

      var targetcharta = [50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50];
      var targetchartb = [48, 49, 50, 50, 50, 50, 50, 50, 47, 48, 49, 50, 49, 49, 49, 49, 45, 48, 50, 49, 50, 47, 50, 46, 49, 48, 50, 47, 50, 50];
      var targetchartdate = ['1/11/2019',
                             '2/11/2019',
                             '3/11/2019',
                             '4/11/2019',
                             '5/11/2019',
                             '6/11/2019',
                             '7/11/2019',
                             '8/11/2019',
                             '9/11/2019',
                             '10/11/2019',
                             '11/11/2019',
                             '12/11/2019',
                             '13/11/2019',
                             '14/11/2019',
                             '15/11/2019',
                             '16/11/2019',
                             '17/11/2019',
                             '18/11/2019',
                             '19/11/2019',
                             '20/11/2019',
                             '21/11/2019',
                             '22/11/2019',
                             '23/11/2019',
                             '24/11/2019',
                             '25/11/2019',
                             '26/11/2019',
                             '27/11/2019',
                             '28/11/2019',
                             '29/11/2019',
                             '30/11/2019']

      var areaChartData = {
        labels  : targetchartdate,
        datasets: [
          {
            label               : 'TARGET',
            fillColor           : 'rgba(210, 214, 222, 1)',
            strokeColor         : 'rgba(210, 214, 222, 1)',
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,)',
            data                : targetcharta
          },
          {
            label               : 'AC',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#4b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(74,74,74)',
            data                : targetchartb
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
      areaChart.Line(areaChartData, areaChartOptions)
  
     
     }) 
    })
  </script>
  
@endsection     
 
