<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <?php
           try{
    $pdo = new PDO('mysql:host=localhost;dbname=questionnaire_db;charset=utf8','test','test');
    
 
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

                                     <input id="userid" name="setuserid" type="text" class="validate">
                                 </div>
                                 <div class="input-field col s9 offset-s1">

                                     <input id="password" name="setpassword" type="text" class="validate">
                                 </div>
                             </div>
                             <div class="row">
                     </div>
                        <input type="submit" class="waves-effect waves-light btn col s8 offset-s2" id="okBtn" value="送信" onSubmit="jump()">
                        <script>

                                function jump(){
                                   //TOPページにジャンプさせる
                                   location.href = 'http://localhost/git-fujinawa-koyama/src/index.php';
                                }

                        </script>
                        <?php
                         if(true == isset($_POST['setuserid'])&&true == isset($_POST['setpassword'])){ 
                         //$_POSTで受け取る
                         $setuserid = $_POST['setuserid'];
                         $setpassword = $_POST['setpassword'];
                         $pdo->exec("INSERT INTO account(user_id,password) "."VALUES ('$setuserid', '$setpassword')");
                         }
                     ?>
                 </div>
           </div>
        </form>
                    
       
    </body>
</html>
