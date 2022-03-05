<?php
header('Content-Type: text/html; charset= utf-8');
include ('header.html');

//$ourData = '{"title":"Похищение айсфрога","image":"img/news1.jpg","annonce":"Некромант говночист похитил айсфрога! <br> Он выбрался из канализации и схватил его!"}';
$ourData = file_get_contents('news.json');

$array = json_decode($ourData,true);
unset ($ourData);



echo "<h1>НОВОСТИ</h1>";

for($i = 0; $i < count($array); $i++)
{
    echo "
    <h2>".$array[$i]["title"]."</h2>
        <br/>
    <h3>".$array[$i]["annonce"]."</h3>
        <br/>
    <img src=\"img/".$array[$i]["image"]."\"><br/><hr/><br/>
    ";
}

echo "
<h1>Добавить новость</h1>
    <form enctype=\"multipart/form-data\" action=\"addnews.php\" method=\"post\"><br/>
<p><b>Название</b> 
    <input type=\"text\" name=\"title\" value\"введите заголовок\" required>
    </p>
<p><b>Текст анонса</b> 

    <textarea name=\"annonce\" cols=\"40\" rows=\"3\" required></textarea>
    </p>
<p><b>Изображение</b>
      <input type=\"file\" name=\"image\"></p><br/><br/>

      <input type=\"submit\">
    </form>
    
";



include ('footer.html');
?>