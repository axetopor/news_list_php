<?php
header('Content-Type: text/html; charset= utf-8');


$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);


if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
   // echo "Новость успешно добавлена.\n";

} else {
    echo "Ошибка при добавлении файла!\n";
}

if (empty($_FILES['image']['name'])){
    $filename = "noimage.jpg";
} else {
    $filename = $_FILES['image']['name'];
}


$file = "news.json";

$oldData = file_get_contents($file);
$oldarray = json_decode($oldData,true);
unset ($oldData);



$arr = array(
    'title'     => $_POST['title'],
    'annonce'    => $_POST['annonce'],
    'image'    => $filename
);

$json_string = json_encode($arr);

array_push ($oldarray, $arr);

$json_string = json_encode($oldarray);

file_put_contents($file, $json_string);

echo "
<script>
window.location.href='http://mityatf4.beget.tech/axe/';

window.location.replace('http://mityatf4.beget.tech/axe/');
</script>
";

?>