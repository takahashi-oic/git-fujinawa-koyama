<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
            $date = new DateTime();
            $dbdate = $date->format('Y-m-d H:i:s');
            $ques = $_POST['ques'];
            $stmt = $pdo->prepare("INSERT INTO questionnaire_info(url,conversion _data,create_date) "."VALUES ('$ques', '$ques','$dbdate')");
            $stmt->execute();
            
             ?>
<input type="button" value="終了" onClick="location.href='adminTop.php'">