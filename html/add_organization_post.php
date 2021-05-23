
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

if (isset($_POST['add_organization']))//На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии
{
    $mysqli = ConnectDB();


    if (!$res = $mysqli->query("Insert into organization(user_id,name,about,address,phone,type_organization_id) VALUES ($_SESSION[id],'$_POST[name]','$_POST[about]','$_POST[address]','$_POST[phone]','$_POST[type_organization_id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    } else echo "<br><br><br><br><br><legend align='center'>Организация успешно добавлена</legend><br>
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