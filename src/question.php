<!-- 利用者用ホーム画面 -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript"></script>
        <title>アンケート収集公開APIトップページ</title>
        <!-- CSS -->
        <style type="text/css">
            .col {/*親div*/
                position: relative;/*相対配置*/
            }

            .col p#okayama {
                font-size: 700%;
                position: absolute;/*絶対配置*/
                color: white;/*文字は白に*/
                top: 50%;
                left: 50%;
                /*文字分のずれを修正*/
                -ms-transform: translate(-50%,-50%);
                -webkit-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
                margin:0;
                padding:0;
            }

            .col img {
              width: 100%;
            }
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
              }

              main {
                flex: 1 0 auto;
              }
        </style>
        <script>
            
        </script>
    </head>
    <header>
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">アンケート作成</span></div>
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
            <li class="tab col s3" id="chart"><a class="active" href="chartCreate.php"><span class="light-green-text text-lighten-1">グラフ作成</span></a></li>
            <li class="tab col s3" id="api"><a href="apiMain.php"><span class="light-green-text text-lighten-1">API仕様書</span></a></li>
          </ul>
        </div>
    </header>
    <body>
        <div class="container s8">
            <p class="black-text">1.出身国</p>
            <select class="browser-default">
                <option value="" disabled selected>出身国を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <p>
                <p>2.年齢</p><br>
                <label>
                    <input name="age" type="radio" value="10" />
                    <span>10～19</span>
                </label>
                <label>
                    <input name="age" type="radio" value="20"/>
                    <span>20～29</span>
                </label>
                <label>
                    <input name="age" type="radio" value="30"/>
                    <span>30～39</span>
                </label>
                <label>
                    <input name="age" type="radio" value="40"/>
                    <span>40～49</span>
                </label>
                <label>
                    <input name="age" type="radio" value="50"/>
                    <span>50～59</span>
                </label>
                <label>
                    <input name="age" type="radio" value="60"/>
                    <span>60～69</span>
                </label>
                <label>
                    <input name="age" type="radio" value="70"/>
                    <span>70～79</span>
                </label>
                <label>
                    <input name="age" type="radio" value="80"/>
                    <span>80+</span>
                </label>
            </p>
            <p>
                <p>3.性別</p><br>
                <label>
                    <input name="group1" type="radio" value="男"/>
                    <span>男性</span>
                </label>
                <label>
                    <input name="group1" type="radio" value="女"/>
                    <span>女性</span>
                </label>
            </p>
            <p class="black-text">4.どこの空港から出入国しましたか</p>
            <select class="browser-default">
                <option value="" disabled selected>入国空港を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <br>
            <select class="browser-default">
                <option value="" disabled selected>出国空港を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <p class="black-text">5.岡山県でどこの観光地に行きましたか</p>
            <select class="browser-default">
                <option value="" disabled selected>一番目の観光地を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <br>
            <select class="browser-default">
                <option value="" disabled selected>二番目の観光地を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <br>
            <select class="browser-default">
                <option value="" disabled selected>三番目の観光地を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <br>
            <select class="browser-default">
                <option value="" disabled selected>四番目の観光地を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <br>
            <select class="browser-default">
                <option value="" disabled selected>五番目の観光地を選択してください</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <p>6.岡山県で何を購入しましたか（印象に残ったものを3つ）</p>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate">
                </div>
            </div>
            <div>
                <p>4.岡山県を訪れた目的はなんですか</p><br>
                <label>
                    <input name="purpose" type="radio" />
                    <span>ビジネス</span>
                </label>
                <label>
                    <input name="purpose" type="radio" checked/>
                    <span>観光</span>
                </label>
                <label>
                    <input name="purpose" type="radio" checked/>
                    <span>家族・友人に会いに</span>
                </label>
                <br>
                <label>
                    <input name="purpose" type="radio" checked/>
                    <span>
                        その他<input id="text" type="text" class="validate">
                    </span>
                </label>
            </div>
            <p>8.もっとも使用してるSNSはなんですか（1つ）</p>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate">
                </div>
            </div>
        </div>
    </body>
</html>
