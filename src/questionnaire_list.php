<!DOCTYPE html>
<?php
try {
                            $url = parse_url(getenv('DATABASE_URL'));
                            $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
            
                        } catch (PDOException $e) {
                            header('Content-Type: text/plain; charset=UTF-8', true, 500);
                            exit($e->getMessage());
                        }
                        $sql = "SELECT questionnaire_url,create_date FROM questionnaire_info ";
                        $stmt = $pdo->query($sql);
                       foreach ($stmt as $row) {
                            echo $row['create_date'].$row['questionnaire_url'];
                            echo '<br>';
                        }
?>

