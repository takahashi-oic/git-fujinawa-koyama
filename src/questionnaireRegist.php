<?php 
            try {
                 $url = parse_url(getenv('DATABASE_URL'));
                 $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["dbname"],ltrim($url["path"],"/")));
            
            } catch (PDOException $e) {
                header('Content-Type: text/plain; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
                    if(isset( $_POST['country'])){
                        $country= $_POST['country'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$country',20181210133000 )");
                        $stmt->execute();
                    }
                    
                    if(isset( $_POST['age'])){
                        $age= $_POST['age'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$age',20181210133000 )");
                        $stmt->execute();
                    }
            
                    if(isset( $_POST['sex'])){
                        $sex= $_POST['sex'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sex',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['airport'])){
                        $airport= $_POST['airport'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$airport',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['Tourism1'])){
                        $Tourism1= $_POST['Tourism1'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$Tourism1',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['sns'])){
                        $sns= $_POST['sns'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sns',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['sns'])){
                        $sns= $_POST['sns'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sns',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['sns'])){
                        $sns= $_POST['sns'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sns',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['sns'])){
                        $sns= $_POST['sns'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sns',20181210133000 )");
                        $stmt->execute();
                    }
                    
                     if(isset( $_POST['sns'])){
                        $sns= $_POST['sns'];
                        $stmt = $pdo->prepare("INSERT INTO  questionnaire_result(questionnaire_num,answer_num,item_num,result,ans_time) " . "VALUES (11,11,11,'$sns',20181210133000 )");
                        $stmt->execute();
                    }
             ?>