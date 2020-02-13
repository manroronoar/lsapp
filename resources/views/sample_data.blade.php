

<html>
  <head>
    <title>Simple Gauge Visualization</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta charset='utf-8' />
    <script src="https://d3js.org/d3.v4.min.js"></script>
    
    <style>
    text {
      font-family: "Verdana", sans-serif;
    }
    #chart {
      max-width: 500px;
    }
    </style>
  </head>
  <body>
    <button id="random">Random Number</button>
    <div id="chart"></div>
   
</body>

<script>
function randNumberBounds(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

(function() {
  var gauge = gaugeChart()
    .width(260)
    .height(200)
    .innerRadius(50)
    .outerRadius(80);

  d3.select("#chart").datum([randNumberBounds(0, 100)]).call(gauge);

  function resize() {
    var gWidth = Math.min(d3.select("#chart").node().offsetWidth, 260);
    gauge.width(gWidth).innerRadius(gWidth / 4).outerRadius((gWidth / 4) + 40);
    d3.select("#chart").call(gauge);
  }

  resize();
  window.addEventListener("resize", resize);

  var button = document.getElementById("random");
  button.addEventListener("click", function() {
    d3.select("#chart").datum([randNumberBounds(0, 100)]).call(gauge);
  });
})()
</script>
</html>
