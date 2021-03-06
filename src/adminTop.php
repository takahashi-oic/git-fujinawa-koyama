<!-- 管理者用ホーム画面 -->
<?php 
        session_start();
        
        if(isset($_SESSION["userid"])){           
        header('Location: admin.php');
        exit();
                }?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript"></script>
        <title>管理者トップページ</title>
        <!-- CSS -->
        <style type="text/css">
            .col {/*親div*/
                position: relative;/*相対配置*/
            }

            .col p#okayama {
                font-size: 700%;
                position: absolute;/*絶対配置*/
                color: white;/*文字は白に*/
                top: 50%;
                left: 50%;
                /*文字分のずれを修正*/
                -ms-transform: translate(-50%,-50%);
                -webkit-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
                margin:0;
                padding:0;
            }

            .col img {
              width: 100%;
            }
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
              }

              main {
                flex: 1 0 auto;
              }
        </style>
        <script>
            function index() {
                window.open('index.php');
            }
        </script>
        
    </head>
    <header>
        <nav>
            <div class="nav-wrapper deep-orange darken-2">
                <a class="brand-logo">管理者トップページ</a>
            </div>
        </nav>
        <div class="col s12">
            <ul class="tabs">
                  <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
                  <li class="tab col s3" id="adminLogin"><a href="adminLogin.php"><span class="orange-text text-darken-3">管理者用ログイン</span></a></li>
                  <li class="tab col s3" id="create"><a href="accountCreate.php"><span class="orange-text text-darken-3">管理者用アカウント作成</span></a></li>
                  <li class="tab col s3" id="index"><a href="chartCreate.php"><span class="orange-text text-darken-3">グラフ作成</span></a></li>
            </ul>
        </div>
    </header>
    <body>
        <div class="col">
            <img src="../picture/美観地区free.jpg" id="kourakuen">

            <p id="okayama">OKAYAMA</p>

        </div>
        <!--<div class="row">
            <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">API仕様書</span>
                        <p>アンケート結果をもとに掲載してるデータをプログラムが取得できる機能をAPIで提供しています。</p>
                    </div>
                    <div class="card-action">
                        <a href="apiMain.php" class="blue-text text-darken-2">API仕様書はこちら</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">グラフを作成</span>
                        <p>データをもとに自由に組み合わせ、欲しいデータを円グラフや棒グラフなどにグラフ化できる機能です。</p>
                    </div>
                    <div class="card-action">
                        <a href="chartCreate.php" class="blue-text text-darken-2">グラフを作成する</a>
                    </div>
                </div>
            </div>
        </div>-->
    </body>
    <footer class="page-footer deep-orange darken-2">
        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright 卒研　藤縄藩
                <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
            </div>
        </div>
    </footer>
</html>
