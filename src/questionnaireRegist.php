<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
            $now = date('Y/m/d');
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
                        
            $stmt1 = $pdo->prepare("INSERT INTO answer_info(ans_day) VALUES ('$now')");
            $stmt2 = $pdo->prepare("INSERT INTO country(country) VALUES ('$country')");
            $stmt3 = $pdo->prepare("INSERT INTO age(age) VALUES ('$age')");
            $stmt4 = $pdo->prepare("INSERT INTO sex(sex) VALUES ('$sex')");
            $stmt5 = $pdo->prepare("INSERT INTO inandout_airport(in_airport,out_airport) VALUES ('$inairport','$outairport')");
            $stmt6 = $pdo->prepare("INSERT INTO tourism1(tourism1) VALUES ('$Tourism1')");
            $stmt7 = $pdo->prepare("INSERT INTO tourism2(tourism2) VALUES ('$Tourism2')");
            $stmt8 = $pdo->prepare("INSERT INTO tourism3(tourism3) VALUES ('$Tourism3')");
            $stmt9 = $pdo->prepare("INSERT INTO tourism4(tourism4) VALUES ('$Tourism4')");
            $stmt10 = $pdo->prepare("INSERT INTO tourism5(tourism5) VALUES ('$Tourism5')");
            $stmt11 = $pdo->prepare("INSERT INTO purchases1(purchases1) VALUES ('$Purchases1')");
            $stmt12 = $pdo->prepare("INSERT INTO purchases2(purchases2) VALUES ('$Purchases2')");
            $stmt13 = $pdo->prepare("INSERT INTO purchases3(purchases3) VALUES ('$Purchases3')");
            $stmt14 = $pdo->prepare("INSERT INTO purpose(purpose) VALUES ('$purpose')");
            $stmt15 = $pdo->prepare("INSERT INTO sns(sns) VALUES ('$sns')");
            
            $stmt1->execute();
            $stmt2->execute();
            $stmt3->execute();
            $stmt4->execute();
            $stmt5->execute();
            $stmt6->execute();
            $stmt7->execute();
            $stmt8->execute();
            $stmt9->execute();
            $stmt10->execute();
            $stmt11->execute();
            $stmt12->execute();
            $stmt13->execute();
            $stmt14->execute();
            $stmt15->execute();
            
            
                    
             ?>

<input type="button" value="終了" onClick="location.href='admin.php'">