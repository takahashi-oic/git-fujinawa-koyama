        <?php
        session_start();
            try {
                $pdo = new PDO('mysql:host=192.168.201.99;dbname=questionnaire_db;charset=utf8', 'user', '');
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $stmt = $pdo->prepare("SELECT user_id,paasword FROM account WHERE user_id='$userid'");
        $stmt->execute();
        $login = $stmt->fetch(PDO::FETCH_ASSOC);
        if($login[0]==$userid && $login[1]==$password){
            header('Location: adminTop.php');
            exit();
        }else{
            header('Location: adminLogin.php');
            exit();
        }
        ?>
     