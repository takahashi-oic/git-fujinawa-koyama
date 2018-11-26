<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
        <title>グラフ作成ページ</title>
    </head>
    <body>
        <a>取ってきた値から棒グラフ、円グラフなどのグラフを表示させる</a>
        <input type ="button" value="戻る" id="back" onclick="location.href='user.php'">
        <input type ="button" value="グラフ作成" id="chart">
        
        <canvas id="myChart"></canvas>
        <script>
        document.getElementById("chart").onclick = function() {
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              
              data: {
                labels: ["M", "T", "W", "R", "F", "S", "S"],
                datasets: [{
                  label: 'apples',
                  data: [12, 19, 3, 17, 28, 24, 7],
                  backgroundColor: "rgba(153,255,51,1)"
                }, {
                  label: 'oranges',
                  data: [30, 29, 5, 5, 20, 3, 10],
                  backgroundColor: "rgba(255,153,0,1)"
                }]
              }
            });
        }
        </script>
        
        <?php
        // put your code here
        ?>
    </body>
</html>


