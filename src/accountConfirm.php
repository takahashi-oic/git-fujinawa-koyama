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


    <?php
    $stmt = $pdo->prepare("SELECT user_id FROM account WHERE user_id = '$userid'");
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($id == null) {
        ?>
        <body>
            <header>
                <nav>
                    <div class="nav-wrapper deep-orange darken-2">
                        <a class="brand-logo">アカウント確認</a>
                    </div>
                </nav>
            </header>
            <form action="adminRegist.php" method="post">
                <div class="row">
                    <div class="col s4 offset-s4 z-depth-3">
                        <div class="row">
                            <div class="input-field col s9 offset-s1">
                                <input type="hidden" id="setuserid" name="setuserid"  class="validate" value="<?php echo $userid ?>">
                                <p><?php echo $userid ?></p>
                            </div>
                            <div class="input-field col s9 offset-s1">
                                <input type="hidden" id="setpassword" name="setpassword"  class="validate" value="<?php echo $password ?>">
                                <p><?php echo $password ?></p>
                            </div>
                        </div>

                        <button type="button" class="waves-effect waves-light btn col s8 offset-s2" id="returnBtn" onclick="history.back()">戻る</button>
                        <button type="submit" class="waves-effect waves-light btn col s8 offset-s2" id="okBtn">送信</button>
                    </div>
                </div>

            </form> 
        </body>

    <?php } else { ?>
        <body>
              <header>
                <nav>
                    <div class="nav-wrapper deep-orange darken-2">
                        <a class="brand-logo">アカウント確認</a>
                    </div>
                </nav>
            </header>
            <div class="row">
                <div class="container col s4 offset-s4">
                    <p class="center-align">このアカウントは既に登録されています</p>
                    <button type="button" class="waves-effect waves-light btn col s8 offset-s2" id="returnBtn" onclick="history.back()">アカウント作成に戻る</button>
                </div>
            </div>
        </body>
          
    <?php } ?>





</html>
