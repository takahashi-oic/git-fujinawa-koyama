        <?php
        session_start();
            try {
                $url = parse_url(getenv('DATABASE_URL'));
                $dsn = sprintf('pgsql:host=%s;abname=%s',$url['host'],substr($url['path'],1));
                $pdo = new PDO($dsn,$url['user'],$url[`pass`]);
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
        $userid = $_POST['userid'];
        $password = $_POST['password'];
                    $stmt = $pdo->prepare("SELECT user_id,password FROM account WHERE user_id='$userid'");
                    $stmt->execute();
                    $login = $stmt->fetch();
                    if($login[0]==$userid && password_verify($password, $login[1])){
                        $_SESSION['userid'] = $userid;
                       header('Location: admin.php');
                       exit();
                       }else{
                        header('Location: adminLogin.php');
                        exit();
                    }      
     
        ?>
    