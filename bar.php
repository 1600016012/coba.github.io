
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

 //barchart1
        var BarChartData='<?php echo $BarChartData ?>';
        var bar_data = new google.visualization.arrayToDataTable(JSON.parse(BarChartData));

        var bar_options = {
        
          'title':'<?php  echo $BarChartTitle;?>' ,
          legend: {position: 'top'},
          colors:['purple']
         };
         var bar_chart = new google.visualization.ColumnChart(document.getElementById('curve_div'));
        bar_chart.draw(bar_data, bar_options);

  //barchart2
        var BarChartData2='<?php echo $BarChartData2 ?>';
        var bar_data2 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData2));

        var bar_options2 = {
          'title':'<?php  echo $BarChartTitle2;?>' ,
          legend: {position: 'top'},
          colors: ['lime']
         };

        var bar_chart2 = new google.visualization.ColumnChart(document.getElementById('kurva_div'));
        bar_chart2.draw(bar_data2, bar_options2);
        
//barchart3
        var BarChartData3='<?php echo $BarChartData3 ?>';
        var bar_data3 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData3));

        var bar_options3 = {
          'title':'<?php  echo $BarChartTitle3;?>' ,
          legend: {position: 'top'},
          colors: ['red']
         };

        var bar_chart3 = new google.visualization.ColumnChart(document.getElementById('curv_div'));
        bar_chart3.draw(bar_data3, bar_options3);

//barchart4
        var BarChartDataA='<?php echo $BarChartDataA ?>';
        var bar_dataA = new google.visualization.arrayToDataTable(JSON.parse(BarChartDataA));

        var bar_optionsA = {
          'title':'<?php  echo $BarChartTitleA;?>' ,
          legend: {position: 'top'},
          colors: ['orange']
         };

        var bar_chartA = new google.visualization.ColumnChart(document.getElementById('kurv_div'));
        bar_chartA.draw(bar_dataA, bar_optionsA);


  //barchart5
        var BarChartData5='<?php echo $BarChartData5 ?>';
        var bar_data5 = new google.visualization.arrayToDataTable(JSON.parse(BarChartData5));

        var bar_options5 = {
          'title':'<?php  echo $BarChartTitle5;?>' ,
          legend: {position: 'top'},
          colors: ['blue']
         };

        var bar_chart5 = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        bar_chart5.draw(bar_data5, bar_options5);
      }
        
    </script>
  </head>

  <body bgcolor="C0C0C0">
  
      <br><h1> <center> Diagram Visualisasi Informasi Pendataan PHBS Tingkat Kota </center></h1><br><br>

    <center>
     <table>
       <tr>
        <td>
          <div id="curve_div"></div><br>
          <div id="kurva_div"></div>
        </td><td></td><td></td><td></td>
        <td>
           <div id="curv_div"></div><br>
          <div id="kurv_div"></div>
        </td><td></td><td></td><td></td>
        <td><div id="chart_div"></div></td>
       </tr>
     </table></center>
      
  </body>
</html>