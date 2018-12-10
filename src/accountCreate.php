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
            <nav>
                <div class="nav-wrapper orange darken-3">
                    <a class="brand-logo">アカウントを作成</a>
                </div>
            </nav>
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3" id="home"><a href="adminTop.php"><span class="orange-text text-darken-3">ホーム</span></a></li>
                </ul>
            </div>
        </header>

        <br><br><br>
        <form action="accountConfirm.php" method="post">
            <div class="row">
                <div class="col s4 offset-s4 z-depth-3">
                    <div class="row">
                        <div class="input-field col s9 offset-s1">
                            <i class="material-icons prefix">account_box</i>
                            <input id="userid" name="userid" type="text" class="validate" required="required" placeholder="ユーザーID（半角英数字12文字以内）">
                        </div>
                        <div class="input-field col s9 offset-s1">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" name="password" type="text" class="validate" required="required" placeholder="パスワード（半角英数字8～20文字以内)">
                        </div>
                    </div>
                    <div class="row">
                        <!--<input type="submit" value="確認ページへ" class="waves-effect waves-light btn col s4 offset-s4" id="createbtn">-->
                        <button type="submit" name="action" class="btn waves-effect waves-light col s4 offset-s4" id="createbtn">確認ページへ</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
