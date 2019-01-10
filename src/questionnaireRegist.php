<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
            $date = new DateTime();
            $num = 1;
            $dbdate = $date->format('Y-m-d H:i:s');
            $ques = $_POST['ques'];
            $stmt = $pdo->prepare("INSERT INTO questionnaire_info(questionnaire_num,url,conversion _data,create_date)"."VALUES ('$num','$ques', '$ques','$dbdate')");
            $stmt->execute();
            
             ?>
<input type="button" value="終了" onClick="location.href='admin.php'">