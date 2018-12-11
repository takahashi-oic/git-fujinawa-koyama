<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Material icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        <script type="text/javascript"></script>
        <title>管理者用ログインページ</title>
        <style type="text/css">
            #loginbox{

            }
        </style>
        <script>

        </script>
    </head>
    <header>
        <nav>
            <div class="nav-wrapper orange darken-3">
                <a class="brand-logo">管理者用ログイン</a>
            </div>
        </nav>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
                <li class="tab col s3" id="api"><a href="apiMain.php"><span class="orange-text text-darken-3">API仕様書</span></a></li>
            </ul>
        </div>
    </header>
    <body>
        <br><br><br>
        <form action="LoginDecision.php" method="post">
            <div class="row">
                <div class="col s4 offset-s4 z-depth-2" id="loginbox">
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">account_box</i>
                            <input id="userid" type="text" class="validate" name="userid" autocomplete="off" pattern="^[a-zA-Z0-9]{1,12}$" required="required">
                        </div>
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" class="validate" name="password" autocomplete="off" pattern="^[a-zA-Z0-9]{8,20}$" required="required">
                        </div>
                    </div>
                        
                    <div class="row">
                        <button type="submit" class="waves-effect waves-light btn col s8 offset-s2" id="loginBtn">サインイン</button>
                    </div>
                    <div class="row">
                        <div class="orange darken-3">
                            <a href="accountCreate.php" class="waves-effect waves-light btn col s8 offset-s2" id="Account">アカウント作成</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
