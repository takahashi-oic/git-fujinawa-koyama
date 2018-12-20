<?php
    session_start();
try {
    //DB接続
    //host localhost,192.168.201.xxxなど 106koya 99 ju
            $url = parse_url(getenv('DATABASE_URL'));
            $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["dbname"],ltrim($url["path"],"/")));
            

    //---ここから処理---
    $stmt = $pdo->prepare("SELECT count(*) as count, result FROM questionnaire_result GROUP BY result ORDER BY count DESC");
    $stmt->execute();

    $resultArray = array();
    //結果取得 連想配列へ
    while ($row = $stmt->fetch()) {
        $resultArray[$row['result']] = $row['count'];
    }
    //test
    /* echo("count<br>");
      print_r($resultArray); */

    //---ここまで処理---
} catch (PDOException $e) {
    //エラー
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
} finally {
    // 接続を解除
    $pdo = null;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <title>グラフ作成ページ</title>
    </head>

    <body>
        <header>
            <div class="card-panel row s12 light-green lighten-1" id="test1"><span class="white-text">アンケートグラフ作成ページ</span></div>


            <div class="col s12">
                <ul class="tabs">
                    <?php if(isset($_SESSION["userid"])){?>
                    <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
                    <?php }else {?>
                        <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                    <?php               }?>
                    <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
                </ul>
            </div>
        </header>

        <!-- Dropdown Trigger -->
        <div>
            <a class='dropdown-tr btn' href='#' data-target='dropdown1'>グラフを表示</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!" id="piechart">円グラフ</a></li>
                <li><a href="#!" id="barchart">棒グラフ</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="#!">グラフ１</a></li>
                <li><a href="#!">グラフ２</a></li>
                <li><a href="#!">グラフ３</a></li>
            </ul>
        </div>
        <canvas id="myChart" class=""/>


        <!-- ここからjavascript -->
        <script>
            $(function () {
                $('.dropdown-tr').dropdown();
            });
        </script>

        <script>
            // ---ここから円グラフ---
            //phpからJSON key=場所val=数
            var json = <?php echo json_encode($resultArray); ?>

            //配列に変換
            var data = new Array(json.length);
            var labels = new Array(json.length);

            data = Object.values(json);
            labels = Object.keys(json);

            //--- ラベル
            /*var dataLabelPlugin = {
             afterDatasetsDraw: function (chart, easing) {
             // To only draw at the end of animation, check for easing === 1
             var ctx = chart.ctx;
             
             chart.data.datasets.forEach(function (dataset, i) {
             var dataSum = 0;
             dataset.data.forEach(function (element) {
             dataSum += element;
             });
             
             var meta = chart.getDatasetMeta(i);
             if (!meta.hidden) {
             meta.data.forEach(function (element, index) {
             // Draw the text in black, with the specified font
             ctx.fillStyle = 'rgb(255, 255, 255)';
             
             var fontSize = 12;
             var fontStyle = 'normal';
             var fontFamily = 'Helvetica Neue';
             ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
             
             // Just naively convert to string for now
             var labelString = chart.data.labels[index];
             var dataString = (Math.round(dataset.data[index] / dataSum * 1000) / 10).toString() + "%";
             
             // Make sure alignment settings are correct
             ctx.textAlign = 'center';
             ctx.textBaseline = 'middle';
             
             var padding = 5;
             var position = element.tooltipPosition();
             ctx.fillText(labelString, position.x, position.y - (fontSize / 2) - padding);
             ctx.fillText(dataString, position.x, position.y + (fontSize / 2) - padding);
             });
             }
             });
             }
             };*/
            //---ラベルおわり
            // 参考 https://beiznotes.org/data-label-on-chart-js/
            //グラフの色セット
            var colorSet = [
                "#9ccc65",
                "#039be5",
                "#ff9800",
                "#5e35b1",
                "#fdd835",
                "#e53935",
                "#d4e157",
                "#4fc3f7",
                "#ffb74d",
                "#ab47bc",
                //--区切り--
                "#9ccc65",
                "#039be5",
                "#ff9800",
                "#5e35b1",
                "#fdd835",
                "#e53935",
                "#d4e157",
                "#4fc3f7",
                "#ffb74d",
                "#ab47bc"
            ];

            var pieConfig = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: data,
                            backgroundColor: colorSet
                        }],
                    labels: labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
                //plugins: [dataLabelPlugin]
            };
            // ---ここまで円グラフ---
            // ---ここから棒グラフ---
            var barConfig = {
                type: 'bar',
                data: {
                    datasets: [{
                            data: data,
                            backgroundColor: colorSet
                        }],
                    labels: labels
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    min: 0
                                }
                            }
                        ]
                    },
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで棒グラフ---
            //グローバル
            var myChart;
            var ctx = document.getElementById("myChart").getContext('2d');

            /*円グラフ*/
            document.getElementById("piechart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 500;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, pieConfig);
            };
            /*棒グラフ*/
            document.getElementById("barchart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, barConfig);
            };
        </script>
    </body>
</html>


