<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
            $date = new DateTime();
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $sns = $_POST['sns'];
            $inairport = $_POST['inairport'];
            $outairport = $_POST['outairport'];
            $purpose = $_POST['purpose'];
            echo $age;
            echo $sex;
            echo $purpose;
            echo $sns;
            echo $inairport;
            echo $outairport;
            
             ?>
<input type="button" value="終了" onClick="location.href='admin.php'">