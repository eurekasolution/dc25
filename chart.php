<div class="row">
    <div class="col" id="chart1" style="width:100%; height:700px">
        구글차트
    </div>
</div>

<div class="row">
    <div class="col" id="chart2" style="width:100%; height:700px">
        구글차트
    </div>
</div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '입학생', '졸업생',  '휴학생',   '취업자수'],
          ['2021',  25,      20,    5,     15],
          ['2022',  25,      18,    7,  5],
          ['2023',  22,       21,   10, 20],
          ['2024',  17,      15,    3,  15]
        ]);

        var options = {
          title: '한문학과 재학생 현황황',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart1'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['학년', '학생수'],
          ['1학년',     16],
          ['2학년',      20],
          ['3학년',  13],
          ['4학년', 17],
          ['5학년이상',    7]
        ]);

        var options = {
          title: '한문학과 학년별 분포포'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart2'));

        chart.draw(data, options);
      }
    </script>