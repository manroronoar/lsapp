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
      <div class="box box">
        <div class="box-header with-border">
          <h3 class="box-title col-md-10 valmcs">Mc. {{$mcnumberkey}} </h3>

          @foreach ( $listshift as $item) 
          <label class="text-center" >{{ $item['Sh_Name'] }}</label>
           @endforeach

          <div class="input-group col-md-2">
            <input name="datetimes" id="datetimes"  type="text" class="form-control">
            <span class="input-group-btn">
                 <button type="button" name="summit" id="summit" class="btn btn-success ">SEARCH</button></span>
            </span>
          </div>

         

          <div class="box-tools pull-right  col-md-12">   
            <div class="input-group ">          
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
              <span class="info-box-text "><h4><b>DOWN/MIN</b></h4></span>
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
               @foreach ( $datakey as $item) 
               <th scope="row" class="text-center">BIT {{ $item['Bi_Type'] }}</th>
               
                @endforeach
           </tr>
          </thead>
          <tbody>
          <!--<tr role="row" class="odd" style="border: groove">-->
             <tr role="row" class="odd" style="border: groove">
             
               <td scope="row" class="text-center b1" ></td>
               <td scope="row" class="text-center b2" ></td>
               <td scope="row" class="text-center b3" ></td>
               <td scope="row" class="text-center b4" ></td>
               <td scope="row" class="text-center b5" ></td>
               <td scope="row" class="text-center b6" ></td>
               
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
               <!--   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> -->
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
          $(document).on('click', '#summit', function(event) { 
            var valdate = jqd('#datetimes').val();
            var mc = jqd('.valmcs').text();
            var varm = mc.split("Mc. ");
            var varmc = varm[1]
            var res = valdate.split("/");
            var yyyy = res[0];
            var mmmm = res[1];
            var dddd = res[2];
        
            $.get("{{ url('momc/readdmc') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd +'/' +varmc, function (data) {
              // data.result[0].Pra
              var outputtarget = data.Result[0].Pra;
              var countrow  = data.Result[0].countrow;
              var sumoee = data.Result[0].Oeea;
              var totaloee = (sumoee/countrow);
              if (isNaN(totaloee) == true)
              {
                (totaloee = 0);
              }

              var diffoutput = data.Result[0].Prt - data.Result[0].Pra;
              var sumserb1 = data.Result[0].S1;
              var sumserb2 = data.Result[0].S2;
              var sumserb3 = data.Result[0].S3;
              var sumserb4 = data.Result[0].S4;
              var sumserb5 = data.Result[0].S5;
              var sumserb6 = data.Result[0].S6;
              var sumserb7 = data.Result[0].S7;
              var sumserb8 = data.Result[0].S8;
             // alert(totaloee.toFixed(2));

              var downtime  = (parseInt(sumserb1) + parseInt(sumserb3) + parseInt(sumserb4) + parseInt(sumserb6) + parseInt(sumserb7) + parseInt(sumserb8));
              //alert(diffoutput);
              $('.b1').text(parseInt(sumserb1)+' sec'  || 0 +' sec') ;
              $('.b2').text(parseInt(sumserb2)+' sec'  || 0 +' sec');
              $('.b3').text(parseInt(sumserb3)+' sec'  || 0 +' sec');
              $('.b4').text(parseInt(sumserb4)+' sec'  || 0 +' sec');
              $('.b5').text(parseInt(sumserb5)+' sec'  || 0 +' sec');
              $('.b6').text(parseInt(sumserb6)+' sec'  || 0 +' sec');
              $('.OEE').text(totaloee.toFixed(2) + ' %');
              $('.OUTPUT').text(parseInt(outputtarget)+' item'  || 0 +' item');
              $('.DIFF').text(parseInt(diffoutput)+' item'  || 0 +' item');
               // alert(outputtarget);
               $('.DOWN').text(parseInt(downtime)+' sec'  || 0 +' sec');
               // alert(data.DatatoChart)
                console.log(data) 
               
                //  "use strict";
                  var bar = new Morris.Bar({
                  element: 'bar-charts',
                  resize: true,
                  data: data.DatatoChart,

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
      <script type="text/javascript">
        var jqd = $.noConflict(); 
        var defaultDate = new Date(); 
          jqd(function () {
          jqd('#datetimes').datetimepicker({
                  format: 'YYYY/MM/DD',
                  defaultDate: defaultDate
              });


              var valdate = jqd('#datetimes').val();
              var mc = jqd('.valmcs').text();
              var varm = mc.split("Mc. ");
              var varmc = varm[1]
              var res = valdate.split("/");
              var yyyy = res[0];
              var mmmm = res[1];
              var dddd = res[2];

              jqd.get("{{ url('momc/readdmc') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd +'/' +varmc, function (data) {
                 // data.result[0].Pra
              var outputtarget = data.Result[0].Pra;
              var countrow  = data.Result[0].countrow;
              var sumoee = data.Result[0].Oeea;
              var totaloee = (sumoee/countrow);
             

              var diffoutput = data.Result[0].Prt - data.Result[0].Pra;
              var sumserb1 = data.Result[0].S1;
              var sumserb2 = data.Result[0].S2;
              var sumserb3 = data.Result[0].S3;
              var sumserb4 = data.Result[0].S4;
              var sumserb5 = data.Result[0].S5;
              var sumserb6 = data.Result[0].S6;
              var sumserb7 = data.Result[0].S7;
              var sumserb8 = data.Result[0].S8;
             // alert(totaloee.toFixed(2));
             if (isNaN(totaloee) == true)
              {
                (totaloee = 0);
              }
      

              var downtime  = (parseInt(sumserb1) + parseInt(sumserb3) + parseInt(sumserb4) + parseInt(sumserb6) + parseInt(sumserb7) + parseInt(sumserb8));
            //  alert(sumserb8);
                jqd('.b1').text(parseInt(sumserb1)  || 0 +' sec') ;
                jqd('.b2').text(parseInt(sumserb2)  || 0 +' sec');
                jqd('.b3').text(parseInt(sumserb3)  || 0 +' sec');
                jqd('.b4').text(parseInt(sumserb4)  || 0 +' sec');
                jqd('.b5').text(parseInt(sumserb5)  || 0 +' sec');
                jqd('.b6').text(parseInt(sumserb6)  || 0 +' sec');
                jqd('.OEE').text(totaloee.toFixed(2) + ' %');
                jqd('.OUTPUT').text(parseInt(outputtarget) || 0 +' item');
                jqd('.DIFF').text(parseInt(diffoutput) || 0 +' item');
               // alert(outputtarget);
                jqd('.DOWN').text(parseInt(downtime)  || 0 +' sec');
                
               // console.log(data) 
         
         
              })
          });
        </script>

@endsection 
 
