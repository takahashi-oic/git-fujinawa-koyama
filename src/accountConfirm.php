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
                <p class=" center-align col s4 offset-s4">内容を<font size="4" color="red">必ず</font>確認してください</p>
                <div class="row">
                    <div class="col s4 offset-s4 z-depth-3">
                        
                        <div class="row">
                            <div class="input-field col s9 offset-s1">
                                <input type="hidden" id="setuserid" name="setuserid"  class="validate" value="<?php echo $userid ?>">
                                <p>ユーザーID：<?php echo $userid ?></p>
                            </div>
                            <div class="input-field col s9 offset-s1">
                                <input type="hidden" id="setpassword" name="setpassword"  class="validate" value="<?php echo $password ?>">
                                <p>パスワード：<?php echo $password ?></p>
                            </div>
                        </div>
                        <div class="col s4 offset-s1">
                            <button type="submit" class="waves-effect waves-light btn col s8 offset-s2" id="okBtn">送信</button>
                        </div>
                        <div class="col s4 offset-s1">
                            <button type="button" class="waves-effect waves-light btn col s8 offset-s2" id="returnBtn" onclick="history.back()">戻る</button>
                        </div>
                    </div>
                </div>

            </form> 
        </body>

    <?php } else { ?>
        <body>
              <header>
                <nav>
                    <div class="nav-wrapper deep-orange darken-2">
                        <a class="brand-logo">登録エラー</a>
                    </div>
                </nav>
            </header>
            <div class="row">
                <p class="center-align"><font size="5">このアカウントは既に登録されています</font></p>
                <div class="container grey lighten-3 col s4 offset-s4">
                    <p><font size="5">ユーザーID:<b class="red-text"><?php  echo $userid;?></b></font></p>
                    <p><font size="5">パスワード:<b class="red-text"><?php  echo $password;?></b></font></p>
                    <br>
                    <p><font size="3">再度登録しなおしてください。</font></p>
                </div>
            </div>
            <div class="row">
                <div class="col s6 offset-s3">
                    <button type="button" class="waves-effect waves-light btn col s4 offset-s4 " id="returnBtn" onclick="history.back()">アカウント作成に戻る</button>
                </div>
            </div>
        </body>
          
    <?php } ?>





</html>
