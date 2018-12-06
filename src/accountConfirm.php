<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <?php
        try {
            $pdo = new PDO('mysql:host=192.168.201.99;dbname=questionnaire_db;charset=utf8', 'user', '');
        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
        //$_POSTで受け取る
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        ?>
        <title>アカウント確認</title>
    </head>
    <header>
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">アカウント確認</span></div>
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
                <li class="tab col s3" id="home"><a href=""><span class="light-green-text text-lighten-1">Name2</span></a></li>
                <li class="tab col s3" id="api"><a href=""><span class="light-green-text text-lighten-1">Name3</span></a></li>
            </ul>
        </div>
    </header>
    <body>
        <form method="post">
            <div class="row">
                <div class="col s4 offset-s4 z-depth-3">
                    <div class="row">
                        <div class="input-field col s9 offset-s1">
                            <?php
                            echo '<input disabled id="userid" name="setuserid" type="text" class="validate" value="';
                            print_r($userid);
                            echo '">';
                            ?>
                        </div>
                        <div class="input-field col s9 offset-s1">
                            <?php
                            echo '<input disabled id="password" name="setpassword" type="text" class="validate" value="';
                            print_r($password);
                            echo '">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <button type="button" class="waves-effect waves-light btn col s8 offset-s2" id="returnBtn" onclick="history.back()">戻る</button>
                    <button type="submit" class="waves-effect waves-light btn col s8 offset-s2" id="okBtn" onSubmit="jump()">送信</button>

                    <?php
                    if (true == isset($_POST['setuserid']) && true == isset($_POST['setpassword'])) {
                        //$_POSTで受け取る
                        $setuserid = $_POST['setuserid'];
                        $setpassword = $_POST['setpassword'];
                        $pdo->exec("INSERT INTO account(user_id,password) " . "VALUES ('$setuserid', '$setpassword')");
                    }
                    ?>
                </div>
            </div>

        </form>


    </body>
</html>
