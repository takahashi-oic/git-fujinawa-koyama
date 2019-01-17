<?php
session_start();
try {
    //DB接続
    //host localhost,192.168.201.xxxなど 106koya 99 ju
    $url = parse_url(getenv('DATABASE_URL'));
    $pdo = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));


    //---ここから処理---
    //旧SQL 参考用
    /* $stmt = $pdo->prepare("SELECT count(*) as count, result FROM questionnaire_result GROUP BY result ORDER BY count DESC");
      $stmt->execute();

      $resultArray = array();
      //結果取得 連想配列へ
      while ($row = $stmt->fetch()) {
      $resultArray[$row['result']] = $row['count'];
      } */
    /* 性別取得 */
    $stmt = $pdo->prepare("SELECT count(sex) as num, sex FROM sex GROUP BY sex");
    $stmt->execute();

    $resultSex = array();
    while ($row = $stmt->fetch()) {
        $resultSex[$row['sex']] = $row['num'];
    }

    /* 年齢取得 */
    $stmt = $pdo->prepare("SELECT count(age) as num, age FROM age GROUP BY age ORDER BY age");
    $stmt->execute();

    $resultAge = array();
    while ($row = $stmt->fetch()) {
        $resultAge[$row['age'] . "代"] = $row['num'];
    }

    /* 目的 */
    $stmt = $pdo->prepare("SELECT count(purpose) as num, purpose FROM purpose GROUP BY purpose ORDER BY num DESC");
    $stmt->execute();

    $resultPurpose = array();
    while ($row = $stmt->fetch()) {
        $resultPurpose[$row['purpose']] = $row['num'];
    }

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
                    <?php if (isset($_SESSION["userid"])) { ?>
                        <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
                    <?php } else { ?>
                        <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                    <?php } ?>
                    <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
                </ul>
            </div>
        </header>

        <!-- Dropdown Trigger -->
        <div>
            <a class='dropdown-tr btn' href='#' data-target='dropdown1'>グラフを表示</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!" id="sexchart">性別</a></li>
                <li><a href="#!" id="agechart">年齢</a></li>
                <li><a href="#!" id="purposechart">目的</a></li>
                <!--<li><a href="#!" id="barchart">棒グラフ</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="#!">グラフ１</a></li>
                <li><a href="#!">グラフ２</a></li>
                <li><a href="#!">グラフ３</a></li>
                -->
            </ul>
        </div>
        <br>
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
            //var json = <?php //echo json_encode($resultArray);           ?>

            //配列に変換
            //var data = new Array(json.length);
            //var labels = new Array(json.length);

            //data = Object.values(json);
            //labels = Object.keys(json);

            //--- ラベル
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

            /*var pieConfig = {
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
             };*/
            // ---ここまで円グラフ---
            // ---ここから棒グラフ---
            /*var barConfig = {
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
             };*/
            // ---ここまで棒グラフ---
            // ---ここから性別---
            var sexJson = <?php echo json_encode($resultSex); ?>
            //配列に変換
            var sexData = new Array(sexJson.length);
            var sexLabels = new Array(sexJson.length);

            sexData = Object.values(sexJson);
            sexLabels = Object.keys(sexJson);

            var sexConfig = {
                type: 'bar',
                data: {
                    labels: sexLabels, /*['男性', '女性']*/
                    datasets: [{
                            data: sexData,
                            backgroundColor: ['#2196f3', '#f44336']
                        }]
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
                    legend: {//凡例設定
                        display: false                 //表示設定
                    },
                    maintainAspectRatio: false
                }
            };
            // ---ここまで性別---
            // ---ここから年齢---
            var ageJson = <?php echo json_encode($resultAge); ?>
            //配列に変換
            var ageData = new Array(ageJson.length);
            var ageLabels = new Array(ageJson.length);

            ageData = Object.values(ageJson);
            ageLabels = Object.keys(ageJson);

            var ageConfig = {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    /*['0～9', '10～19', '20～29', '30～39', '40～49', '50～59', '60～69', '70～79', '80+']*/
                    datasets: [{
                            data: ageData,
                            /*[129, 423, 650, 550, 450, 330, 440, 330, 370]*/
                            backgroundColor: ["#9ccc65",
                                "#039be5",
                                "#ff9800",
                                "#5e35b1",
                                "#fdd835",
                                "#e53935",
                                "#d4e157",
                                "#4fc3f7",
                                "#ffb74d"]
                        }]
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
                    legend: {//凡例設定
                        display: false                 //表示設定
                    },
                    maintainAspectRatio: false
                }
            };
            // ---ここまで年齢---
            // ---ここから目的---
            var purposeJson = <?php echo json_encode($resultPurpose); ?>
            //配列に変換
            var sexData = new Array(purposeJson.length);
            var sexLabels = new Array(purposeJson.length);

            purposeData = Object.values(purposeJson);
            purposeLabels = Object.keys(purposeJson);
            
            var purposeConfig = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: purposeData,
                            backgroundColor: colorSet
                        }],
                    labels: purposeLabels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで目的---
            //グローバル
            var myChart;
            var ctx = document.getElementById("myChart").getContext('2d');

            /*円グラフ*/
            /*document.getElementById("piechart").onclick = function () {
             //myChartの中身があれば空に
             if (myChart) {
             myChart.destroy();
             }
             ctx.canvas.height = 500;//グラフの高さ
             ctx.canvas.width = document.body.clientWidth;//グラフの横幅
             myChart = new Chart(ctx, pieConfig);
             };*/
            /*棒グラフ*/
            /*document.getElementById("barchart").onclick = function () {
             //myChartの中身があれば空に
             if (myChart) {
             myChart.destroy();
             }
             ctx.canvas.height = 300;//グラフの高さ
             ctx.canvas.width = document.body.clientWidth;//グラフの横幅
             myChart = new Chart(ctx, barConfig);
             };*/
            /*性別*/
            document.getElementById("sexchart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, sexConfig);
            };
            /*年齢*/
            document.getElementById("agechart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, ageConfig);
            };
            /*目的*/
            document.getElementById("purposechart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, purposeConfig);
            };
        </script>
    </body>
</html>


