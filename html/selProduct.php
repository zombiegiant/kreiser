
<?php
session_start();

include_once('config.php');
echo '<!doctype html>
<html lang="ru">
  <head>';
include ('meta.php');

echo " 
       <script src=\"https://code.jquery.com/jquery-latest.js\"></script>
";
echo ' </head>
  <body">';
include ("header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo '<div class="container" style="min-height: 800px;"><br>
<br><br><legend align="center">Список операций по картам</legend><br>';
    $mysqli = ConnectDB();
    if (!$res = $mysqli->query("call selProduct($_SESSION[id])")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    echo '<table class="table table-bordered table-hover table-sm">
        <thead class="thead-light"><tr class="text-center"><th>Услуга</th><th>Организация</th><th>Карта</th><th>Цена</th></tr></thead>
        <tbody>';
        while($row = $res->fetch_array()) {
            echo '<tr class="text-center">';
            for($i=0;$i<4;$i++) {
                echo '<td>' . $row[$i] . '</td>';
            }
            echo '</tr>';
        }
    echo '</tbody></table>
      </div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';