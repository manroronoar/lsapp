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
          <div>col</div>  
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
                      <div class="" id='myChart'></div>
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
                      <div class="" id='myChartoee'></div>
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
                      <div class="" id='myChartole'></div>
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
            <!--<tfoot>
            <tr>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
            </tr>
            </tfoot>-->
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
    //  alert(countr1 + ' ' + targers1 + ' ' +outputs1 + ' ' + difftargers1 + ' ' +mcrun1 + ' ' +mctotal1 + ' ' + oees1);
    //  <h5>target<span class="pull-right  "><i class=""></i> 1200 </span></h5>     
    //  <h5>Mc001<span class="pull-right  "><i class=""></i> run</span></h5>       
        $('#example1').DataTable({
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

   <script type="text/javascript">
   var gaugeay1 = 750;
   var gaugeay2 = 100;
   var gaugeay3 = 100;
   
        var myConfigay1 = {
            type: "gauge",
            globals: {
            fontSize: 15
            },
            plotarea:{
            marginTop:100
            },
            plot:{
            size:'100%',
            valueBox: {
                placement: 'center',
                text:'%v', //default
                fontSize:35,
                rules:[
                {
                    rule: '%v >= ' + gaugeay1,
                    text: '%v<br>EXCELLENT'
                },
                {
                    rule: '%v < 700 && %v > 640',
                    text: '%v<br>Good'
                },
                {
                    rule: '%v < 640 && %v > 580',
                    text: '%v<br>Fair'
                },
                {
                    rule: '%v <  580',
                    text: '%v<br>Bad'
                }   
                ]
            }
            },
        tooltip:{
            borderRadius:5
        },
            scaleR:{
            aperture:180,
            minValue:300,
            maxValue:850,
            step:50,
            center:{
                visible:false
            },
            tick:{
                visible:false
            },
            item:{
                offsetR:0,
                rules:[
                {
                    rule:'%i == 9',
                    offsetX:15
                }
                ]
            },
            labels:['0','','','','','','580','640','700','750','','850'],
            ring:{
                size:30,
                rules:[
                {
                    rule:'%v <= 580',
                    backgroundColor:'#E53935'
                },
                {
                    rule:'%v > 580 && %v < 640',
                    backgroundColor:'#EF5350'
                },
                {
                    rule:'%v >= 640 && %v < 700',
                    backgroundColor:'#FFA726'
                },
                {
                    rule:'%v >= 700',
                    backgroundColor:'#29B6F6'
                }      
                ]
            }
            },
        
            series : [
                {
                    values : [gaugeay1], // starting value
                    backgroundColor:'black',
                indicator:[3,1,20,20,0.5],
                animation:{  
                effect:2,
                method:1,
                sequence:4,
                speed: 900
            },
                }
            ]
        };

        zingchart.render({ 
            id : 'myChart', 
            data : myConfigay1, 
            height: 300, 
            width: '100%'
        });


        var myConfigoee = {
            type: "gauge",
            globals: {
            fontSize: 15
            },
            plotarea:{
            marginTop:100
            },
            plot:{
            size:'100%',
            valueBox: {
                placement: 'center',
                text:'%v', //default
                fontSize:35,
                rules:[
                {
                    rule: '%v >= 700',
                    text: '%v<br>EXCELLENT'
                },
                {
                    rule: '%v < 700 && %v > 640',
                    text: '%v<br>Good'
                },
                {
                    rule: '%v < 640 && %v > 580',
                    text: '%v<br>Fair'
                },
                {
                    rule: '%v <  580',
                    text: '%v<br>Bad'
                }   
                ]
            }
            },
        tooltip:{
            borderRadius:5
        },
            scaleR:{
            aperture:180,
            minValue:300,
            maxValue:850,
            step:50,
            center:{
                visible:false
            },
            tick:{
                visible:false
            },
            item:{
                offsetR:0,
                rules:[
                {
                    rule:'%i == 9',
                    offsetX:15
                }
                ]
            },
            labels:['300','','','','','','580','640','700','750','','850'],
            ring:{
                size:30,
                rules:[
                {
                    rule:'%v <= 580',
                    backgroundColor:'#E53935'
                },
                {
                    rule:'%v > 580 && %v < 640',
                    backgroundColor:'#EF5350'
                },
                {
                    rule:'%v >= 640 && %v < 700',
                    backgroundColor:'#FFA726'
                },
                {
                    rule:'%v >= 700',
                    backgroundColor:'#29B6F6'
                }      
                ]
            }
            },
        
            series : [
                {
                    values : [800], // starting value
                    backgroundColor:'black',
                indicator:[3,1,20,20,0.5],
                animation:{  
                effect:2,
                method:1,
                sequence:4,
                speed: 900
            },
                }
            ]
        };

        zingchart.render({ 
            id : 'myChartoee', 
            data : myConfigoee, 
            height: 300, 
            width: '100%'
        });


        var myConfigole = {
            type: "gauge",
            globals: {
            fontSize: 15
            },
            plotarea:{
            marginTop:100
            },
            plot:{
            size:'100%',
            valueBox: {
                placement: 'center',
                text:'%v', //default
                fontSize:35,
                rules:[
                {
                    rule: '%v >= 700',
                    text: '%v<br>EXCELLENT'
                },
                {
                    rule: '%v < 700 && %v > 640',
                    text: '%v<br>Good'
                },
                {
                    rule: '%v < 640 && %v > 580',
                    text: '%v<br>Fair'
                },
                {
                    rule: '%v <  580',
                    text: '%v<br>Bad'
                }   
                ]
            }
            },
        tooltip:{
            borderRadius:5
        },
            scaleR:{
            aperture:180,
            minValue:300,
            maxValue:850,
            step:50,
            center:{
                visible:false
            },
            tick:{
                visible:false
            },
            item:{
                offsetR:0,
                rules:[
                {
                    rule:'%i == 9',
                    offsetX:15
                }
                ]
            },
            labels:['300','','','','','','580','640','700','750','','850'],
            ring:{
                size:30,
                rules:[
                {
                    rule:'%v <= 580',
                    backgroundColor:'#E53935'
                },
                {
                    rule:'%v > 580 && %v < 640',
                    backgroundColor:'#EF5350'
                },
                {
                    rule:'%v >= 640 && %v < 700',
                    backgroundColor:'#FFA726'
                },
                {
                    rule:'%v >= 700',
                    backgroundColor:'#29B6F6'
                }      
                ]
            }
            },
        
            series : [
                {
                    values : [800], // starting value
                    backgroundColor:'black',
                indicator:[3,1,20,20,0.5],
                animation:{  
                effect:2,
                method:1,
                sequence:4,
                speed: 900
            },
                }
            ]
        };

        zingchart.render({ 
            id : 'myChartole', 
            data : myConfigole, 
            height: 300, 
            width: '100%'
        });
    
</script>
     
 
@endsection     
 
