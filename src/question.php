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
        <title>アンケート</title>
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
        <div class="card-panel row s12 light-green lighten-1"><span class="white-text">アンケート</span></div>
    </header>
    <body>
        <form action="questionnaireRegist.php" method="post">
        <div class="container s8">
            <p class="black-text">1.出身国</p>
            <select class="browser-default" name="country">
                <option value="" disabled selected>出身国を選択してください</option>
                <option value="アメリカ">アメリカ</option>
                <option value="日本">日本</option>
                <option value="韓国">韓国</option>
                <option value="中国">日本</option>
                <option value="フランス">韓国</option>
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
                    <input name="sex" type="radio" value="男"/>
                    <span>男性</span>
                </label>
                <label>
                    <input name="sex" type="radio" value="女"/>
                    <span>女性</span>
                </label>
            </p>
            <p class="black-text">4.どこの空港から出入国しましたか</p>
            <select class="browser-default" name="inairport">
                <option value="" disabled selected>入国空港を選択してください</option>
                <option value="岡山空港">岡山空港</option>
                <option value="広島空港">広島空港</option>
                <option value="高松空港">高松空港</option>
                <option value="関西国際空港">関西国際空港</option>
                <option value="中部国際空港">中部国際空港</option>
                <option value="羽田空港">羽田空港</option>
                  <option value="成田空港">成田空港</option>
            </select>
            <br>
            <select class="browser-default" name="outairport">
                <option value="" disabled selected>出国空港を選択してください</option>
                <option value="岡山空港">岡山空港</option>
                <option value="広島空港">広島空港</option>
                <option value="高松空港">高松空港</option>
                <option value="関西国際空港">関西国際空港</option>
                <option value="中部国際空港">中部国際空港</option>
                <option value="羽田空港">羽田空港</option>
                <option value="成田空港">成田空港</option>
            </select>
            <p class="black-text">5.岡山県でどこの観光地に行きましたか</p>
            <select class="browser-default" name="Tourism1">
                <option value="" disabled selected>一番目の観光地を選択してください</option>
                 <option value="岡山城">岡山城</option>
                <option value="後楽園">後楽園</option>
                <option value="大原美術館">大原美術館</option>
                <option value="美観地区">美観地区</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="鷲羽山">鷲羽山</option>
                <option value="牛窓オリーブ園">牛窓オリーブ園</option>
                <option value="おもちゃ王国">おもちゃ王国</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="社吉備津神">社吉備津神</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism2">
                <option value="" disabled selected>二番目の観光地を選択してください</option>
                <option value="岡山城">岡山城</option>
                <option value="後楽園">後楽園</option>
                <option value="大原美術館">大原美術館</option>
                <option value="美観地区">美観地区</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="鷲羽山">鷲羽山</option>
                <option value="牛窓オリーブ園">牛窓オリーブ園</option>
                <option value="おもちゃ王国">おもちゃ王国</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="社吉備津神">社吉備津神</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism3">
                <option value="" disabled selected>三番目の観光地を選択してください</option>
                <option value="岡山城">岡山城</option>
                <option value="後楽園">後楽園</option>
                <option value="大原美術館">大原美術館</option>
                <option value="美観地区">美観地区</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="鷲羽山">鷲羽山</option>
                <option value="牛窓オリーブ園">牛窓オリーブ園</option>
                <option value="おもちゃ王国">おもちゃ王国</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="社吉備津神">社吉備津神</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism4">
                <option value="" disabled selected>四番目の観光地を選択してください</option>
                 <option value="岡山城">岡山城</option>
                <option value="後楽園">後楽園</option>
                <option value="大原美術館">大原美術館</option>
                <option value="美観地区">美観地区</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="鷲羽山">鷲羽山</option>
                <option value="牛窓オリーブ園">牛窓オリーブ園</option>
                <option value="おもちゃ王国">おもちゃ王国</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="社吉備津神">社吉備津神</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism5">
                <option value="" disabled selected>五番目の観光地を選択してください</option>
                 <option value="岡山城">岡山城</option>
                <option value="後楽園">後楽園</option>
                <option value="大原美術館">大原美術館</option>
                <option value="美観地区">美観地区</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="鷲羽山">鷲羽山</option>
                <option value="牛窓オリーブ園">牛窓オリーブ園</option>
                <option value="おもちゃ王国">おもちゃ王国</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="社吉備津神">社吉備津神</option>
            </select>
            <p>6.岡山県で何を購入しましたか（印象に残ったものを3つ）</p>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate" name="Purchases1">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate" name="Purchases2">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" class="validate" name="Purchases3">
                </div>
            </div>
            <div>
                <p>7.岡山県を訪れた目的はなんですか</p><br>
                <label>
                    <input name="purpose" type="radio" value="ビジネス" />
                    <span>ビジネス</span>
                </label>
                <label>
                    <input name="purpose" type="radio" value="観光"/>
                    <span>観光</span>
                </label>
                <label>
                    <input name="purpose" type="radio" value="家族・友人に会いに"/>
                    <span>家族・友人に会いに</span>
                </label>
                <br>
                <label>
                    <input name="purpose" type="radio" />
                    <span>
                        その他<input name="other" id="text" type="text" class="validate">
                    </span>
                </label>
            </div>
            <p>8.もっとも使用してるSNSはなんですか（1つ）</p>
            <div class="row">
                <div class="input-field col s6">
                    <input id="text" type="text" name="sns" class="validate">
                </div>
            </div>
        </div>
            <div class="row">
                        <!--<input type="submit" value="確認ページへ" class="waves-effect waves-light btn col s4 offset-s4" id="createbtn">-->
                        <button type="submit" name="action" class="btn waves-effect waves-light col s4 offset-s4" id="createbtn" >送信</button>
                    </div>
        </form>
    </body>
</html>
