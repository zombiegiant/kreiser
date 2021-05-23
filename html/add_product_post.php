
<?php

include('config.php');
echo '<!doctype html>
<html lang="ru">
  <head>';
include ('meta.php');

echo " 
       <script src=\"https://code.jquery.com/jquery-latest.js\"></script>
";
echo ' </head>
  <body">';
include ("header.php");

if (isset($_POST['add_product']))//На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии
{
    $mysqli = ConnectDB();


    if (!$res = $mysqli->query("Insert into product(organization_id,name,price_1,price_3,price_4) VALUES ($_POST[organization_id],'$_POST[name]',$_POST[price_1],$_POST[price_3],$_POST[price_4])")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    } else echo "<br><br><br><br><br><legend align='center'>Услуга успешно добавлена</legend><br>
<div class='row justify-content-center'><div class='col-md-4 offset-md-3'> <img src='https://support.songtradr.com/hc/article_attachments/115010619108/tick.png' style='height: 100px; width: 100px;'></div>
</div> ";

}
else echo "Ошибка";
echo "<script type=\"text/javascript\">

setTimeout('location.replace(\"http://80.87.195.174/novros/\")',3000);

</script>
";

echo '<div class="container" style="min-height: 800px;">


        
        
      </div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';