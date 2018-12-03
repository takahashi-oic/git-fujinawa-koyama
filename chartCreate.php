<?php
        try{
            //DB接続
            //host localhost,192.168.201.xxxなど 106koya 99 ju
            $dsn = 'mysql:dbname=questionnaire_db;host=192.168.201.99;charset=utf8mb4';//mysql
            //$username = 'root';//ユーザー root
            $username = 'user';//ユーザー user
            $password = '';//パス
            $pdo = new PDO($dsn, $username, $password);
            
            //---ここから処理---
            $stmt = $pdo->prepare("SELECT count(*) as count, result FROM questionnaire_result GROUP BY result ORDER BY count DESC");
            $stmt->execute();
            
            $resultArray = array();
            //結果取得 連想配列へ
            while($row = $stmt -> fetch()){
                $resultArray[$row['result']] = $row['count'];
            }
            //test
            /*echo("count<br>");
            print_r($resultArray);*/
            
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
        
        <title>グラフ作成ページ</title>
        
        
    </head>

    <body>
    <header>
        <div class="card-panel row s12 light-green lighten-1" id="test1"><span class="white-text">アンケートグラフ作成ページ</span></div>

        
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
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
                <li><a href="#!">棒グラフ</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="#!">グラフ１</a></li>
                <li><a href="#!">グラフ２</a></li>
                <li><a href="#!">グラフ３</a></li>
            </ul>
        </div>
        <canvas id="myChart" class="" />
                
        <script>
        $(function(){
            $('.dropdown-tr').dropdown();
        });
        </script>
        
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
        document.getElementById("piechart").onclick = function() {
            var ctx = document.getElementById("myChart").getContext('2d');
            ctx.canvas.height = 400;//グラフの高さ
            var myChart = new Chart(ctx, config);
        };
        
        </script>
    </body>
</html>


