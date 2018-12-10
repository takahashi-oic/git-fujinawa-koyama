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
                        $stmt = $pdo->prepare("INSERT INTO account(user_id,password) " . "VALUES ('$setuserid', '$setpassword')");
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
                <div class="nav-wrapper orange darken-3">
                    <a class="brand-logo">管理者トップページ</a>
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
                <div class="container col s4 offset-s4">
                    <p>あなたのユーザーIDは</p>
                    <br><?php  echo $setuserid;?><br>
                    <p>パスワードは</p>
                    <br><?php  echo $setpassword;?>
                    <p>です。</p>
                    <br>
                    <button id="btn" class="waves-effect waves-light btn orange darken-3" onclick="location.href='adminLogin.php'">終了する</button>
                </div>
            </div>
        </form>
    </body>
</html>
