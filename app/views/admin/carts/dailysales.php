<?php include_once(VIEWS. 'header.php') ?>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['bar']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
       var data = google.visualization.arrayToDataTable([
          ["Fecha", "ventas"],
          <?php
            $string = '';
            foreach($data['data'] as $sale)
            {
                $string.="['" . $sale->date . "', ";
                $string.= $sale->sale . "],";
            }
            print rtrim($string, ',');
           ?>
       ]);
       var options = {
           chart: {
               title:"Ventas diarias",
               subtitle:"MVC2019"
           },
           colors : ["lightblue"],
           fontSize : 35,
           fontName : "Times",
           bars: "horizontal"
       }
       var chart = new google.charts.Bar(document.getElementById("chart"));
       chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
<div id="chart"></div>

<?php include_once(VIEWS. 'footer.php') ?>