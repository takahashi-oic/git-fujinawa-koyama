<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
            $date = new DateTime();
            $country = $_POST['country'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $inairport = $_POST['inairport'];
            $outairport = $_POST['outairport'];
            $Tourism1 = $_POST['Tourism1'];
            $Tourism2 = $_POST['Tourism2'];
            $Tourism3 = $_POST['Tourism3'];
            $Tourism4 = $_POST['Tourism4'];
            $Tourism5 = $_POST['Tourism5'];
            $Purchases1 = $_POST['Purchases1'];
            $Purchases2 = $_POST['Purchases2'];
            $Purchases3 = $_POST['Purchases3'];
            $purpose = $_POST['purpose'];
            $sns = $_POST['sns'];
           $num = 1;
            
            $stmt = $pdo->prepare("INSERT INTO answer_info(answer_num,ans_day) " . "VALUES ('$num',$data')");
            $stmt->execute();
            
            
                       
             ?>
<input type="button" value="終了" onClick="location.href='admin.php'">