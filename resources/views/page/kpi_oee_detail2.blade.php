@extends('includepage.template_master')
@section('content')

<form method="post"   id="sample_form" class="form-horizontal">   
  @csrf
     




<div class="box ">
  <div class="box-header with-border">
    <h3 class="box-title  valmcs"><b>Mc. {{$mcnumberkey}} </b></h3>
  </div>
  <div class="box-body">
   
      <div class="col-md-4" align="right">
      </div>

      <div class="input-group col-md-8" align="right">
        <span class="input-group-addon">Shift:</span>
        <select class="form-control" name="Hs_Shift" id="Hs_Shift">
          <option value="All">All</option>
            @foreach ($listshift as $item) 
        <option  value="{{$item->Sh_Name}}">{{$item['Sh_Name']}}</option>
            @endforeach
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

    
<!--************************************************************************************************************ -->
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon "><i class="ion ion-ios-gear-outline"></i></span>

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
            <span class="info-box-icon "><i class="ion ion-ios-gear-outline"></i></span>

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
            <span class="info-box-icon "><i class="ion ion-ios-gear-outline"></i></span>

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
            <span class="info-box-icon "><i class="ion ion-ios-gear-outline"></i></span>

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
           <tr class="color-palette" style="background-color: rgb(204, 204, 204);">
               @foreach ( $datakey as $item) 
               <th scope="row" class="text-center">BIT {{ $item['Bi_Type'] }}</th>
               
                @endforeach
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

            <div class="box box">
              <div class="box-header with-border">
                <h3 class="box-title">Output To Chart</h3>
  
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


            <div  id ="addrow">
             <div class="chart" id="content"></div> 
            </div>

           
      </form>
  

      <script>
        $(document).ready(function(){
          var valdate = $('#datetimeS').val();
            var valdateE = $('#datetimeE').val();
            var typeday = '';

            var mc = $('.valmcs').text();
            var varm = mc.split("Mc. ");
            var varmc = varm[1]

            var res = valdate.split("/");
            var yyyy = res[0];
            var mmmm = res[1];
            var dddd = res[2];

            var rese = valdateE.split("/");
            var yyyye = rese[0];
            var mmmme = rese[1];
            var dddde = rese[2];


            var shift = $('#Hs_Shift').val();

            var dateStart = new Date($("#datetimeS").val());
            var dateEnd =  new Date($("#datetimeE").val())
            var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
            var typeday = 'D';
                  
            $.get("{{ url('oeeds/readdmc') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd + '/' + yyyye + '/' + mmmme+ '/' + dddde +'/' +varmc  +'/' +shift +'/' + typeday, function (data) {
                           
                           var outputtarget = parseInt(data.Result[0].Pra);
                           var countrow  = parseInt(data.Result[0].countrow);
                           var sumoee = parseInt(data.Result[0].Oeea);
                           var totaloee = (sumoee/countrow).toFixed(2);  
                           var diffoutput = parseInt(data.Result[0].Prt - data.Result[0].Pra);
                           
                           var sumserb1 = parseInt(data.Result[0].S1);
                           var sumserb2 = parseInt(data.Result[0].S2);
                           var sumserb3 = parseInt(data.Result[0].S3);
                           var sumserb4 = parseInt(data.Result[0].S4);
                           var sumserb5 = parseInt(data.Result[0].S5);
                           var sumserb6 = parseInt(data.Result[0].S6);
                           var sumserb7 = parseInt(data.Result[0].S7);
                           var sumserb8 = parseInt(data.Result[0].S6);
                          
                           if (isNaN(outputtarget) == true || isNaN(countrow) == true || isNaN(sumoee) == true ||
                               isNaN(totaloee) == true || isNaN(diffoutput) == true || isNaN(sumserb1) == true ||
                               isNaN(sumserb2) == true || isNaN(sumserb3) == true || isNaN(sumserb4) == true || 
                               isNaN(sumserb5) == true || isNaN(sumserb6) == true || isNaN(sumserb7) == true || isNaN(sumserb8) == true )
                               {
                                outputtarget = 0;
                                countrow= 0;
                                sumoee = 0;
                                totaloee = 0;
                                diffoutput = 0;
                                sumserb1 = 0;
                                sumserb2 = 0;
                                sumserb3 = 0;
                                sumserb4 = 0;
                                sumserb5 = 0;
                                sumserb6 = 0;
                                sumserb7 = 0;
                                sumserb8 = 0;
                               }
                       
                           // alert(totaloee.toFixed(2));
                         // alert(sumserb1 +'  '+  sumserb2+'  '+  sumserb3+'  '+  sumserb4+'  '+  sumserb5+'  '+  sumserb6+'  '+  sumserb7);

                           var downtime  = (sumserb1 + sumserb3 + sumserb4 + sumserb6 + sumserb7 + sumserb8) ;
                           //alert(diffoutput);
                          
                          
                           $('.b1').text(((sumserb1 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b2').text(((sumserb2 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b3').text(((sumserb3 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b4').text(((sumserb4 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b5').text(((sumserb5 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b6').text(((sumserb6 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.OEE').text(totaloee + ' %') ;
                           $('.OUTPUT').text(outputtarget + ' Item');
                           $('.DIFF').text(diffoutput + ' Item');
                             // alert(outputtarget);
                           $('.DOWN').text(((downtime / 60 / 60).toFixed(2)) + ' Hr.');
                             // alert(data.DatatoChart)
                             console.log(data) 

                             $("#bar-charts").empty();
                         if(data.DatatoChart  != 0)
                               {
                             //   alert(data.DatatoChart.length)  ;
                             
                                   $("#bar-charts").empty();
                                         //  "use strict";
                                           var bar = new Morris.Bar({
                                           element: 'bar-charts',
                                           resize: true,
                                           data: data.DatatoChart,

                                             barColors: ['#7D7D7D'],
                                             lineColors: '#7D7D7D',
                                             grid  : {
                                                 borderWidth: 1,
                                                 borderColor: '#000000',
                                                 tickColor  : '#000000'
                                               },
                                             xkey: 'y',
                                             ykeys: ['a'],
                                             labels: ['output'],
                                             hideHover: 'auto'
                                                   }); 
                               }
                       
                         });
                 
        });
      </script>

      <script>
        var jq = $.noConflict(); 
        jq(document).ready(function(){
         
        });
      </script>

        <script>
          $(document).on('click', '#summit', function(event) { 
            var valdate = $('#datetimeS').val();
            var valdateE = $('#datetimeE').val();
            var typeday = '';

            var mc = $('.valmcs').text();
            var varm = mc.split("Mc. ");
            var varmc = varm[1]

            var res = valdate.split("/");
            var yyyy = res[0];
            var mmmm = res[1];
            var dddd = res[2];

            var rese = valdateE.split("/");
            var yyyye = rese[0];
            var mmmme = rese[1];
            var dddde = rese[2];


            var shift = $('#Hs_Shift').val();

            var dateStart = new Date($("#datetimeS").val());
            var dateEnd =  new Date($("#datetimeE").val())
            var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
           //  alert(diffDays);
            //diffDays = diffDays + 1;

              if (dateStart <= dateEnd)
              {
                if (diffDays <= 30) 
                {
                      if(timeDiff > 0)
                      {
                        var typeday = 'M';
                      // alert(typeday + timeDiff);
                      $.get("{{ url('oeeds/readdmc') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd + '/' + yyyye + '/' + mmmme+ '/' + dddde +'/' +varmc  +'/' +shift +'/' + typeday, function (data) {
                           console.log(data) 

                           var outputtarget = parseInt(data.Result[0].Pra);
                           var countrow  = parseInt(data.Result[0].countrow);
                           var sumoee = parseInt(data.Result[0].Oeea);
                           var totaloee = (sumoee/countrow).toFixed(2);  
                           var diffoutput = parseInt(data.Result[0].Prt - data.Result[0].Pra);
                           
                           var sumserb1 = parseInt(data.Result[0].S1);
                           var sumserb2 = parseInt(data.Result[0].S2);
                           var sumserb3 = parseInt(data.Result[0].S3);
                           var sumserb4 = parseInt(data.Result[0].S4);
                           var sumserb5 = parseInt(data.Result[0].S5);
                           var sumserb6 = parseInt(data.Result[0].S6);
                           var sumserb7 = parseInt(data.Result[0].S7);
                           var sumserb8 = parseInt(data.Result[0].S6);
                          
                           if (isNaN(outputtarget) == true || isNaN(countrow) == true || isNaN(sumoee) == true ||
                               isNaN(totaloee) == true || isNaN(diffoutput) == true || isNaN(sumserb1) == true ||
                               isNaN(sumserb2) == true || isNaN(sumserb3) == true || isNaN(sumserb4) == true || 
                               isNaN(sumserb5) == true || isNaN(sumserb6) == true || isNaN(sumserb7) == true || isNaN(sumserb8) == true )
                               {
                                outputtarget = 0;
                                countrow= 0;
                                sumoee = 0;
                                totaloee = 0;
                                diffoutput = 0;
                                sumserb1 = 0;
                                sumserb2 = 0;
                                sumserb3 = 0;
                                sumserb4 = 0;
                                sumserb5 = 0;
                                sumserb6 = 0;
                                sumserb7 = 0;
                                sumserb8 = 0;
                               }
                       
                           // alert(totaloee.toFixed(2));
                         // alert(sumserb1 +'  '+  sumserb2+'  '+  sumserb3+'  '+  sumserb4+'  '+  sumserb5+'  '+  sumserb6+'  '+  sumserb7);

                           var downtime  = (sumserb1 + sumserb3 + sumserb4 + sumserb6 + sumserb7 + sumserb8) ;
                           //alert(diffoutput);
                          
                          
                           $('.b1').text(((sumserb1 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b2').text(((sumserb2 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b3').text(((sumserb3 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b4').text(((sumserb4 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b5').text(((sumserb5 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b6').text(((sumserb6 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.OEE').text(totaloee + ' %') ;
                           $('.OUTPUT').text(outputtarget + ' Item');
                           $('.DIFF').text(diffoutput + ' Item');
                             // alert(outputtarget);
                           $('.DOWN').text(((downtime / 60 / 60).toFixed(2)) + ' Hr.');
                             // alert(data.DatatoChart)
                       
                            
                            $('#addrow').empty();
                             $.each(data.DatatoChart, function (i,value) {
                                
                                  var ss = value.y;
                                  var ress = ss.split("/");
                                  yyyy = ress[0];
                                  mmmm = ress[1];
                                  dddd = ress[2];
                                  typeday = 'D';
                                 // alert(yyyy + mmmm + dddd);
                                 var key = 'Chart' + i;
                                 var data = 'data'+ key
                                      


                                  $.get("{{ url('oeeds/loopchart') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd + '/' + yyyye + '/' + mmmme+ '/' + dddde +'/' +varmc  +'/' +shift +'/' + typeday, function (data) {
                                    console.log(data) 

                                   //  Item
                                    var outputtargetl = (parseInt(data.Result[0].Pra) + ' Item');
                                    var countrowl  = parseInt(data.Result[0].countrow);
                                    var sumoeel = parseInt(data.Result[0].Oeea);
                                    var totaloeel = ((sumoee/countrow).toFixed(2) + ' %');  
                                    var diffoutputl = (parseInt(data.Result[0].Prt - data.Result[0].Pra) + ' Item');
                                       
                              
                                    var sumserb1t = ((((parseInt(data.Result[0].S1))  / 60 / 60).toFixed(2)) + ' Hr.');   
                                    var sumserb2t = ((((parseInt(data.Result[0].S2))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb3t = ((((parseInt(data.Result[0].S3))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb4t = ((((parseInt(data.Result[0].S4))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb5t = ((((parseInt(data.Result[0].S5))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb6t = ((((parseInt(data.Result[0].S6))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb7t = ((((parseInt(data.Result[0].S7))  / 60 / 60).toFixed(2)) + ' Hr.'); 
                                    var sumserb8t = ((((parseInt(data.Result[0].S8))  / 60 / 60).toFixed(2)) + ' Hr.'); 

                                    var downtime  = ((((parseInt(data.Result[0].S1) + parseInt(data.Result[0].S3) + parseInt(data.Result[0].S4) 
                                        + parseInt(data.Result[0].S6) + parseInt(data.Result[0].S7) + parseInt(data.Result[0].S8))  / 60 / 60) .toFixed(2))+ ' Hr.');
                                  // alert(sumserb1t);
                                    var CssAdd = '<div class="row">'
                                             +'<div class="col-md-12">'
                                             +'<div class="box">'
                                             +'<div class="box-header with-border">'
                                             +'<h3 class="box-title"><b>'+ ss +'</b></h3> '
                                             +'<div class="box-tools pull-right">'
                                             +'<strong class="btn "></strong>'
                                             +'</div> '
                                             +'</div>'
                                             +'<div class="box-body">'
                                           //  +'<div class="row"> '
                                              +'<div class="table-responsive">'
                                                +'<table id="user_table" class="table table-bordered table-striped dataTable no-footer">'
                                                  +'  <thead>'
                                                    +' <tr class="color-palette" style="background-color:  rgb(204, 204, 204);">'		
                                                      +'   <td scope="row" class="text-center" >BIT BUTOFF</td>'
                                                      +'   <td scope="row" class="text-center" >BIT MCRUNING</td>'
                                                      +'   <td scope="row" class="text-center" >BIT MCPM</td>'
                                                      +'   <td scope="row" class="text-center" >BIT MCSETUP</td>'
                                                      +'   <td scope="row" class="text-center" >BIT MCIDLE</td>'
                                                      +'   <td scope="row" class="text-center" >BIT MCDOWN</td>'
                                                      +' </tr>'
                                                      +' </thead>'
                                                      +' <tbody id="tb"> '                                        
                                                      +'  <tr role="row" class="odd" style="border: groove">'                                     
                                                      +'  <td scope="row" class="text-center" id="b6'+ dddd +'">'+sumserb6t+'</td>'
                                                      +'  <td scope="row" class="text-center" id="b5'+ dddd +'">'+sumserb5t+'</td>'
                                                      +'  <td scope="row" class="text-center" id="b4'+ dddd +'">'+sumserb4t+'</td>'
                                                      +'  <td scope="row" class="text-center" id="b3'+ dddd +'">'+sumserb3t+'</td>'
                                                      +'  <td scope="row" class="text-center" id="b2'+ dddd +'">'+sumserb2t+'</td>'
                                                      +'  <td scope="row" class="text-center" id="b1'+ dddd +'">'+sumserb1t+'</td>'      
                                                      +' </tr>'
                                                      +' </tbody>'
                                                      +' </table>'
                                              +' </div>'
                                            // +'</div>'

                                            +' <div class="row">'
                                            +' <div class="col-sm-3 col-xs-6">'
                                            +'   <div class="description-block border-right">'
                                          //  +'    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>'
                                            +'     <h5 class="description-header" id="oee'+ dddd +'">'+ totaloeel +'</h5>'
                                            +'     <span class="description-text">OEE</span>'
                                            +'   </div>'
                                            +'  </div>'
          
                                            +'  <div class="col-sm-3 col-xs-6">'
                                            +'   <div class="description-block border-right">'
                                          //  +'     <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>'
                                            +'      <h5 class="description-header" id="output'+ dddd +'">'+ outputtargetl +'</h5>'
                                            +'    <span class="description-text">OUTPUT</span>'
                                            +'  </div>'
                                            +' </div>'
      
                                            +'  <div class="col-sm-3 col-xs-6">'
                                            +'    <div class="description-block border-right">'
                                          //  +'      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>'
                                            +'      <h5 class="description-header" id="diffoutput'+ dddd +'">'+ diffoutputl +'</h5>'
                                            +'      <span class="description-text">DIFF OUTPUT</span>'
                                            +'     </div>'
                                            +'   </div>'

                                            +'  <div class="col-sm-3 col-xs-6">'
                                            +'    <div class="description-block">'
                                         //   +'       <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>'
                                            +'      <h5 class="description-header" id="diffoutput'+ dddd +'">'+ downtime +'</h5>'
                                            +'      <span class="description-text">DOWN</span>'
                                            +'    </div>'            
                                            +'  </div>'
                                            +' </div>'


                                             +'<div class="row">'
                                        
                                             +'<div class ="col-md-12" id="">'
                                             + '<div id ="'+ key +'"></div></div>'
                                             +'</div></div></div></div></div></div>'

                                  $('#addrow').append(CssAdd);
                                                   

                                    $(key).empty();
                                              //  "use strict";
                                                var bar = new Morris.Bar({
                                                element: key,
                                                resize: true,
                                                data: data.DatatoChart,

                                                  barColors: ['#7D7D7D'],
                                                  lineColors: '#7D7D7D',
                                                  grid  : {
                                                      borderWidth: 1,
                                                      borderColor: '#000000',
                                                      tickColor  : '#000000'
                                                    },
                                                  xkey: 'y',
                                                  ykeys: ['a'],
                                                  labels: ['output'],
                                                  hideHover: 'auto'
                                                        }); 
                                })                   
                              })

                             $("#bar-charts").empty();
                              if(data.DatatoChart  != 0)
                                    {
                                  //   alert(data.DatatoChart.length)  ;
                                  
                                        $("#bar-charts").empty();
                                              //  "use strict";
                                                var bar = new Morris.Bar({
                                                element: 'bar-charts',
                                                resize: true,
                                                data: data.DatatoChart,

                                                  barColors: ['#7D7D7D'],
                                                  lineColors: '#7D7D7D',
                                                  grid  : {
                                                      borderWidth: 1,
                                                      borderColor: '#000000',
                                                      tickColor  : '#000000'
                                                    },
                                                  xkey: 'y',
                                                  ykeys: ['a'],
                                                  labels: ['output'],
                                                  hideHover: 'auto'
                                                        }); 
                                    }
                       
                               });
                      }
                      else if (timeDiff == 0)
                      {
                        var typeday = 'D';
                        $('#addrow').empty();
                      // alert(typeday) + timeDiff;
                      $.get("{{ url('oeeds/readdmc') }}" + '/' + yyyy + '/' + mmmm+ '/' + dddd + '/' + yyyye + '/' + mmmme+ '/' + dddde +'/' +varmc  +'/' +shift +'/' + typeday, function (data) {
                           
                           var outputtarget = parseInt(data.Result[0].Pra);
                           var countrow  = parseInt(data.Result[0].countrow);
                           var sumoee = parseInt(data.Result[0].Oeea);
                           var totaloee = (sumoee/countrow).toFixed(2);  
                           var diffoutput = parseInt(data.Result[0].Prt - data.Result[0].Pra);
                           
                           var sumserb1 = parseInt(data.Result[0].S1);
                           var sumserb2 = parseInt(data.Result[0].S2);
                           var sumserb3 = parseInt(data.Result[0].S3);
                           var sumserb4 = parseInt(data.Result[0].S4);
                           var sumserb5 = parseInt(data.Result[0].S5);
                           var sumserb6 = parseInt(data.Result[0].S6);
                           var sumserb7 = parseInt(data.Result[0].S7);
                           var sumserb8 = parseInt(data.Result[0].S6);
                          
                           if (isNaN(outputtarget) == true || isNaN(countrow) == true || isNaN(sumoee) == true ||
                               isNaN(totaloee) == true || isNaN(diffoutput) == true || isNaN(sumserb1) == true ||
                               isNaN(sumserb2) == true || isNaN(sumserb3) == true || isNaN(sumserb4) == true || 
                               isNaN(sumserb5) == true || isNaN(sumserb6) == true || isNaN(sumserb7) == true || isNaN(sumserb8) == true )
                               {
                                outputtarget = 0;
                                countrow= 0;
                                sumoee = 0;
                                totaloee = 0;
                                diffoutput = 0;
                                sumserb1 = 0;
                                sumserb2 = 0;
                                sumserb3 = 0;
                                sumserb4 = 0;
                                sumserb5 = 0;
                                sumserb6 = 0;
                                sumserb7 = 0;
                                sumserb8 = 0;
                               }
                       
                           // alert(totaloee.toFixed(2));
                         // alert(sumserb1 +'  '+  sumserb2+'  '+  sumserb3+'  '+  sumserb4+'  '+  sumserb5+'  '+  sumserb6+'  '+  sumserb7);

                           var downtime  = (sumserb1 + sumserb3 + sumserb4 + sumserb6 + sumserb7 + sumserb8) ;
                           //alert(diffoutput);
                          
                          
                           $('.b1').text(((sumserb1 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b2').text(((sumserb2 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b3').text(((sumserb3 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b4').text(((sumserb4 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b5').text(((sumserb5 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.b6').text(((sumserb6 / 60 / 60).toFixed(2)) + ' Hr.');
                           $('.OEE').text(totaloee + ' %') ;
                           $('.OUTPUT').text(outputtarget + ' Item');
                           $('.DIFF').text(diffoutput + ' Item');
                             // alert(outputtarget);
                           $('.DOWN').text(((downtime / 60 / 60).toFixed(2)) + ' Hr.');
                             // alert(data.DatatoChart)
                             console.log(data) 

                             $("#bar-charts").empty();
                         if(data.DatatoChart  != 0)
                               {
                             //   alert(data.DatatoChart.length)  ;
                             
                              $("#bar-charts").empty();
                                         //  "use strict";
                                           var bar = new Morris.Bar({
                                           element: 'bar-charts',
                                           resize: true,
                                           data: data.DatatoChart,

                                             barColors: ['#7D7D7D'],
                                             lineColors: '#7D7D7D',
                                             grid  : {
                                                 borderWidth: 1,
                                                 borderColor: '#000000',
                                                 tickColor  : '#000000'
                                               },
                                             xkey: 'y',
                                             ykeys: ['a'],
                                             labels: ['output'],
                                             hideHover: 'auto'
                                                   }); 
                               }
                       
                         });
                      }
                      else
                      {
                        alert('!!!! ERROR DATE');
                      }
                     
                  }
                  else
                  {
                    alert('!!!! ERROR OVER DATE <= 30 Days');
                  }
              }
              else
              {
                alert('!!!! ERROR DATE');
              }

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

         

@endsection 
 
