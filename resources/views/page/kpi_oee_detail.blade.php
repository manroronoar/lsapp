@extends('includepage.template_master')
@section('content')

<form method="post"   id="sample_form" class="form-horizontal">   
  @csrf
      <div class="box box-success">
        <div class="box-body">
                <div class="lockscreen-logo">
                <h1 class="bold text-transform: uppercase" align="center">OEE VIEW {{$mcnumberkey}}</h1>
                </div>
        </div>   
      </div>

 
<!--************************************************************************************************************ -->
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bit 1</span>
              <span class="info-box-number">90<small>%</small></span>
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
              <span class="info-box-text">Bit 2</span>
              <span class="info-box-number">41,410</span>
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
              <span class="info-box-text">Bit 3</span>
              <span class="info-box-number">760</span>
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
              <span class="info-box-text">Bit 4</span>
              <span class="info-box-number">2,000</span>
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
               @foreach ( $datakey as $item) 
               <th scope="row" class="text-center">BIT {{ $item['Bi_Type'] }}</th>
               
                @endforeach
           </tr>
          </thead>
          <tbody>
          <!--<tr role="row" class="odd" style="border: groove">-->
             <tr role="row" class="odd" style="border: groove">
               @foreach ( $datakey as $item) 
               <td scope="row" class="text-center" >{{ $item['Bi_Bit'] }}</td>
                @endforeach
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
                <h3 class="box-title">Bar Chart</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                <!--  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="bar-charts" style="height: 300px;"></div>
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
        jq(document).ready(function(){
         
        });
          </script>


      <script>
         $(function () {
    /*
     * BAR CHART
     * ---------
     */
          var bar_data = {
            data : [['00:00:00', 10], 
                    ['01:00:00', 8], 
                    ['02:00:00', 4], 
                    ['03:00:00', 13], 
                    ['04:00:00', 17], 
                    ['05:00:00', 17], 
                    ['06:00:00', 17], 
                    ['07:00:00', 17], 
                    ['08:00:00', 17], 
                    ['09:00:00', 17], 
                    ['10:00:00', 17], 
                    ['11:00:00', 17], 
                    ['12:00:00', 17], 
                    ['13:00:00', 17], 
                    ['14:00:00', 17], 
                    ['15:00:00', 17], 
                    ['16:00:00', 17], 
                    ['17:00:00', 17], 
                    ['18:00:00', 17],
                    ['19:00:00', 17], 
                    ['20:00:00', 17], 
                    ['21:00:00', 17], 
                    ['22:00:00', 17], 
                   
                    ['23:00:00', 9]],
                    
            color: '#3c8dbc'
          }
          $.plot('#bar-chart', [bar_data], {
            grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3'
            },
            series: {
              bars: {
                show    : true,
                barWidth: 0.5,
                align   : 'center'
              }
            },
            xaxis : {
              mode      : 'categories',
              tickLength: 0
            }
          })
          /* END BAR CHART */

        })
      </script>


       <script>
        $(function () {
          "use strict";
          var bar = new Morris.Bar({
          element: 'bar-charts',
          resize: true,
          data: [
            {y: '00:00:00', a: 100, },
            {y: '01:00:00', a: 80, },
            {y: '02:00:00', a: 90, },
            {y: '03:00:00', a: 75, },
            {y: '04:00:00', a: 50, },
            {y: '05:00:00', a: 75, },
            {y: '06:00:00', a: 75, },
            {y: '07:00:00', a: 75, },
            {y: '08:00:00', a: 75, },
            {y: '09:00:00', a: 75, },
            {y: '10:00:00', a: 75, },
            {y: '11:00:00', a: 75, },
            {y: '12:00:00', a: 75, },
            {y: '13:00:00', a: 75, },
            {y: '14:00:00', a: 75, },
            {y: '15:00:00', a: 75, },
            {y: '16:00:00', a: 75, },
            {y: '17:00:00', a: 75, },
            {y: '18:00:00', a: 75, },
            {y: '19:00:00', a: 75, },
            {y: '20:00:00', a: 75, },
            {y: '21:00:00', a: 75, },
            {y: '22:00:00', a: 75, },
            {y: '23:00:00', a: 75, }
          
          ],
          barColors: ['#4287f5'],
          grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3'
            },
          xkey: 'y',
          ykeys: ['a'],
          labels: ['output'],
          hideHover: 'auto'
            });
        });
      </script>

      <script>
       $(function () {
        /* jQueryKnob */
    
        $(".knob").knob({
          /*change : function (value) {
           //console.log("change : " + value);
           },
           release : function (value) {
           console.log("release : " + value);
           },
           cancel : function () {
           console.log("cancel : " + this.value);
           },*/
          draw: function () {
    
            // "tron" case
            if (this.$.data('skin') == 'tron') {
    
              var a = this.angle(this.cv)  // Angle
                  , sa = this.startAngle          // Previous start angle
                  , sat = this.startAngle         // Start angle
                  , ea                            // Previous end angle
                  , eat = sat + a                 // End angle
                  , r = true;
    
              this.g.lineWidth = this.lineWidth;
    
              this.o.cursor
              && (sat = eat - 0.3)
              && (eat = eat + 0.3);
    
              if (this.o.displayPrevious) {
                ea = this.startAngle + this.angle(this.value);
                this.o.cursor
                && (sa = ea - 0.3)
                && (ea = ea + 0.3);
                this.g.beginPath();
                this.g.strokeStyle = this.previousColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                this.g.stroke();
              }
    
              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
              this.g.stroke();
    
              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();
    
              return false;
            }
          }
        });

       });
        /* END JQUERY KNOB */
      </script>

@endsection 
 
