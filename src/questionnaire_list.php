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
                            $enurl = base64_decode($row['questionnaire_url']);
                            echo $row['create_date'].$enurl;
                            ?>
                            <a href="<?php echo $enurl ?>"><?php echo $enurl;?></a><br>
                        
                        <?php } ?>
                            
        <html lang="ja">
          <head>
            <meta charset="utf-8">
            <title>QR code generator</title>
          </head>

          <body>
            <div>
              <form method="get">
                <table border="0">
                  <tr>
                    <td align="right"><b>Size</b></td>
                    <?php $val = empty($_REQUEST["qr_size"]) ? "300" : $_REQUEST["qr_size"] ?>
                    <td><input type="text" name="qr_size" size="3" maxlength="3" value="<?php echo $val ?>"></td>
                  </tr>
                  <tr>
                    <td align="right"><b>URL</b></td>
                    <?php $val = empty($_REQUEST["qr_url"]) ? "http://" : $_REQUEST["qr_url"] ?>
                    <td><input type="text" name="qr_url" size="128" value="<?php echo $val ?>"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <input type="reset">
                      <input type="submit">
                    </td>
                  </tr>
                </table>
              </form>
            </div>

            <hr width="50%" align="left">

            <?php if (!empty($_REQUEST["qr_size"])): ?>
              <div>
                <?php
                  $url = urlencode($_REQUEST["qr_url"]);
                  $qr_code_url = "https://chart.googleapis.com/chart?cht=qr&chs={$_REQUEST["qr_size"]}&chi={$url}";
                ?>
                <div><a href="<?php echo $qr_code_url ?>"><?php echo $qr_code_url ?></a></div>
                <div><img src="<?php echo $qr_code_url ?>"></div>
              </div>
            <?php endif ?>
          </body>
        </html>


