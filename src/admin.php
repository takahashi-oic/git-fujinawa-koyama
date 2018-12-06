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
            <div class="nav-wrapper light-green lighten-1">
                <a class="brand-logo">管理者用ページ</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><button id="logout" class="waves-effect waves-light btn light-green lighten-1 z-depth-0" onclick="location.href='adminLogin.php'">ログアウト</button></li>
                </ul>
            </div>
        </nav>
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
            <li class="tab col s3" id="home"><a href="questionnaireCreate.php"><span class="light-green-text text-lighten-1">アンケート作成</span></a></li>
            <li class="tab col s3" id="api"><a href="apiMain.php.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
          </ul>
        </div>
    </header>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>


