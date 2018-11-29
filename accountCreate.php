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
    <body>
        <form>
            <div class="container col s4 offset-s4">
                <div class="row">
                    <form class="col s12">
                        <div class="cards row">
                          <div class="input-field col s6">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="icon_prefix" type="text" class="validate">
                              <label for="icon_prefix">Account ID</label>
                          </div>
                          <div class="input-field col s6">
                              <i class="material-icons prefix">lock</i>
                              <input id="lock" type="tel" class="validate">
                              <label for="lock">password</label>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <a class="waves-effect waves-light btn col s4 offset-s4" id="createbtn">アカウント作成</a>
                </div>
            </div>
        </form>
    </body>
   </html>


