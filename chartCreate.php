<?php
        try{
            //host localhost,192.168.201.xxxなど
            $dsn = 'mysql:dbname=questionnaire_db;host=localhost;charset=utf8mb4';//mysql
            $username = 'root';//ユーザー
            $password = '';//パス
            $pdo = new PDO($dsn, $username, $password);
            
            //ここから処理
            $stmt = $pdo->prepare("select * from questionnaire_result where answer_num = 1");
            $stmt->execute();

            $result = $stmt->fetch();
            echo "result = ".$result['result'];

            
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
        <title>グラフ作成ページ</title>
    </head>
    <body>
        <p>取ってきた値から棒グラフ、円グラフなどのグラフを表示させる</p>
        <input type ="button" value="戻る" id="back" onclick="location.href='user.php'">
        <input type ="button" value="グラフ作成" id="chart">
        <input type ="button" value="jsonてすと" id="jtest">
        
        <!--<canvas id="myChart"></canvas>-->

        <canvas id="jsontest" />
        
        <script>
            var json = `[
		{ "label": "赤池町",  "data": "1195"},
    		{ "label": "浅田町",  "data": "1899"},
    		{ "label": "梅森町",  "data": "804"},
    		{ "label": "野方町",  "data": "133"},
   		{ "label": "蟹甲町", "data": "158"}
            ]`;
            //オブジェクトに変換
            obj = JSON.parse(json);
            //配列に変換
            var data = new Array(obj.length);
            var labels = new Array(obj.length);
            for(var i=0; i<obj.length; i++){
                data[i] = obj[i].data;
                labels[i] = obj[i].label;
            }
            
            var config = {
                type: 'pie',
                data:{
                    datasets:[{
                            data: data,
                            backgroundColor: "rgba(153,255,51,1)"
                    }],
                    labels: labels
                },
                options: {
                    responsive: true,//グラフの横幅
                    maintainAspectRatio: false
                }
            };
        document.getElementById("jtest").onclick = function() {
            var ctx = document.getElementById("jsontest").getContext('2d');
            ctx.canvas.height = 280;//グラフの高さ
            var myChart = new Chart(ctx, config);
        };
        

        /*document.getElementById("chart").onclick = function() {
            var ctx = document.getElementById("myChart").getContext('2d');
            ctx.canvas.height = 280;//グラフの高さ
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ["M", "T", "W", "R", "F", "S", "S"],//JSON 日付など
                datasets: [{
                  label: 'apples',//データ名
                  data: [12, 19, 3, 17, 28, 24, 7],//JSON データ
                  backgroundColor: "rgba(153,255,51,1)"
                }, {
                  label: 'oranges',
                  data: [30, 29, 5, 5, 20, 3, 10],
                  backgroundColor: "rgba(255,153,0,1)"
                }]
              },
              options: {
              responsive: true,//グラフの横幅
              maintainAspectRatio: false
            }
            });
        }*/
        </script>
    </body>
</html>


