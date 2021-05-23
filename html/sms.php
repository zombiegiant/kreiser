
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

/*<div class="container" style="min-height: 800px;">
        <form action="123.php" method="post">
          <p>Имя:<input type="text" name="name"></p>
          <p>Телефон:<input type="text" name="userPhone"></p>
          <p>Сообщение:<textarea name="message"></textarea></p>
          <p><input type="submit" value="Отправить"></p>
        </form>*/
echo '<a href="http://api.smsfeedback.ru/messages/v2/status/?login=s17080518&password=306xz20J&id=5736732412">asd</a>
      </div>';



include ("footer.php"); //Подлючение подвала на каждой стр прописывать
include ("bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';