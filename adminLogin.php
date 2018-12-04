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
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">管理者用ログインページ</span></div>
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
            <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
          </ul>
        </div>
    </header>
    <body>
        <br><br><br>
        <form>
            <div class="row">
                <div class="col s4 offset-s4 z-depth-2" id="loginbox">
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">account_box</i>
                            <input id="userid" type="text" class="validate" required="required">
                        </div>
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="text" class="validate" required="required">
                        </div>
                    </div>
                    <div class="row">
                        <a href="admin.php" class="waves-effect waves-light btn col s8 offset-s2" id="loginBtn">Sign in</a>
                    </div>
                    <div class="row">
                        <a href="accountCreate.php" class="waves-effect waves-light btn col s8 offset-s2" id="Account">Create Account</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
