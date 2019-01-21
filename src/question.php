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
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
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
                <option value="米子空港">米子空港</option>
                <option value="福岡空港">福岡空港</option>
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
                <option value="米子空港">米子空港</option>
                <option value="福岡空港">福岡空港</option>
            </select>
            <p class="black-text">5.岡山県でどこの観光地に行きましたか</p>
            <select class="browser-default" name="Tourism1">
                <option value="" disabled selected>一番目の観光地を選択してください</option>
                <option value="岡山後楽園">岡山後楽園</option>
                <option value="岡山城">岡山城</option>
                <option value="倉敷美観地区">倉敷美観地区</option>
                <option value="直島">直島</option>
                <option value="鷲羽山・瀬戸大橋">鷲羽山・瀬戸大橋</option>
                <option value="豊島">豊島</option>
                <option value="吉備津神社">吉備津神社</option>
                <option value="犬島">犬島</option>
                <option value="児島ジーンズストリート・ジーンズミュージアム">児島ジーンズストリート・ジーンズミュージアム</option>
                <option value="観光農園（果物狩り）">観光農園（果物狩り）</option>
                <option value="笠岡ベイファーム">笠岡ベイファーム</option>
                <option value="牛窓オリーブ園・牛窓">牛窓オリーブ園・牛窓</option>
                <option value="旧閑谷学校・備前市伊部">旧閑谷学校・備前市伊部</option>
                <option value="備中松山城">備中松山城</option>
                <option value="備前長船刀剣博物館">備前長船刀剣博物館</option>
                <option value="サッポロワイナリー">サッポロワイナリー</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="キリンビール岡山工場">キリンビール岡山工場</option>
                <option value="吹屋">吹屋</option>
                <option value="津山城（鶴山公園）">津山城（鶴山公園）</option>
                <option value="湯郷温泉">湯郷温泉</option>
                <option value="矢掛本陣">矢掛本陣</option>
                <option value="井倉洞">井倉洞</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="岡山市内観光">岡山市内観光</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism2">
                <option value="" disabled selected>二番目の観光地を選択してください</option>
                <option value="岡山後楽園">岡山後楽園</option>
                <option value="岡山城">岡山城</option>
                <option value="倉敷美観地区">倉敷美観地区</option>
                <option value="直島">直島</option>
                <option value="鷲羽山・瀬戸大橋">鷲羽山・瀬戸大橋</option>
                <option value="豊島">豊島</option>
                <option value="吉備津神社">吉備津神社</option>
                <option value="犬島">犬島</option>
                <option value="児島ジーンズストリート・ジーンズミュージアム">児島ジーンズストリート・ジーンズミュージアム</option>
                <option value="観光農園（果物狩り）">観光農園（果物狩り）</option>
                <option value="笠岡ベイファーム">笠岡ベイファーム</option>
                <option value="牛窓オリーブ園・牛窓">牛窓オリーブ園・牛窓</option>
                <option value="旧閑谷学校・備前市伊部">旧閑谷学校・備前市伊部</option>
                <option value="備中松山城">備中松山城</option>
                <option value="備前長船刀剣博物館">備前長船刀剣博物館</option>
                <option value="サッポロワイナリー">サッポロワイナリー</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="キリンビール岡山工場">キリンビール岡山工場</option>
                <option value="吹屋">吹屋</option>
                <option value="津山城（鶴山公園）">津山城（鶴山公園）</option>
                <option value="湯郷温泉">湯郷温泉</option>
                <option value="矢掛本陣">矢掛本陣</option>
                <option value="井倉洞">井倉洞</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="岡山市内観光">岡山市内観光</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism3">
                <option value="" disabled selected>三番目の観光地を選択してください</option>
                <option value="岡山後楽園">岡山後楽園</option>
                <option value="岡山城">岡山城</option>
                <option value="倉敷美観地区">倉敷美観地区</option>
                <option value="直島">直島</option>
                <option value="鷲羽山・瀬戸大橋">鷲羽山・瀬戸大橋</option>
                <option value="豊島">豊島</option>
                <option value="吉備津神社">吉備津神社</option>
                <option value="犬島">犬島</option>
                <option value="児島ジーンズストリート・ジーンズミュージアム">児島ジーンズストリート・ジーンズミュージアム</option>
                <option value="観光農園（果物狩り）">観光農園（果物狩り）</option>
                <option value="笠岡ベイファーム">笠岡ベイファーム</option>
                <option value="牛窓オリーブ園・牛窓">牛窓オリーブ園・牛窓</option>
                <option value="旧閑谷学校・備前市伊部">旧閑谷学校・備前市伊部</option>
                <option value="備中松山城">備中松山城</option>
                <option value="備前長船刀剣博物館">備前長船刀剣博物館</option>
                <option value="サッポロワイナリー">サッポロワイナリー</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="キリンビール岡山工場">キリンビール岡山工場</option>
                <option value="吹屋">吹屋</option>
                <option value="津山城（鶴山公園）">津山城（鶴山公園）</option>
                <option value="湯郷温泉">湯郷温泉</option>
                <option value="矢掛本陣">矢掛本陣</option>
                <option value="井倉洞">井倉洞</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="岡山市内観光">岡山市内観光</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism4">
                <option value="" disabled selected>四番目の観光地を選択してください</option>
                <option value="岡山後楽園">岡山後楽園</option>
                <option value="岡山城">岡山城</option>
                <option value="倉敷美観地区">倉敷美観地区</option>
                <option value="直島">直島</option>
                <option value="鷲羽山・瀬戸大橋">鷲羽山・瀬戸大橋</option>
                <option value="豊島">豊島</option>
                <option value="吉備津神社">吉備津神社</option>
                <option value="犬島">犬島</option>
                <option value="児島ジーンズストリート・ジーンズミュージアム">児島ジーンズストリート・ジーンズミュージアム</option>
                <option value="観光農園（果物狩り）">観光農園（果物狩り）</option>
                <option value="笠岡ベイファーム">笠岡ベイファーム</option>
                <option value="牛窓オリーブ園・牛窓">牛窓オリーブ園・牛窓</option>
                <option value="旧閑谷学校・備前市伊部">旧閑谷学校・備前市伊部</option>
                <option value="備中松山城">備中松山城</option>
                <option value="備前長船刀剣博物館">備前長船刀剣博物館</option>
                <option value="サッポロワイナリー">サッポロワイナリー</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="キリンビール岡山工場">キリンビール岡山工場</option>
                <option value="吹屋">吹屋</option>
                <option value="津山城（鶴山公園）">津山城（鶴山公園）</option>
                <option value="湯郷温泉">湯郷温泉</option>
                <option value="矢掛本陣">矢掛本陣</option>
                <option value="井倉洞">井倉洞</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="岡山市内観光">岡山市内観光</option>
            </select>
            <br>
            <select class="browser-default"  name="Tourism5">
                <option value="" disabled selected>五番目の観光地を選択してください</option>
                <option value="岡山後楽園">岡山後楽園</option>
                <option value="岡山城">岡山城</option>
                <option value="倉敷美観地区">倉敷美観地区</option>
                <option value="直島">直島</option>
                <option value="鷲羽山・瀬戸大橋">鷲羽山・瀬戸大橋</option>
                <option value="豊島">豊島</option>
                <option value="吉備津神社">吉備津神社</option>
                <option value="犬島">犬島</option>
                <option value="児島ジーンズストリート・ジーンズミュージアム">児島ジーンズストリート・ジーンズミュージアム</option>
                <option value="観光農園（果物狩り）">観光農園（果物狩り）</option>
                <option value="笠岡ベイファーム">笠岡ベイファーム</option>
                <option value="牛窓オリーブ園・牛窓">牛窓オリーブ園・牛窓</option>
                <option value="旧閑谷学校・備前市伊部">旧閑谷学校・備前市伊部</option>
                <option value="備中松山城">備中松山城</option>
                <option value="備前長船刀剣博物館">備前長船刀剣博物館</option>
                <option value="サッポロワイナリー">サッポロワイナリー</option>
                <option value="蒜山高原">蒜山高原</option>
                <option value="キリンビール岡山工場">キリンビール岡山工場</option>
                <option value="吹屋">吹屋</option>
                <option value="津山城（鶴山公園）">津山城（鶴山公園）</option>
                <option value="湯郷温泉">湯郷温泉</option>
                <option value="矢掛本陣">矢掛本陣</option>
                <option value="井倉洞">井倉洞</option>
                <option value="湯原温泉">湯原温泉</option>
                <option value="岡山市内観光">岡山市内観光</option>
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
                    <input name="purpose" type="radio" value="その他"/>
                    <span>その他</span>
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
