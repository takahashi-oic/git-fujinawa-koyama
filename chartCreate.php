<?php
        try{
            //DB接続
            //host localhost,192.168.201.xxxなど 106koya 99 ju
            $dsn = 'mysql:dbname=questionnaire_db;host=192.168.201.99;charset=utf8mb4';//mysql
            //$username = 'root';//ユーザー root
            $username = 'user';//ユーザー user
            $password = '';//パス
            $pdo = new PDO($dsn, $username, $password);
            
            //ここから処理
            $stmt = $pdo->prepare("select result from questionnaire_result");
            $stmt->execute();
            
            $workArray = array();
            //結果取得
            while($row = $stmt -> fetch()){
                $workArray[] = $row['result'];
            }
            //結果の数を数える
            $resultArray = array_count_values($workArray);
            arsort($resultArray);
            //test
            echo("work<br>");
            print_r($workArray);
            echo("<br>count<br>");
            print_r($resultArray);
            
            //ここまで処理
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
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">アンケートグラフ作成ページ</span></div>
        
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
            <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
            <li class="tab col s3" id="home"><a href="#!"><span class="light-green-text text-lighten-1">円グラフ</span></a></li>
            <li class="tab col s3" id=""chart><a class="active" href="#!"><span class="light-green-text text-lighten-1">棒グラフ</span></a></li>
            <li class="tab col s3" id="api"><a href="#!"><span class="light-green-text text-lighten-1">データ3</span></a></li>
            <li class="tab col s3" id="adminLogin"><a href="#!"><span class="light-green-text text-lighten-1">データ4</span></a></li>
          </ul>
        </div>
        
        <p>取ってきた値から棒グラフ、円グラフなどのグラフを表示させる</p>
        <input type ="button" value="戻る" id="back" onclick="location.href='user.php'">
        <input type ="button" value="グラフ作成" id="chart">
        
        <!--<canvas id="myChart"></canvas>-->

        <canvas id="jsontest" />
        
        <script>
            //phpからJSON key=場所val=数
            var json = <?php echo json_encode($resultArray); ?>
            
            //配列に変換
            var data = new Array(json.length);
            var labels = new Array(json.length);
            //参考
            //https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Global_Objects/Object/values
            
            data = Object.values(json);
            labels = Object.keys(json);
            
            //test
            console.log(json);
            console.log(data);
            console.log(labels);
            
            var config = {
                type: 'pie',
                data:{
                    datasets:[{
                            data: data,
                            backgroundColor: [
                                "#2ecc71",
                                "#3498db",
                                "#95a5a6",
                                "#9b59b6",
                                "#f1c40f",
                                "#e74c3c",
                                "#34495e"
                                ]
                    }],
                    labels: labels
                },
                options: {
                    responsive: true,//グラフの横幅
                    maintainAspectRatio: false
                }
            };
        document.getElementById("chart").onclick = function() {
            var ctx = document.getElementById("jsontest").getContext('2d');
            ctx.canvas.height = 280;//グラフの高さ
            var myChart = new Chart(ctx, config);
        };
        </script>
    </body>
</html>


