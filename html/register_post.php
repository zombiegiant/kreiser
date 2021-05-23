
<?php
session_start();

include('config');
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
echo '<div class="container" style="min-height: 800px;">
<br><br>';
if (isset($_POST['register']))//На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии
{
    $mysqli = ConnectDB();
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!$res = $mysqli->query("CALL Register('$_POST[surname]','$_POST[name]','$_POST[patronymic]','$_POST[tel]','$_POST[age]','$_POST[gender]','0','0','$_POST[status]','$_POST[login]','$pass')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    } else echo "<br><br><br><br><br><legend align='center'>Регистрация прошла успешно</legend><br>
<div class='row justify-content-center'><div class='col-md-4 offset-md-3'> <img src='https://support.songtradr.com/hc/article_attachments/115010619108/tick.png' style='height: 100px; width: 100px;'></div>
</div> ";

}
else echo "Ошибка";
echo "<script type=\"text/javascript\">

setTimeout('location.replace(\"http://80.87.195.174/novros/\")',3000);

</script>
";




        
        
     echo '</div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';