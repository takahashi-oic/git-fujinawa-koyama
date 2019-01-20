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
    /* 国取得 */
    $stmt1 = $pdo->prepare("SELECT count(country) as num, country FROM country GROUP BY country ORDER BY num DESC");
    $stmt1->execute();

    $resultCountry = array();
    while ($row = $stmt1->fetch()) {
        if ($row['country'] == '' || $row['country'] == null) {
            $resultCountry['無回答・その他'] = $row['num'];
        } else {
            $resultCountry[$row['country']] = $row['num'];
        }
    }

    /* 性別取得 */
    $stmt2 = $pdo->prepare("SELECT count(sex) as num, sex FROM sex GROUP BY sex");
    $stmt2->execute();

    $resultSex = array();
    while ($row = $stmt2->fetch()) {
        if ($row['sex'] == '男') {
            $resultSex[0] = $row['num'];
        } else if ($row['sex'] == '女') {
            $resultSex[1] = $row['num'];
        } else {
            $resultSex[2] = $row['num'];
        }
    }

    /* 年齢取得 */
    $stmt3 = $pdo->prepare("SELECT count(age) as num, age FROM age GROUP BY age ORDER BY age");
    $stmt3->execute();

    $resultAge = array();
    while ($row = $stmt3->fetch()) {
        if ($row['age'] == "") {
            $resultAge['無回答・その他'] = $row['num'];
        } else {
            $resultAge[$row['age'] . "代"] = $row['num'];
        }
    }

    /* 目的 */
    $stmt4 = $pdo->prepare("SELECT count(purpose) as num, purpose FROM purpose GROUP BY purpose ORDER BY num DESC");
    $stmt4->execute();

    $resultPurpose = array();
    while ($row = $stmt4->fetch()) {
        if ($row['purpose'] == "") {
            $resultPurpose['無回答・その他'] = $row['num'];
        } else {
            $resultPurpose[$row['purpose']] = $row['num'];
        }
    }

    /* 入出国空港 */
    $stmt_in = $pdo->prepare("SELECT count(in_airport) as num, in_airport FROM inandout_airport GROUP BY in_airport ORDER BY num DESC");
    $stmt_in->execute();
    $stmt_out = $pdo->prepare("SELECT count(out_airport) as num, out_airport FROM inandout_airport GROUP BY out_airport ORDER BY count(in_airport) DESC");
    $stmt_out->execute();

    $resultInport = array();
    while ($row = $stmt_in->fetch()) {
        if ($row['in_airport'] == "") {
            $resultInport['無回答・その他'] = $row['num'];
        } else {
            $resultInport[$row['in_airport']] = $row['num'];
        }
    }
    $resultOutport = array();
    while ($row = $stmt_out->fetch()) {
        if ($row['out_airport'] == "") {
            $resultOutport['無回答・その他'] = $row['num'];
        } else {
            $resultOutport[$row['out_airport']] = $row['num'];
        }
    }

    /* 購入物 */
    $stmt_p1 = $pdo->prepare("SELECT count(purchases1) as num, purchases1 FROM purchases1 GROUP BY purchases1 ORDER BY num DESC");
    $stmt_p2 = $pdo->prepare("SELECT count(purchases2) as num, purchases2 FROM purchases2 GROUP BY purchases2 ORDER BY num DESC");
    $stmt_p3 = $pdo->prepare("SELECT count(purchases3) as num, purchases3 FROM purchases3 GROUP BY purchases3 ORDER BY num DESC");
    $stmt_p1->execute();
    $stmt_p2->execute();
    $stmt_p3->execute();
    
    $resultP1 = array();
    while ($row = $stmt_p1->fetch()) {
        if ($row['purchases1'] == "") {
            $resultP1['無回答・その他'] = $row['num'];
        } else {
            $resultP1[$row['purchases1']] = $row['num'];
        }
    }
    $resultP2 = array();
    while ($row = $stmt_p2->fetch()) {
        if ($row['purchases2'] == "") {
            $resultP2['無回答・その他'] = $row['num'];
        } else {
            $resultP2[$row['purchases2']] = $row['num'];
        }
    }
    $resultP3 = array();
    while ($row = $stmt_p3->fetch()) {
        if ($row['purchases3'] == "") {
            $resultP3['無回答・その他'] = $row['num'];
        } else {
            $resultP3[$row['purchases3']] = $row['num'];
        }
    }
    
    /* 観光 */
    $stmt_t1 = $pdo->prepare("SELECT count(tourism1) as num, tourism1 FROM tourism1 GROUP BY tourism1 ORDER BY num DESC");
    $stmt_t2 = $pdo->prepare("SELECT count(tourism2) as num, tourism2 FROM tourism2 GROUP BY tourism2 ORDER BY num DESC");
    $stmt_t3 = $pdo->prepare("SELECT count(tourism3) as num, tourism3 FROM tourism3 GROUP BY tourism3 ORDER BY num DESC");
    $stmt_t4 = $pdo->prepare("SELECT count(tourism4) as num, tourism4 FROM tourism4 GROUP BY tourism4 ORDER BY num DESC");
    $stmt_t5 = $pdo->prepare("SELECT count(tourism5) as num, tourism5 FROM tourism5 GROUP BY tourism5 ORDER BY num DESC");
    $stmt_t1->execute();
    $stmt_t2->execute();
    $stmt_t3->execute();
    $stmt_t4->execute();
    $stmt_t5->execute();
    
    $resultT1 = array();
    while ($row = $stmt_t1->fetch()) {
        if ($row['tourism1'] == "") {
            $resultT1['無回答・その他'] = $row['num'];
        } else {
            $resultT1[$row['tourism1']] = $row['num'];
        }
    }
    $resultT2 = array();
    while ($row = $stmt_t2->fetch()) {
        if ($row['tourism2'] == "") {
            $resultT2['無回答・その他'] = $row['num'];
        } else {
            $resultT2[$row['tourism2']] = $row['num'];
        }
    }
    $resultT3 = array();
    while ($row = $stmt_t3->fetch()) {
        if ($row['tourism3'] == "") {
            $resultT3['無回答・その他'] = $row['num'];
        } else {
            $resultT3[$row['tourism3']] = $row['num'];
        }
    }
    $resultT4 = array();
    while ($row = $stmt_t4->fetch()) {
        if ($row['tourism4'] == "") {
            $resultT4['無回答・その他'] = $row['num'];
        } else {
            $resultT4[$row['tourism4']] = $row['num'];
        }
    }
    $resultT5 = array();
    while ($row = $stmt_t5->fetch()) {
        if ($row['tourism5'] == "") {
            $resultT5['無回答・その他'] = $row['num'];
        } else {
            $resultT5[$row['tourism5']] = $row['num'];
        }
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
                        <li class="tab col s3" id="home"><a href="adminTop.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
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
                <li><a href="#!" id="countrychart">国</a></li>
                <li><a href="#!" id="sexchart">性別</a></li>
                <li><a href="#!" id="agechart">年齢</a></li>
                <li><a href="#!" id="purposechart">目的</a></li>
                <li><a href="#!" id="inchart">入国空港</a></li>
                <li><a href="#!" id="outchart">出国空港</a></li>
                <li><a href="#!" id="p1chart">購入 選択1</a></li>
                <li><a href="#!" id="p2chart">購入 選択2</a></li>
                <li><a href="#!" id="p3chart">購入 選択3</a></li>
                <li><a href="#!" id="t1chart">観光 選択1</a></li>
                <li><a href="#!" id="t2chart">観光 選択2</a></li>
                <li><a href="#!" id="t3chart">観光 選択3</a></li>
                <li><a href="#!" id="t4chart">観光 選択4</a></li>
                <li><a href="#!" id="t5chart">観光 選択5</a></li>
                <!--<li><a href="#!" id="barchart">棒グラフ</a></li>
                <li class="divider" tabindex="-1"></li>
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
            //var json = <?php //echo json_encode($resultArray);              ?>

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
            // ---ここから国---
            var countryJson = <?php echo json_encode($resultCountry); ?>
            //配列に変換
            //var countryData = new Array(countryJson.length);
            //var countryLabels = new Array(countryJson.length);

            countryData = Object.values(countryJson);
            countryLabels = Object.keys(countryJson);

            var countryConfig = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: countryData,
                            backgroundColor: colorSet
                        }],
                    labels: countryLabels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで国---
            // ---ここから性別---
            var sexJson = <?php echo json_encode($resultSex); ?>

            sexData = Object.values(sexJson);

            var sexConfig = {
                type: 'bar',
                data: {
                    labels: ['男性', '女性', '無回答・その他'],
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
            // ---ここから入出
            var inJson = <?php echo json_encode($resultInport); ?>;
            var outJson = <?php echo json_encode($resultOutport); ?>;

            inData = Object.values(inJson);
            inLabels = Object.keys(inJson);
            outData = Object.values(outJson);
            outLabels = Object.keys(outJson);

            //横棒グラフはシステムの相性の都合上難しい
            var inConfig = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: inData,
                            backgroundColor: colorSet
                        }],
                    labels: inLabels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var outConfig = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: outData,
                            backgroundColor: colorSet
                        }],
                    labels: outLabels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで入出---
            // ---ここから購入物---
            var p1Json = <?php echo json_encode($resultP1); ?>;
            var p2Json = <?php echo json_encode($resultP2); ?>;
            var p3Json = <?php echo json_encode($resultP3); ?>;
            
            p1Data = Object.values(p1Json);
            p1Labels = Object.keys(p1Json);
            p2Data = Object.values(p2Json);
            p2Labels = Object.keys(p2Json);
            p3Data = Object.values(p3Json);
            p3Labels = Object.keys(p3Json);
            
            var p1Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: p1Data,
                            backgroundColor: colorSet
                        }],
                    labels: p1Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var p2Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: p2Data,
                            backgroundColor: colorSet
                        }],
                    labels: p2Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var p3Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: p3Data,
                            backgroundColor: colorSet
                        }],
                    labels: p3Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで購入物---
            // ---ここから観光---
            var t1Json = <?php echo json_encode($resultT1); ?>;
            var t2Json = <?php echo json_encode($resultT2); ?>;
            var t3Json = <?php echo json_encode($resultT3); ?>;
            var t4Json = <?php echo json_encode($resultT4); ?>;
            var t5Json = <?php echo json_encode($resultT5); ?>;
            
            t1Data = Object.values(t1Json);
            t1Labels = Object.keys(t1Json);
            t2Data = Object.values(t2Json);
            t2Labels = Object.keys(t2Json);
            t3Data = Object.values(t3Json);
            t3Labels = Object.keys(t3Json);
            t4Data = Object.values(t4Json);
            t4Labels = Object.keys(t4Json);
            t5Data = Object.values(t5Json);
            t5Labels = Object.keys(t5Json);
            
            var t1Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: t1Data,
                            backgroundColor: colorSet
                        }],
                    labels: t1Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var t2Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: t2Data,
                            backgroundColor: colorSet
                        }],
                    labels: t2Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var t3Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: t3Data,
                            backgroundColor: colorSet
                        }],
                    labels: t3Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var t4Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: t4Data,
                            backgroundColor: colorSet
                        }],
                    labels: t4Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            var t5Config = {
                type: 'pie',
                data: {
                    datasets: [{
                            data: t5Data,
                            backgroundColor: colorSet
                        }],
                    labels: t5Labels
                },
                options: {
                    responsive: false, //グラフの横幅自動調整
                    maintainAspectRatio: false
                }
            };
            // ---ここまで観光---
            //グローバル
            var myChart;
            var ctx = document.getElementById("myChart").getContext('2d');

            /*国*/
            document.getElementById("countrychart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, countryConfig);
            };
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
            /*入出*/
            document.getElementById("inchart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, inConfig);
            };
            document.getElementById("outchart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, outConfig);
            };
            /*購入物*/
            document.getElementById("p1chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, p1Config);
            };
            document.getElementById("p2chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, p2Config);
            };
            document.getElementById("p3chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, p3Config);
            };
            /*観光*/
            document.getElementById("t1chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, t1Config);
            };
            document.getElementById("t2chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, t2Config);
            };
            document.getElementById("t3chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, t3Config);
            };
            document.getElementById("t4chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, t4Config);
            };
            document.getElementById("t5chart").onclick = function () {
                //myChartの中身があれば空に
                if (myChart) {
                    myChart.destroy();
                }
                ctx.canvas.height = 300;//グラフの高さ
                ctx.canvas.width = document.body.clientWidth;//グラフの横幅
                myChart = new Chart(ctx, t5Config);
            };
        </script>
    </body>
</html>


