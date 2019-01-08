<?php
                    try {
                          $url = parse_url(getenv('DATABASE_URL'));
                          $pdo = new PDO("pgsql:".sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s',$url["host"],$url["port"],$url["user"],$url["pass"],ltrim($url["path"],"/")));
             } catch (PDOException $e) {
                            header('Content-Type: text/plain; charset=UTF-8', true, 500);
                            exit($e->getMessage());
                        }
                    
           $ques = urlencode((empty($_SERVER["HTTPS"])?"http://":"https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
           echo $ques;
                    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>変更後</title>
        <script type="text/javascript">
            function screenTransition(){
                document.location.href = "questionnaireCreate.php";
            }
            
            function sendCreatedata(){
                //localstorageから項目の総数をとってくる
                var count = localStorage.getItem('div_countkey');
                //viewnum 現在処理している項目の番号を指す countの分だけ繰り返す
                for(var viewnum = 1;viewnum <= count;viewnum++){
                    //questions 既存項目なら奇数 自由項目なら偶数 が入っている
                    var questions = localStorage.getItem('questionskey' + viewnum);
                    switch(questions){
                        case '1':
                        case '3':
                        case '5':
                        case '7':
                        case '9':
                        case '11':
                        case '13':
                        case '15':
                            //svalue 既存項目のなにを選んだか が入っている
                            var svalue = localStorage.getItem('selectkey' + viewnum);
                            switch(svalue){
                                    case 'item1':
                                        //div_element divタグで囲う
                                        var div_element = document.createElement("div");
                                        //div_element 中身を入れる
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>出身国</th>'
                                            +        '<td>'
                                            +            '<select  name="country">'
                                            +                '<option value="アメリカ" selected>アメリカ</option>'
                                            +                '<option value="中国">中国</option>'
                                            +                '<option value="韓国">韓国</option>'
                                            +            '</select>'
                                            +        '</td>';
                                        //parent_object add'x' というidを取得
                                        var parent_object = document.getElementById("add" + viewnum);
                                        //取得したidのところにdivタグと中身を入れる
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item2':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>年齢</th>'
                                            +        '<td>'
                                            +            '<input type="radio" name="age' + viewnum + '" value="0~9" checked>0~9'
                                            +            '<input type="radio" name="age' + viewnum + '" value="10~19">10~19'
                                            +            '<input type="radio" name="age' + viewnum + '" value="20~29">20~29'
                                            +            '<input type="radio" name="age' + viewnum + '" value="30~39">30~39'
                                            +            '<input type="radio" name="age' + viewnum + '" value="40~49">40~49'
                                            +            '<input type="radio" name="age' + viewnum + '" value="50~59">50~59'
                                            +            '<input type="radio" name="age' + viewnum + '" value="60~69">60~69'
                                            +            '<input type="radio" name="age' + viewnum + '" value="70~79">70~79'
                                            +            '<input type="radio" name="age' + viewnum + '" value="80+">80+'
                                            +        '</td>';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item3':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>性別</th>'
                                            +        '<td>'
                                            +            '<input type="radio" name="sex' + viewnum + '" value="男" checked>男'
                                            +            '<input type="radio" name="sex' + viewnum + '" value="女">女'
                                            +        '</td>';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item4':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>入出国空港</th>'
                                            +        '<td>'
                                            +        '入国'
                                            +            '<select name="airport">'
                                            +                '<option value="岡山空港" selected>岡山空港</option>'
                                            +                '<option value="鳥取空港">鳥取空港</option>'
                                            +                '<option value="関西国際空港">関西国際空港</option>'
                                            +                '<option value="羽田空港">羽田空港</option>'
                                            +            '</select>'
                                            +         '出国'
                                            +            '<select name="format">'
                                            +                '<option value="岡山空港" selected>岡山空港</option>'
                                            +                '<option value="鳥取空港">鳥取空港</option>'
                                            +                '<option value="関西国際空港">関西国際空港</option>'
                                            +                '<option value="羽田空港">羽田空港</option>'
                                            +            '</select>'
                                            +        '</td>';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item5':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>周遊ルート</th>'
                                            +        '<td>'
                                            +            '<select name="Tourism1">'
                                            +                '<option value="岡山城" selected>岡山城</option>'
                                            +                '<option value="美観地区">美観地区</option>'
                                            +                '<option value="後楽園">後楽園</option>'
                                            +                '<option value="大原美術館">大原美術館</option>'
                                            +            '</select>'
                                            +            '<select name="Tourism2">'
                                            +                '<option value="岡山城" selected>岡山城</option>'
                                            +                '<option value="美観地区">美観地区</option>'
                                            +                '<option value="後楽園">後楽園</option>'
                                            +                '<option value="大原美術館">大原美術館</option>'
                                            +            '</select>'
                                            +            '<select name="Tourism3">'
                                            +                '<option value="岡山城" selected>岡山城</option>'
                                            +                '<option value="美観地区">美観地区</option>'
                                            +                '<option value="後楽園">後楽園</option>'
                                            +                '<option value="大原美術館">大原美術館</option>'
                                            +            '</select>'
                                            +            '<select name="Tourism4">'
                                            +                '<option value="岡山城" selected>岡山城</option>'
                                            +                '<option value="美観地区">美観地区</option>'
                                            +                '<option value="後楽園">後楽園</option>'
                                            +                '<option value="大原美術館">大原美術館</option>'
                                            +            '</select>'
                                            +            '<select name="Tourism5">'
                                            +                '<option value="岡山城" selected>岡山城</option>'
                                            +                '<option value="美観地区">美観地区</option>'
                                            +                '<option value="後楽園">後楽園</option>'
                                            +                '<option value="大原美術館">大原美術館</option>'
                                            +            '</select>'
                                            +        '</td>';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item6':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>購入物</th>'
                                            +       '<td>'
                                            +            '<input type="text" name="Purchases1" placeholder="印象に残った購入物 第一位">'
                                            +            '<input type="text" name="Purchases2" placeholder="印象に残った購入物 第二位">'
                                            +            '<input type="text" name="Purchases3" placeholder="印象に残った購入物 第三位">'
                                            +       '</td>';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item7':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>目的</th>'
                                            +        '<td>'
                                            +            '<input type="radio" name="purpose' + viewnum + '" value="ビジネス" checked>ビジネス'
                                            +            '<input type="radio" name="purpose' + viewnum + '" value="観光">観光'
                                            +            '<input type="radio" name="purpose' + viewnum + '" value="家族・友人に会いに">家族・友人に会いに'
                                            +            '<input type="radio" name="purpose' + viewnum + '" value="その他">その他'
                                            +        '</td>';       
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                                    case 'item8':
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML = 
                                                viewnum + ':'
                                            +   '<th>SNS</th>'
                                            +       '<td>'
                                            +        '<input type="text" name="sns"　placeholder="一番使用しているSNSは何ですか？">'
                                            +       '</td>';        
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                        break;
                            }
                            break;
                        case '2':
                        case '4':
                        case '6':
                        case '8':
                        case '10':
                        case '12':
                        case '14':
                        case '16':
                            //tvalue 設定した項目の問題文 が入っている
                            var tvalue = localStorage.getItem('textareakey' + viewnum);
                            var div_element = document.createElement("div");
                            div_element.innerHTML = 
                                    viewnum + ':'
                                +   '<th>' + tvalue + '</th>';     
                            var parent_object = document.getElementById("add" + viewnum);
                            parent_object.appendChild(div_element);
                            //forvalue 自由項目のformatの何を選んだか が入っている
                            var forvalue = localStorage.getItem('formatkey' + viewnum);
                            switch(forvalue){
                                case 'format1':
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '<td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    //tbcount 自由項目の問題の選択肢の数を指す 空白かnullが入っているとそこ以上の選択肢は表示されない
                                    for(var tbcount = 1;tbcount <= 5;tbcount++){
                                        var tbvalue = localStorage.getItem('textboxkey' + (tbcount + ((viewnum-1) * 5)));
                                        if(tbvalue == '' || tbvalue == null){
                                            tbcount += 5;
                                            break;
                                        }
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                    '<input type="radio" name="radioname' + viewnum + '" id="radioid' + (tbcount + ((viewnum-1) * 5)) + '" value="' + tbvalue + '">' + tbvalue;
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                    }
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '</td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    break;
                                case 'format2':
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '<td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    for(var tbcount = 1;tbcount <= 5;tbcount++){
                                        var tbvalue = localStorage.getItem('textboxkey' + (tbcount + ((viewnum-1) * 5)));
                                        if(tbvalue == '' || tbvalue == null){
                                            tbcount += 5;
                                            break;
                                        }
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                    '<input type="checkbox" name="checkname' + viewnum + '" id="cheackboxid' + (tbcount + ((viewnum-1) * 5)) + '" value="' + tbvalue + '">' + tbvalue;
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                    }
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '</td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    break;
                                case 'format3':

                                    var select_html =                                                 
                                                '<td>'
                                        +            '<select  name="country">';

                                    for(var tbcount = 1;tbcount <= 5;tbcount++){
                                        var tbvalue = localStorage.getItem('textboxkey' + (tbcount + ((viewnum-1) * 5)));
                                        if(tbvalue == '' || tbvalue == null){
                                            tbcount += 5;
                                            break;
                                        }
                                        select_html +=                                                 
                                                        '<option id="selectboxid' + (tbcount + ((viewnum-1) * 5)) + '" value="' + tbvalue + '">' + tbvalue + '</option>';

                                    }
                                        select_html +=  
                                                    '</select>'
                                        +       '</td>';
                                    var div_element = document.createElement("div");
                                    div_element.innerHTML = select_html;
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    break;        
                                case 'format4':
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '<td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    for(var tbcount = 1;tbcount <= 5;tbcount++){
                                        var tbvalue = localStorage.getItem('textboxkey' + (tbcount + ((viewnum-1) * 5)));
                                        if(tbvalue == '' || tbvalue == null){
                                            tbcount += 5;
                                            break;
                                        }
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                    '<input type="text" name="textboxname' + (tbcount + ((viewnum-1) * 5)) + '" placeholder="' + tbvalue + '" value="' + tbvalue + '">';
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                    }
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '</td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    break;
                                case 'format5':
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '<td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    for(var tbcount = 1;tbcount <= 5;tbcount++){
                                        var tbvalue = localStorage.getItem('textboxkey' + (tbcount + ((viewnum-1) * 5)));
                                        if(tbvalue == '' || tbvalue == null){
                                            tbcount += 5;
                                            break;
                                        }
                                        var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                    '<textarea  name="itemtext" rows="4" cols="40" id="textarea' + (tbcount + ((viewnum-1) * 5)) + '" placeholder="' + tbvalue + '" value="' + tbvalue + '"></textarea>';           
                                        var parent_object = document.getElementById("add" + viewnum);
                                        parent_object.appendChild(div_element);
                                    }
                                    var div_element = document.createElement("div");
                                        div_element.innerHTML =                                                 
                                                '</td>';
                                    var parent_object = document.getElementById("add" + viewnum);
                                    parent_object.appendChild(div_element);
                                    break;
                            }
                    }
                }
            }
            
            function test(){
                var mydiv1 = document.getElementById("add1");
                var mydiv2 = document.getElementById("add2");
                var mydiv3 = document.getElementById("add3");
                var mydiv4 = document.getElementById("add4");
                var mydiv5 = document.getElementById("add5");
                var mydiv6 = document.getElementById("add6");
                var mydiv7 = document.getElementById("add7");
                var mydiv8 = document.getElementById("add8");
                var view = mydiv1.innerHTML;
                view += mydiv2.innerHTML;
                view += mydiv3.innerHTML;
                view += mydiv4.innerHTML;
                view += mydiv5.innerHTML;
                view += mydiv6.innerHTML;
                view += mydiv7.innerHTML;
                view += mydiv8.innerHTML;
                localStorage.setItem('localhtml', view);
                document.location.href = "testPHPfile.php";
            }
            
            function init(){
                sendCreatedata();
            }
            window.onload = init;
        </script>
    </head>
    
    <body>
        <form action="questionnaireRegist.php" method="post">
            <table id="addtable" border="0" cellspacing="0" cellpadding="0">
                <div id="add1">
                </div>
                <div id="add2">
                </div>
                <div id="add3">
                </div>
                <div id="add4">
                </div>
                <div id="add5">
                </div>
                <div id="add6">
                </div>
                <div id="add7">
                </div>
                <div id="add8">
                </div>
            </table>
            <tfoot>
            <tr>
                <td>
                    <button id="addButton" type="button" onclick="screenTransition()">戻る</button>
                </td>
                <td>
                    <input type="hidden" name="ques" value="<?php echo $ques ?>">
                    <button id="confirmButton" type="submit" >作成</button>
                </td>
            </tr>
            </tfoot>
        </form>
    </body>
</html>
