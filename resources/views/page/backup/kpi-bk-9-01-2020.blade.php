@extends('includepage.template_master')
@section('content')



<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box " style="background: white;">
      <div class="inner ">
        <h3 class = "target"></h3>

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
        <h3 class = "oees"></h3>

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
    <!-- LINE CHART -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>AY1</b></h3>
        <div class="box-tools pull-right">       
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="573" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.546875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,261H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,202H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,143H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,84H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,25H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="458.83970610571083" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="242.72932487849332" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#3c8dbc" d="M62.046875,229.5412C75.62758201701094,229.2108,102.78899605103281,231.53245,116.36970306804375,228.2196C129.95041008505467,224.90675000000002,157.11182411907657,204.50514644808743,170.6925311360875,203.0384C184.12562177247875,201.58759644808742,210.99180304526124,219.34895,224.4248936816525,216.5494C237.85798431804375,213.74984999999998,264.72416559082626,183.43358661202186,278.1572562272175,180.642C291.7379632442284,177.81973661202184,318.8993772782503,191.15875,332.48008429526124,194.094C346.06079131227216,197.02925,373.22220534629406,218.06921420765028,386.802912363305,204.124C400.2360029996962,190.33036420765026,427.1021842724788,91.8402361878453,440.53527490887,83.1386C453.8207491646416,74.53258618784531,480.39169767618466,125.20556758241757,493.67717193195625,134.89339999999999C507.2578789489672,144.79651758241758,534.4192929829891,154.85015,548,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.046875" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="116.36970306804375" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="170.6925311360875" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="224.4248936816525" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="278.1572562272175" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.48008429526124" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="386.802912363305" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="440.53527490887" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="493.67717193195625" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="548" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  <div class="col-md-4">
    <!-- LINE CHART -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>AY2</b></h3>
        <div class="box-tools pull-right">        
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="573" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.546875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,261H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,202H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,143H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,84H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,25H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="458.83970610571083" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="242.72932487849332" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#3c8dbc" d="M62.046875,229.5412C75.62758201701094,229.2108,102.78899605103281,231.53245,116.36970306804375,228.2196C129.95041008505467,224.90675000000002,157.11182411907657,204.50514644808743,170.6925311360875,203.0384C184.12562177247875,201.58759644808742,210.99180304526124,219.34895,224.4248936816525,216.5494C237.85798431804375,213.74984999999998,264.72416559082626,183.43358661202186,278.1572562272175,180.642C291.7379632442284,177.81973661202184,318.8993772782503,191.15875,332.48008429526124,194.094C346.06079131227216,197.02925,373.22220534629406,218.06921420765028,386.802912363305,204.124C400.2360029996962,190.33036420765026,427.1021842724788,91.8402361878453,440.53527490887,83.1386C453.8207491646416,74.53258618784531,480.39169767618466,125.20556758241757,493.67717193195625,134.89339999999999C507.2578789489672,144.79651758241758,534.4192929829891,154.85015,548,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.046875" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="116.36970306804375" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="170.6925311360875" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="224.4248936816525" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="278.1572562272175" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.48008429526124" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="386.802912363305" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="440.53527490887" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="493.67717193195625" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="548" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  <div class="col-md-4">
    <!-- LINE CHART -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><b>AY3</b></h3>
       <!-- <img src = 
        "im/sssss.jpg" alt = "thumbnail-image" style = "width:400px"> -->
        <div class="box-tools pull-right">       
        </div>
      </div>
      <div class="box-body chart-responsive">
        <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="573" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.546875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,261H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,202H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,143H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,84H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.046875,25H548" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="458.83970610571083" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="242.72932487849332" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="none" stroke="#3c8dbc" d="M62.046875,229.5412C75.62758201701094,229.2108,102.78899605103281,231.53245,116.36970306804375,228.2196C129.95041008505467,224.90675000000002,157.11182411907657,204.50514644808743,170.6925311360875,203.0384C184.12562177247875,201.58759644808742,210.99180304526124,219.34895,224.4248936816525,216.5494C237.85798431804375,213.74984999999998,264.72416559082626,183.43358661202186,278.1572562272175,180.642C291.7379632442284,177.81973661202184,318.8993772782503,191.15875,332.48008429526124,194.094C346.06079131227216,197.02925,373.22220534629406,218.06921420765028,386.802912363305,204.124C400.2360029996962,190.33036420765026,427.1021842724788,91.8402361878453,440.53527490887,83.1386C453.8207491646416,74.53258618784531,480.39169767618466,125.20556758241757,493.67717193195625,134.89339999999999C507.2578789489672,144.79651758241758,534.4192929829891,154.85015,548,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.046875" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="116.36970306804375" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="170.6925311360875" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="224.4248936816525" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="278.1572562272175" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.48008429526124" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="386.802912363305" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="440.53527490887" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="493.67717193195625" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="548" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
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
                <div class="chart">
                  <canvas id="areaChart" style="height:300px"></canvas>
                </div>  
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
          var todayS = yyyy + '-' + mm + '-' + dd + ' 00:00:00'
          var todayE = yyyy + '-' + mm + '-' + dd + ' 23:59:59'
         // var todayE = yyyy + '-' + mm + '-' + dd + ' ' + timeHs + ':'+ timeMs + ':'+ timeSs;

      $.get("{{ url('kpireaddatamc/readdata') }}"+ '/' + todayS + '/' + todayE, function (data) {
       // parseInt(data.Result[0].S1);
      var countr = data.result[0].countrow;
      //parseInt(data.Result[0].S1);
      //var targers = data.result[0].Prt;
      //var outputs =  data.result[0].Pra;
      var targers =  parseInt(data.result[0].Prt);
      var outputs =  parseInt(data.result[0].Pra);
      var mcrun  = data.countmcRe_McNumber.length;
      var mctotal = data.countmcMc_Number.length;
      var oees = (data.result[0].Oeea / countr).toFixed(2);
     // var oles ='';
     //alert(oees);
     // alert(todayS + ' ' +todayE + ' ' +targers + ' ' +outputs + ' ' +oees + ' ' +oles);
      $('.target').text(targers +' / '+ outputs);
      $('.dateyimeN').text(todayS +' to '+ todayE);
      $('.mcrun').text(mctotal +' Mc. / '+ mcrun +' Run');   
      $('.oees').text(oees +' %');
      $('.oles').text(0 +' %');
      $('.btndate').text(todayS +' to '+ todayE);      
    //##########################################################  Chart   ##############################################################
      console.log(data)  
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
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : targetcharta
          },
          {//234, 243, 246
            label               : 'AC',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
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
 
