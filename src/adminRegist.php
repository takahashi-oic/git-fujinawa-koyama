<!DOCTYPE html>
<?php
                    try {
                            $pdo = new PDO('mysql:host=192.168.201.99;dbname=questionnaire_db;charset=utf8', 'user', '');
                        } catch (PDOException $e) {
                            header('Content-Type: text/plain; charset=UTF-8', true, 500);
                            exit($e->getMessage());
                        }
                    if (true == isset($_POST['setuserid']) && true == isset($_POST['setpassword'])) {
                        //$_POSTで受け取る
                        $setuserid = $_POST['setuserid'];
                        $setpassword = $_POST['setpassword'];
                        $hash = password_hash($_POST['setpassword'], PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare("INSERT INTO account(user_id,password) " . "VALUES ('$setuserid', '$hash')");
                        $stmt->execute();
                    }
                    ?>
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
                <div class="nav-wrapper deep-orange darken-2">
                    <a class="brand-logo">アカウント確認</a>
                </div>
            </nav>
            <!--<div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                    <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
                </ul>
            </div>-->
        </header>
        <br><br><br>
        <form action="adminLogin.php" method="post">
            <div class="row">
                <p class="col s4 offset-s4">内容を<font size="4" color="red">必ず</font>確認してください</p>
                <div class="container grey lighten-3 col s4 offset-s4">
                    <p><font size="5">あなたのユーザーIDは<b class="red-text"><?php  echo $setuserid;?></b></font></p>
                    <p><font size="5">パスワードは<b class="red-text"><?php  echo $setpassword;?></b></font></p>
                    <p><font size="5">です。</font></p>
                </div>
                <div class="col s12">
                    <button id="btn" class="waves-effect waves-light btn orange darken-3 col s2 offset-s5" onclick="location.href='adminLogin.php'">終了する</button>
                </div>
            </div>
        </form>
    </body>
</html>
