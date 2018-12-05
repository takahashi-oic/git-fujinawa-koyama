<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>アンケート作成ページ</title>
        <script type="text/javascript">
            function next(){
                //TOPページにジャンプさせる
                location.href = 'http://localhost/git-fujinawa-koyama/src/questionnaireOverview.php';
            }
            function itemChange(id){
                //↑変更したセレクトボックスのidをとってくる
                //とってきたidの最後にある数字をとる
                var idnum = id.slice(-1);
                if(document.getElementById('changeSelect' + idnum)){
                    var count = 0;
                    var nonenum;
                    //先に全部noneにして全部見せなくする
                    switch(idnum){
                        case '1':
                            for(count = 1;count <= 2;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }   
                            break;
                        case '2':
                            for(count = 3;count <= 4;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '3':
                            for(count = 5;count <= 6;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '4':
                            for(count = 7;count <= 8;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '5':
                            for(count = 9;count <= 10;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '6':
                            for(count = 11;count <= 12;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '7':
                            for(count = 13;count <= 14;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                        case '8':
                            for(count = 15;count <= 16;count++){
                                nonenum = 'box' + count;
                                document.getElementById(nonenum).style.display = "none";
                            }
                            break;
                    }
                    
                    //選んだものだけ見えるようにする
                    var value = document.getElementById('changeSelect' + idnum).value;
                    var dispnum = 'box' + value;
                    document.getElementById(dispnum).style.display = "";
                    
                }       
            }
            
            function questAdd(){
                var view_count = document.querySelectorAll("div").length;
                var zobun = view_count * 2;
                var text_zobun = view_count * 5;
                view_count += 1;
                if(view_count > 8 ){
                    alert('項目は8つまでです。');
                }else{                
                    var div_element = document.createElement("div");
                    div_element.innerHTML = 
                             '<table border="0" cellspacing="0" cellpadding="0">'
                        +    '<tr>' 
                        +        '<th>項目選択</th>' 
                        +        '<td>' 
                        +           '<select id="changeSelect' + view_count + '" name="select" onchange="itemChange(this.id)">'                       
                        +                '<option value="' + (1 + zobun) + '" selected>既存項目</option>' 
                        +                '<option value="' + (2 + zobun) + '">自由項目</option>' 
                        +            '</select>'
                        +        '</td>'
                        +    '</tr>'
                        +    '<tr id="box' + (1 + zobun) + '" style>'
                        +        '<th>アンケートの種類</th>'
                        +        '<td>'
                        +            '<select id="changeItem' + view_count + '" name="item">'
                        +                '<option value="item1" selected>出身国</option>'
                        +                '<option value="item2">年齢</option>'
                        +                '<option value="item3">性別</option>'
                        +                '<option value="item4">入出国空港</option>'
                        +                '<option value="item5">周遊ルート</option>'
                        +                '<option value="item6">購入物</option>'
                        +                '<option value="item7">目的</option>'
                        +                '<option value="item8">SNS</option>'
                        +            '</select>'
                        +        '</td>'
                        +    '</tr>'
                        +    '<tr id="box' + (2 + zobun) + '" style="display: none;">'
                        +        '<th>項目作成</th>'
                        +        '<td>'
                        +            '<textarea name="itemtext" rows="4" cols="40" placeholder="アンケートの本文を入力"></textarea><br>'
                        +            '<select id="changeFormat' + view_count + '" name="format">'
                        +                '<option value="format1" selected>ラジオボタン</option>'
                        +                '<option value="format2">チェックボックス</option>'
                        +                '<option value="format3">セレクトボックス</option>'
                        +                '<option value="format4">テキストボックス</option>'
                        +                '<option value="format5">テキストエリア</option>'
                        +            '</select>'
                        +            '<input type="text" id="textbox' + (1 + text_zobun) + '" name="name" style>'
                        +            '<input type="text" id="textbox' + (2 + text_zobun) + '" name="name" style>'
                        +            '<input type="text" id="textbox' + (3 + text_zobun) + '" name="name" style>'
                        +            '<input type="text" id="textbox' + (4 + text_zobun) + '" name="name" style>'
                        +            '<input type="text" id="textbox' + (5 + text_zobun) + '" name="name" style>'
                        +        '</td>'
                        +    '</tr>'
                        +    '</table>';

                    var parent_object = document.getElementById("add");
                    parent_object.appendChild(div_element);
                }
            }
            
            function init(){
                itemChange('changeSelect1');
            }
            
            //オンロードさせ、リロード時に選択を保持
            window.onload = init;
        </script>
    </head>
    <body>
        <form action="questionnaireOverview.php" method="post">
            <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th>項目選択</th>
                <td>
                    <select id="changeSelect1" name="select" onchange="itemChange(this.id)">                      
                        <option value="1" selected>既存項目</option>
                        <option value="2" >自由項目</option>
                    </select>
                </td>
            </tr>
            
            <!-- 表示非表示切り替え -->
            <tr id="box1" style>
                <th>アンケートの種類</th>
                <td>
                    <select id="changeItem1" name="item">
                        <option value="item1" selected>出身国</option>
                        <option value="item2">年齢</option>
                        <option value="item3">性別</option>
                        <option value="item4">入出国空港</option>
                        <option value="item5">周遊ルート</option>
                        <option value="item6">購入物</option>
                        <option value="item7">目的</option>
                        <option value="item8">SNS</option>
                    </select>
                </td>
            </tr>
            
            <!-- 表示非表示切り替え -->
            <tr id="box2" style>
                <th>項目作成</th>
                <td>
                    <textarea name="itemtext" rows="4" cols="40" placeholder="アンケートの本文を入力"></textarea><br>
                    <select id="changeFormat1" name="format">
                        <option value="format1" selected>ラジオボタン</option>
                        <option value="format2">チェックボックス</option>
                        <option value="format3">セレクトボックス</option>
                        <option value="format4">テキストボックス</option>
                        <option value="format5">テキストエリア</option>
                    </select>
                    <input type="text" id="textbox1" name="name" style>
                    <input type="text" id="textbox2" name="name" style>
                    <input type="text" id="textbox3" name="name" style>
                    <input type="text" id="textbox4" name="name" style>
                    <input type="text" id="textbox5" name="name" style>
                </td>
            </tr>
            </table>
            <tfoot>
            <tr>
                <td>
                    
                    <div id="add">
                    </div>
    
                    <button id="addButton" type="button" onclick="questAdd()">追加</button>
                </td>
                <td>
                    <input type="submit" value="プレビュー">
                </td>
            </tr>
            </tfoot>
            
        </form>
    </body>
</html>