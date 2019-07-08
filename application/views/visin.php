<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['KELURAHAN', 'JML RT DIPANTAU'],
          ['Darat Sekip',     129],
          ['Sungai Bangkong',      385],
          ['Mariana',  158],
          ['Bangka Belitung Laut', 160],
          ['Saigon',    295],
        ]);

        var options = {
          title: 'Data Jumlah RT Dipantau'
        };

        var chart = new google.charts.Bar(document.getElementById('bar'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="bar" style="width: 900px; height: 500px;"></div>
  </body>
</html>