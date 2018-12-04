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
        <style type="text/css">
            #createbtn{
                color:white;
                outline: none;
            }
        </style>
        <title>アカウント作成</title>
    </head>
    <body>
    <header>
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">管理者用アカウント作成</span></div>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                <li class="tab col s3" id="home"><a href=""><span class="light-green-text text-lighten-1">Name2</span></a></li>
                <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
            </ul>
        </div>
    </header>
        <br><br><br>
        <form action="accountConfirm.php" method="post">
            <div class="row">
                <div class="col s4 offset-s4 z-depth-2">
                    <div class="row">
                        <div class="input-field col s9 offset-s1">
                            <i class="material-icons prefix">account_box</i>
                            <input id="userid" type="text" class="validate" placeholder="ユーザーID（半角英数字12文字以内）"required>
                        </div>
                        <div class="input-field col s9 offset-s1">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="text" class="validate" placeholder="password（半角英数字8～20文字以内)" required>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="waves-effect waves-light btn col s4 offset-s4" id="createbtn" value="確認ページへ">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>


