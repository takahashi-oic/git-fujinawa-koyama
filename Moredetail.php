<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Material icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <style type="text/css">
            
        </style>
        <title>アンケートAPI-API詳細仕様</title>
    </head>
    <!--<header>
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">API仕様書</span></div>
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
          </ul>
        </div>
    </header>-->
    <body>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <div class="row">
                <a href="index.php"><i class="medium material-icons left black-text" id="homebtn">home</i></a>
            </div>
            <div>
                <p>　はじめに</p>
                <li><a href="apiMain.php" class="blue-text text-darken-2">API概要</a></li>
                <li><a href="Moredetail.php" class="blue-text text-darken-2">API詳細仕様</a></li>
                <p>　API一覧</p>
                <li><a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
                <li><a href="#!" class="blue-text text-darken-2">国一覧</a></li>
                <li><a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
            </div>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col s10 offset-s2">
                    <h2>API詳細仕様</h2><br>
                    <h4 class="truncate">利用方法</h4>
                    <div class="row">
                        <div class="col s7 ">
                            <table>
                                <tbody>
                                    <tr>
                                      <td>API Endpoint</td>
                                      <td>https://kaito.ju-ri.go.jp</td>
                                    </tr>
                                    <tr>
                                      <td>SSL Support</td>
                                      <td>対応</td>
                                    </tr>
                                    <tr>
                                      <td>利用可能なHTTPメソッド</td>
                                      <td>GET</td>
                                    </tr>
                                    
                                    <tr>
                                      <td>レスポンスデータフォーマット</td>
                                      <td>Json</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>※APIキーの使い方については <a href="#">API詳細仕様</a>からご覧になれます。</p>
                    <h4 class="truncate">エラー</h4>
                    <ul>
                        <li>・<a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
                        <li>・<a href="#!" class="blue-text text-darken-2">国一覧</a></li>
                        <li>・<a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>


