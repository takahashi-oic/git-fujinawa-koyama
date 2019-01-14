<?php 
        session_start();
        
        if(isset($_SESSION["userid"])){
            $mess = $_SESSION["userid"]."さんようこそ";
        }else{
            
        header('Location: adminTop.php');
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
        <style type="text/css">
            
        </style>
        <title>管理者専用ページ</title>
    </head>
    <header>
        <!-- <div class="card-panel row s12 light-green lighten-1">
            <span class="white-text">管理者用ページ</span>
                <button id="logout" class="waves-effect waves-light btn right-align" onclick="location.href='adminLogin.php'">ログアウト</button>
        </div>-->
        <nav>
            <div class="nav-wrapper deep-orange darken-2">
                <a class="brand-logo">管理者用ページ</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><?php echo $mess;?></li>
                    <li><button id="logout" class="waves-effect waves-light btn deep-orange darken-2 z-depth-0" onclick="location.href='adminLogout.php'">ログアウト</button></li>
                </ul>
            </div>
        </nav>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
          </ul>
        </div>
    </header>
    <body>
        <div class="container">
            <div class="row">
                <div class="col m6">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="apiMain.php">
                                <img src="../picture/book.jpg">
                                <span class="card-title blue-text text-darken-2">API仕様書</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col m6">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="question.php">
                                <img src="../picture/アンケート.jpg">
                                <span class="card-title blue-text text-darken-2">アンケート作成</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!--<footer class="page-footer deep-orange darken-2">
        <div class="footer-copyright">
            <div class="container">
                © 2018 Copyright 卒研藤縄藩
                <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>-->
</html>


