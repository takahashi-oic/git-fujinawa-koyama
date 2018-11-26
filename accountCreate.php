<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
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
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1"></span></a></li>
            <li class="tab col s3" id="home"><a href=""><span class="light-green-text text-lighten-1">Name2</span></a></li>
            <li class="tab col s3" id="api"><a href="APIform.php"><span class="light-green-text text-lighten-1">Name2</span></a></li>
          </ul>
        </div>
    </header>
    <body>
        <form>
            <div class="container col s4 offset-s4">
                <div class="row">
                    <form class="col s12">
                        <div class="row z-depth-2">
                            <div class="input-field col s4 offset-s4">
                                <i class="material-icons prefix">account_box</i>
                                <input id="userid" type="text" class="validate">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <a class="waves-effect waves-light btn col s4 offset-s4" id="loginBtn">Sign in</a>
                    <a class="waves-effect waves-light btn col s4 offset-s4" id="loginBtn">Create Account</a>
                </div>
            </div>
        </form>
    </body>
   </html>


