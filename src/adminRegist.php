<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Material icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <title>アカウント作成</title>
    </head>
    <body>
        <header>
            <div class="card-panel row s12 light-green lighten-1"><span class="white-text">管理者用アカウント作成</span></div>
            <!--<div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                    <li class="tab col s3" id="home"><a href=""><span class="light-green-text text-lighten-1">Name2</span></a></li>
                    <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
                </ul>
            </div>-->
        </header>

        <br><br><br>
        <form action="adminLogin.php" method="post">
            <div class="row">
                <div class="container col s4 offset-s4">
                    <p>あなたのユーザーIDは</p>
                    <br><!--ユーザーID表示<br>消して良い-->
                    <p>パスワードは</p>
                    <br><!--パスワード表示<br>消して良い-->
                    <p>です。</p>
                    <br>
                    <button id="btn" class="waves-effect waves-light btn light-green lighten-1" onclick="location.href='adminLogin.php'">終了する</button>
                </div>
            </div>
        </form>
    </body>
</html>
